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

// 사용자의 입력값이 POST 방식으로 전달된다고 가정
$name = $_POST['name'];
$id = $_POST['id'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$phone = $_POST['phone'];
$email_id = $_POST['email_id'];
$email_site = $_POST['email_site'];

// 입력값 이스케이프 처리
$name = mysqli_real_escape_string($conn, $name);
$id = mysqli_real_escape_string($conn, $id);
$password = mysqli_real_escape_string($conn, $password);
$sex = mysqli_real_escape_string($conn, $sex);
$phone = mysqli_real_escape_string($conn, $phone);
$email = mysqli_real_escape_string($conn, "$email_id@$email_site");
$sign_up_date = mysqli_real_escape_string($conn, $sign_up_time);

// 아이디 중복 체크
$sql_check = "SELECT * FROM Join_Membership WHERE id = '$id'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // 아이디가 이미 존재하는 경우
    echo "<script>alert('이미 사용 중인 아이디입니다. 다른 아이디를 입력해주세요.'); history.go(-1);</script>";
    exit;
}

// 아이디가 중복되지 않는 경우, 회원가입 처리
$sql_insert = "INSERT INTO Join_Membership (name, id, password, sex, phone, email, state, sign_up_date)
               VALUES ('$name', '$id', '$password', '$sex', '$phone', '$email', 'off', '$sign_up_date')";

if ($conn->query($sql_insert) === TRUE) {
    $sql = "
        CREATE TABLE `{$id}_membership_samu_DB` (
            num INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(20),
            office_num INT NOT NULL
        );
        CREATE TABLE `{$id}_membership_schedule_DB` (
            num INT AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            title VARCHAR(30) NOT NULL,
            content VARCHAR(255)
        );
		CREATE TABLE `{$id}_membership_message_DB` (
            num INT AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            contact_name VARCHAR(30) NOT NULL,
            code INT(10)
        );
    ";

    // 자동으로 회원의 개인 DB를 만들어줌
    if ($conn->multi_query($sql)) {
        do {
            // 첫 번째 결과 집합 저장
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->next_result());

        // 테이블 생성이 성공한 경우
        echo "<script>location.href='./..';</script>";
    } else {
        // 테이블 생성이 실패한 경우
        echo "Error creating tables: " . $conn->error;
    }
} else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

// 연결 닫기
$conn->close();
?>
