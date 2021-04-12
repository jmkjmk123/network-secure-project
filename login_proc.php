<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $connect = mysql_connect("localhost","root","P@ssw0rd");
    if(!$connect){
        echo "mysql connect fail";
        exit;
    }
    $db_select = mysql_select_db("final");
    if(!$db_select){
        echo "db select fail!";
        exit;
    }
    $sql = "select * from member where id='$id' and pass='$pass'";
    $return = mysql_query($sql);
    $result = mysql_fetch_array($return);
    if($result){
        if($result['cnt'] >= 5){
            echo "<script>alert('계정 입력 오류 5회 이상으로 이용이 정지된 계정입니다'); location.href='login.php';</script>";
        }
        if($result['id'] == $id){
            if($result['pass'] == $pass){
                session_start();
                $_SESSION['loginID'] = $result['id'];
                mysql_query("update member set cnt=0 where id='$id';");
                echo "<script>alert('로그인 되었습니다'); location.href='main.html';</script>";
            }
            else{
                mysql_query("update member set cnt=cnt+1 where id='$id';");
                echo "<script>alert('로그인 실패'); location.href='login.php';</script>";
            }
        }
        else{
            echo "<script>alert('로그인 실패'); location.href='login.php';</script>";
        }//brute force
    }
        
    else{
        echo "<script>alert('로그인 실패'); location.href='login.php';</script>";
    }
    mysql_close();
?>
