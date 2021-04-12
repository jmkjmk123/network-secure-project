<?php
    session_start();
    $token = md5(time());
    $_SESSION['anticsrftoken'] = $token;
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form method="POST" action="board_insert_proc.php">
                제목 : <input type="text" name="subject"><br>
                내용 : <textarea rows="5" cols="100" name="content"></textarea><br>
                <input type="hidden" name="anticsrftoken" value="<?php echo $token;?>">
                <input type="submit" value="등록"><input type="reset" value="취소"><br>
                <a href="board.php">뒤로가기</a>
            </form>
    </body>
</html>