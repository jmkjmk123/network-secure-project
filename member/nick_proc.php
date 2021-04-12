<?php

    $nickname = $_POST['nickname'];
    session_start();
    if($_POST['anticsrftoken'] != $_SESSION['anticsrftoken'] || $_POST['anticsrftoken'] == "" || $_SESSION['anticsrftoken'] == "" ){
        echo "csrf attack detected";
        exit;
    }//CSRF attack check

    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }
    mysql_select_db("final");

    $sql = "update member set nickname='$nickname' where id='$_SESSION[loginID]';";
    $result = mysql_query($sql);

    if($result){
        echo "<script>alert('닉네임 변경 성공'); location.href='/main.html';</script>";
    }
    else{
        echo "<script>alert('닉네임 변경 실패'); location.href='/main.html';</script>";
    }
    mysql_close();
?>