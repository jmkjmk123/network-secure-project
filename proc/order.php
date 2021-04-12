<html>
    <head>

    </head>
    <body>
        <form method="GET" action="order_proc.php">
            <?php
            session_start();
            if($_SESSION['loginID']==""){
                echo "<script>alert('로그인이 필요합니다'); location.href='/main.html';</script>";
            }
                $connect = mysql_connect("192.168.3.250", "root", "P@ssw0rd");
                if(!$connect){
                    echo "DBMS connect fail";
                    exit;
                }
                mysql_select_db("final");
                $return = mysql_query("select * from products order by category");
                while($result = mysql_fetch_array($return)){
            ?>
                <input type="radio" name="name" value="<?php echo $result['name'];?>"><?php echo $result['name']." ".$result['price']." KRW";?><br>
            <?php
                }
            ?>
            주문 수량 :<br>
            <input type="number" name="quantity">
            <input type="submit" value="주문하기">
        </form>
    </body>

</html>