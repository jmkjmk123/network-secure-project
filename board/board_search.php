<?php
    $keyword = $_GET['keyword'];
    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }

    mysql_select_db("final");
    $sql = "select * from board where subject like '%$keyword%'";
    $return = mysql_query($sql); 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title>검색 결과</title>
    </head>
    <body>
            검색어 : <?php echo $keyword."\n"; ?><br>
            <?php
             while($result=mysql_fetch_array($return)){
            ?>
                <a href="board_view.php?no=<?php echo $result['no']; ?>"> 글번호 : <?php echo $result['no']; ?></a> 제목 : <?php echo $result['subject']; ?> 작성자 : <?php echo $result['id']; ?> 등록일 : <?php echo $result['reg_date']; ?><br>
            <?php
             }
             mysql_close();
            ?>
    </body>
</html>