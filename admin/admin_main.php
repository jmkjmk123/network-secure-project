<?php
    session_start();
    if($_SESSION['loginID']==""){
        echo "<script>alert('관리자 계정이 아닙니다'); location.href='admin.php';</script>";
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset=utf-8>
        <title>Admin page</title>
    </head>
    <body>
        <h3>관리자 페이지</h3><br>
        <a href="manage_member.php">회원 관리</a><br>
        <a href="/proc/order_list.php">주문 내역</a><br>
        <a href="manage_board.php">게시판 관리</a><br>
        <a href="file.php">파일 관리</a>
    </body>
</html>