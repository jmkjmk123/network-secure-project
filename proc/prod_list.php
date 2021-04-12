
<!DOCTYPE html>
<html>
    <head><meta charset=utf-8></head>
    <body>
        <a href='products.php'>뒤로가기</a><br>
        <?php
            $category = $_GET['category'];
            $connect = mysql_connect("192.168.3.250", "root", "P@ssw0rd");
            if(!$connect){
                echo "DBMS connect fail";
                exit;
            }
            mysql_select_db("final");
            if($category == "total"){
                $return = mysql_query("select * from products order by category");
            }
            else{
                $return = mysql_query("select * from products where category='$category'");
            }
            while($result = mysql_fetch_array($return)){
        ?>
            상품종류 : <?php echo $result['category']; ?></a> 상품명 : <?php echo $result['name']; ?> 가격 : <?php echo $result['price']; ?><br>
        <?php
            }
        ?>
    </body>
</html>