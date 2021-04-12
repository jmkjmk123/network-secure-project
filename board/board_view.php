<?php
    session_start();
    $no = $_GET['no'];
    if(preg_match("/select|insert|delete|update|drop|union|from|database|information_schema|limit/i", $no)){
        echo "<script>alert('SQL injection');</script>";
        exit;
    }//SQL Injection filtering

    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }

    mysql_select_db("final");
    
    $sql = "select * from board where no='$no'";
    $result = mysql_fetch_array(mysql_query($sql));

    $result['subject'] = htmlspecialchars($result['subject']);
    $result['content'] = htmlspecialchars($result['content']);

    mysql_close();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title><?php echo $result['subject']; ?></title>
    </head>
    <body>
        <pre>
            제목 : <?php echo $result['subject']."\n"; ?>
            내용 : <?php echo $result['content']."\n"; ?>
            작성자 : <?php echo $result['id']."\n"; ?>
            등록일 : <?php echo $result['reg_date']."\n"; ?>
        </pre>
    </body>
</html>