<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $pass_re = $_POST['pass_re'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $nickname = $_POST['nickname'];

    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }
    mysql_select_db("final");
    $sql = "insert into member set
            id='$id',
            pass='$pass',
            name='$name',
            tel='$tel',
            email='$email',
            address='$address',
            nickname='$nickname';";
    $return = mysql_query($sql);

    if($return){
        echo "<script>alert('회원 가입 성공'); location.href='/login.php';</script>";
    }
    else{
        echo "<script>alert('회원 가입 실패'); location.href='/login.php';</script>";
    }
    mysql_close();
?>