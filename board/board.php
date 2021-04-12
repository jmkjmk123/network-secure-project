
<!DOCTYPE html>
<html>
    <head>
        <title>사내 게시판</title>
    </head>
    <body>
        <a href="board_insert.php">새 게시물 작성</a>
        <form method="GET" action="board_search.php">
                검색 키워드 : <input type="text" name="keyword">
                <input type="submit" value="검색"> <input type="reset" value="취소">
            </form>
        <pre>
            <?php
                $connect = mysql_connect("localhost", "root", "P@ssw0rd");
                if(!$connect){
                    echo "DBMS connect fail";
                    exit;
                }
                mysql_select_db("final");
                $return = mysql_query("select * from board");
                while($result = mysql_fetch_array($return)){
            ?>
                    <a href="board_view.php?no=<?php echo $result['no']; ?>"> 글번호 : <?php echo $result['no']; ?></a> 제목 : <?php echo $result['subject']; ?> 작성자 : <?php echo $result['id']; ?> 등록일 : <?php echo $result['reg_date']; ?><br>
            <?php
                }
                mysql_close();
            ?>
        </pre>
    </body>
</html>

<?php

?>