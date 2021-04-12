<?php
    session_start();
    if($_SESSION['loginID'] == ""){
        echo "<script>alert('로그인 후 사용할 수 있습니다.'); location.href='admin_main.php';</script>";
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> webhard </title>
    </head>
    <body>
        <pre>
            <form method="POST" action="search_file.php">
                검색어 : <input type="text" name="keyword">

                <input type="submit" value="Search"> <input type="reset" value="Reset">
            </form>

            <form method="POST" action="upload_file.php" enctype="multipart/form-data">
                <input type="file" name="upfile">
                <input type="submit" value="upload"> <input type="reset" value="Reset">

            </form>
        </pre>
    </body>
</html>