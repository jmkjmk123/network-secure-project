<?php
    session_start();
    if($_SESSION['loginID']==""){
        echo "<script>alert('로그인이 필요합니다'); location.href='/main.html';</script>";
    }
    $token = md5(time());
    $_SESSION['anticsrftoken'] = $token;

    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
            echo "DBMS connect fail";
            exit;
    }

    mysql_select_db("final");
    $sql = "select nickname from member where id='$_SESSION[loginID]'";
    $result = mysql_fetch_array(mysql_query($sql));
    mysql_close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>닉네임 변경</title>
    </head>
    <body>
    <pre>
        <form method="POST" action="nick_proc.php">
                닉네임 : <input type="text" name="nickname" value="<?php echo $result['nickname'];?>">
                <input type="submit" value="변경"> <input type="reset" value="취소">
                <input type="hidden" name="anticsrftoken" value="<?php echo $token; ?>">
        </form>
    </pre>
    </body>
</html>