<?php
    session_start();
    if($_SESSION['loginID']==""){
        echo "<script>alert('로그인이 필요합니다'); location.href='/main.html';</script>";
    }
    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    mysql_select_db("final");
    $sql = "select * from member where id='$_SESSION[loginID]'";
    $result = mysql_fetch_array(mysql_query($sql));
    mysql_close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>회원 정보 수정</title>
    </head>
    <body>
    <pre>
        <form method="GET" action="member_update.php">
                아이디 : <?php echo $result['id']."\n"; ?>
                비밀번호 : <input type="password" name="pass">
                비밀번호(재입력) : <input type="password" name="pass_re">
                이름 : <input type="text" name="name" value="<?php echo $result['name'];?>">
                휴대폰 : <input type="text" name="tel" value="<?php echo $result['tel'];?>">
                이메일 : <input type="text" name="email" value="<?php echo $result['email'];?>">
                주소 : <input type="text" name="address" value="<?php echo $result['address'];?>">
    
                <input type="submit" value="수정"> <input type="reset" value="취소">
        </form>
    </pre>
    </body>
</html>