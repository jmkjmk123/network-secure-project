<!DOCTYPE html>
<html>
    <head>
        <title> 주문 내역 확인</title>
    </head>
    <body>
        <?php
                $connect = mysql_connect("192.168.3.250", "root", "P@ssw0rd");
                if(!$connect){
                    echo "DBMS connect fail";
                    exit;
                }
                mysql_select_db("final");
                $return = mysql_query("select * from order_list order by no");
                while($result = mysql_fetch_array($return)){
            ?>
                    주문번호 : <?php echo $result['no']; ?></a> 주문자 : <?php echo $result['id']; ?> 상품 : <?php echo $result['name']; ?> 수량 : <?php echo $result['quantity']; ?> 총 금액 : <?php echo $result['total_price']; ?>  주문일시 : <?php echo $result['reg_date']; ?><br>
            <?php
                }
            mysql_close();
            ?>
    </body>
</html>