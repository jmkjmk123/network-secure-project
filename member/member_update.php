<?php
    session_start();
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $id = $_SESSION['loginID'];
 
    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    mysql_select_db("final");
    

    if($pass==""){
            $sql = "update member set
            name='$name',
            tel='$tel',
            email='$email',
            address='$address'
            where id='$id'";
    }

    else {
            if($pass==$pass_re){
                $sql = "update member set
                name='$name',
                pass='$pass',
                tel='$tel',
                email='$email',
                address='$address'
                where id='$id'";
            }
            else{
                echo "<script>alert('동일한 비밀번호를 입력해 주세요');location.href='update.php';</script>";
            }
    }

    $result = mysql_query($sql);

    if($result){
        echo "<script>alert('정보 수정 성공'); location.href='/main.html';</script>";
    }
    else{
        echo "<script>alert('정보 수정 실패'); location.href='/main.html';</script>";
    }
    mysql_close();
?>