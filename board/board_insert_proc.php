<?php
    session_start();
    if($_POST['anticsrftoken'] != $_SESSION['anticsrftoken'] || $_POST['anticsrftoken'] == "" || $_SESSION['anticsrftoken'] == "" ){
        echo "csrf attack detected";
        exit;
    }//CSRF attack check
    if($_SESSION['loginID']!=""){
        $id = $_SESSION['loginID'];
    }
    else $id="Guest";
    
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $subject = htmlspecialchars($subject);
    $content = htmlspecialchars($content);//script encoding

    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }
    mysql_select_db("final");
    
    $sql = "insert into board set
            id='$id',
            subject='$subject',
            content='$content',
            reg_date=now();";
    $return = mysql_query($sql);
    if($return){
        echo "<script>alert('글이 등록되었습니다'); location.href='board.php';</script>";
    }
    else{
        echo "<script>alert('등록 실패입니다'); location.href='board.php';</script>";
    }
    mysql_close();
?>