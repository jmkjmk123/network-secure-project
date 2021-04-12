<?php
    $keyword = $_POST['keyword'];

    $conn = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$conn){
        echo "connect fail";
        exit;
    }

    mysql_select_db("final");
    $return = mysql_query("select * from file where name like '%$keyword%'");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Result </title>
    </head>
    <body>
        <pre>
            검색어 : <?php echo $keyword."\n"; ?>
            <?php
                while($result = mysql_fetch_array($return)){
                    ?>
                    번호 : <?php echo $result['no']."\n";?>
                    이름 : <a href="down_file.php?name=<?php echo $result['name'];?>"><?php echo $result['name'];?><a>
                    크기 : <?php echo $result['size']."\n";?>
                    등록자 : <?php echo $result['user']."\n";?>
                    등록일 : <?php echo $result['reg_date']."\n";?>
                    <br>
                    <?php
                }
                mysql_close();
                ?>
        </pre>
    </body>
</html>