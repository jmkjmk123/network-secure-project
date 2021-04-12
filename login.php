

<!DOCTYPE html>
<html>
    <?php
        session_start();
        if($_SESSION['loginID']!=""){
            echo "<script>alert('이미 로그인 되었습니다'); location.href='main.html';</script>";
        }
    ?>
    <head>
        <title>로그인</title>
    </head>

    <body>
        <form method="POST" action="login_proc.php">
            <pre>
아이디 : <input type="text" name="id">
비밀번호 : <input type="password" name="pass">
            </pre>
            <input type="submit" value="로그인">&nbsp;
            <input type="button" value="회원가입" onClick="location.href='/member/join.php'">
        </form>
    </body>

</html>