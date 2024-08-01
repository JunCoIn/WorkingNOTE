<?php
$servername = "localhost";
$username = "cip2450";
$pass = ""; // 비밀번호 필드에 비밀번호를 입력해야 합니다.
$dbname = "test_db";

// MySQL 서버에 연결
$conn = new mysqli($servername, $username, $pass, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 회원가입 날짜 및 현재 시간 가져오기
$sign_up_time = date("Y-m-d, H:i");

// 입력값 이스케이프 처리
$id = mysqli_real_escape_string($conn, $id);
$name = mysqli_real_escape_string($conn, $name);
$office_num = mysqli_real_escape_string($conn, $office_num);

$sql_insert = "INSERT INTO `{$id}_membership_samu_DB` (name, office_num)
               VALUES ('$name', '$office_num')";

if ($conn->query($sql_insert) === TRUE) {
   echo "
        <html>
        <body>
        <form id='redirectForm' method='post' action='./../main/home.php'>
            <input type='hidden' name='id' value='$id'>
        </form>
        <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
        </script>
        </body>
        </html>
        ";
        exit;
}


// 연결 닫기
$conn->close();
?>
