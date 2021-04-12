<?php
    $name = $_FILES['upfile']['name'];
    $tmp_name = $_FILES['upfile']['tmp_name'];
    $size = $_FILES['upfile']['size'];

    if(preg_match("/.php|.htaccess/i",$name)){
        echo "php files cannot be uploaded";
        exit;
    }//php file uploading

    $conn = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$conn){
        echo "connect fail";
        exit;
    }
    mysql_select_db("final");
    session_start();
    $move_result = move_uploaded_file($tmp_name, "./upload/$name");

    if($move_result){
        $sql = "insert into file set name='$name', user='$_SESSION[loginID]', size='$size', reg_date=now()";
        mysql_query($sql);
        echo "<script>alert('파일 업로드 성공'); location.href='file.php';</script>";
    }
    else{
        echo "<script>alert('파일 업로드 실패'); location.href='file.php';</script>";
    }
    mysql_close();
?>
