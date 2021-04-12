<?php
    session_start();
    $id = $_SESSION['loginID'];
    $name = $_GET['name'];
    $quantity = $_GET['quantity'];
    $total_price = 0;

    $connect = mysql_connect("192.168.3.250", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }
    mysql_select_db("final");
    $get_price = mysql_fetch_array(mysql_query("select * from products where name='$name'"));
    $total_price = $quantity * $get_price['price'];
    $sql = "insert into order_list set
            id='$id',
            name='$name',
            quantity=$quantity,
            total_price=$total_price,
            reg_date=now();";

    if(mysql_query($sql)){
        echo "<script>alert('주문 성공'); location.href='/main.html';</script>";
    }

    else{
        echo "<script>alert('주문 실패'); location.href='/main.html';</script>";
    }
    mysql_close();
?>