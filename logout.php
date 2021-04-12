<?php
    session_start();
    if($_SESSION['loginID']==""){
        echo "<script>alert('로그인중이 아닙니다'); location.href='main.html';</script>";
    }

    session_destroy();

    echo "<script>alert('로그아웃 되었습니다'); location.href='main.html';</script>";
?>