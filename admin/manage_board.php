<!DOCTYPE html>
<html>
    <head>
        <title>게시판 관리</title>
    </head>
    <body>
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
                    <a href="/board/board_view.php?no=<?php echo $result['no']; ?>"> 글번호 : <?php echo $result['no']; ?>
                    </a> 제목 : <?php echo $result['subject']; ?> 작성자 : <?php echo $result['id']; ?> 등록일 : <?php echo $result['reg_date']; ?>
                    <a href="board_del.php?no=<?php echo $result['no'];?>">삭제</a><br>
            <?php
                }
                mysql_close();
            ?>
    </body>
</html>