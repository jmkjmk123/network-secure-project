<?php
    $no = $_GET['no'];
    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }
    mysql_select_db("final");
    $sql = "delete from board where no=$no";
    $return = mysql_query($sql);
    if($return){
        echo "<script>alert('삭제 성공'); location.href='manage_board.php';</script>";
    }
    else{
        echo "<script>alert('삭제 실패'); location.href='manage_board.php';</script>";
    }
?>