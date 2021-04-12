<?php
    $connect = mysql_connect("localhost", "root", "P@ssw0rd");
    if(!$connect){
        echo "DBMS connect fail";
        exit;
    }
    mysql_select_db("final");
    $return = mysql_query("select * from member");
    while($result = mysql_fetch_array($return)){
    ?>
            아이디 : <?php echo $result['id']; ?></a> 비밀번호 : <?php echo $result['pass']; ?> 
            이름 : <?php echo $result['name']; ?> 전화번호 : <?php echo $result['tel']; ?> 
            이메일 : <?php echo $result['email']; ?> 주소 : <?php echo $result['address']; ?>
            <a href="delete_member.php?id='<?php echo $result['id'];?>'">회원 탈퇴</a><br>
    <?php
        }
    mysql_close();
?>