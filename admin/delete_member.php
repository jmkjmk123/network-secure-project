<?php
    $id = $_GET['id'];
    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }
    mysql_select_db("final");
    $return = mysql_query("delete from member where id=$id;");
    if($return){
        echo "<script>alert('회원 탈퇴 성공'); location.href='manage_member.php';</script>";
    }

    else{
        echo "<script>alert('회원 탈퇴 실패'); location.href='manage_member.php';</script>";
    }
    mysql_close();
?>