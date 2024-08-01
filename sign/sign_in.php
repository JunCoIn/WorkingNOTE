<?
if(!$id) {
   echo("<script> alert('아이디를 입력하세요.'); history.go(-1); </script>
   ");   exit;
}
if(!$password) {
    echo("<script> alert('비번을 입력하세요.'); history.go(-1); </script>
    ");  exit;
}

$conn = mysql_connect("localhost", "cip2450",""); // MySQL 접속
   mysql_select_db("test_db", $conn);

$result=mysql_query("select * from Join_Membership where id='$id' ", $conn);
$total=mysql_num_rows($result);
mysql_close($conn);
if ($total==0) {

  echo("<script> alert('아이디가 없거나 비밀번호가 틀렸습니다.'); history.go(-1); </script>
    ");
  exit;
}
$passwords = mysql_result($result, 0, "password");
if ( $passwords != $password ) {
      echo("<script>alert('아이디가 없거나 비밀번호가 틀렸습니다.');       history.go(-1);
          </script>
      ");    exit;
} else {
	if( $id == "admin" && $password == "20010405")
	{
		header("Location: ./../admin/Hidden.html");
		exit;
	}
	else
	{
		 // 로그인 성공 후 id를 포함한 폼을 전송
        echo "
        <html>
        <body>
        <form id='redirectForm' method='post' action='./../home/home.php'>
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
}
?>