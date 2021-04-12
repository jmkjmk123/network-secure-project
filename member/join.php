
<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title>사원 등록</title>
        <script>
            function validation(){
                var id = document.getElementById("id");
                var pass = document.getElementById("pass");
                var pass_re = document.getElementById("pass_re");
                var name = document.getElementById("name");
                var email = document.getElementById("email");
                var tel = document.getElementById("tel");
                var address = document.getElementById("address");

                if(id.value == ""){
                    alert("아이디를 입력해 주세요");
                    return false;
                }
                else if (pass.value == ""){
                    alert("비밀번호를 입력해 주세요");
                    return false;
                }
                else if (pass_re.value == ""){
                    alert("비밀번호를 재입력 해주세요");
                    return false;
                }
                else if (name.value == ""){
                    alert("이름을 입력해 주세요");
                    return false;
                }
                else if(email.value == ""){
                    alert("이메일을 입력해 주세요");
                    return false;
                }
                else if(tel.value == ""){
                    alert("전화번호를 입력해 주세요");
                    return false;
                }
                else if(address.value == ""){
                    alert("배송지 주소를 입력해 주세요");
                    return false;
                }
                else if(nickname.value == ""){
                    alert("닉네임을 입력해 주세요");
                    return false;
                }
                else if(pass.value != pass_re.value){
                    alert("비밀번호 재입력값이 맞지 않습니다");
                    return false;
                }
                return true;

            }
        </script>
    </head>

    <body>
        <form method="POST" action="join_proc.php" onsubmit="return validation();">
        <pre>
            아이디 : <input type="text" name="id" id="id">
            비밀번호 : <input type="password" name="pass" id="pass">
            비밀번호(재입력) : <input type="password" name="pass_re" id="pass_re">
            이름 : <input type="text" name="name" id="name">
            닉네임 : <input type="text" name="nickname" id="nickname">
            휴대폰 : <input type="text" name="tel" id="tel">
            이메일 : <input type="text" name="email" id="email">
            주소 : <input type="text" name="address" id="address">

            <input type="submit" value="등록"> <input type="reset" value="초기화"><input type="button" value="뒤로가기" onClick="location.href='login.php'">
        </pre>
        </form>
    </body>
</html>