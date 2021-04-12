<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            session_start();
            if($_SESSION['loginID']==""){
                echo "<script>alert('로그인이 필요합니다'); location.href='/main.html';</script>";
            }
            echo $_SESSION['loginID'];?> 님의 주문 내역 입니다.<br>
        <?php
            $connect = mysql_connect("192.168.3.250", "root", "P@ssw0rd");
            if(!$connect){
                echo "DBMS connect fail";
                exit;
            }
            mysql_select_db("final");
            $return = mysql_query("select * from order_list");
            while($result = mysql_fetch_array($return)){
            ?>
                    상품명 : <?php echo $result['name']; ?></a> 주문수량 : <?php echo $result['quantity']; ?> 결제금액 : <?php echo $result['total_price']; ?> 주문날짜 : <?php echo $result['reg_date']; ?><br>
            <?php
                }
            mysql_close();
            ?>
    </body>
</html>