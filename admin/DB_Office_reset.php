<?
$conn = mysql_connect("localhost", "cip2450",""); // MySQL 서버에 접속
mysql_select_db("test_db", $conn);               // DB 접속
$sql1 = "drop table Join_Office";
$sql2 = "create table Join_Office
(num int AUTO_INCREMENT PRIMARY KEY,
name varchar(20),
make_id varchar(20),
sign_up_date VARCHAR(20)
)";
mysql_query($sql1, $conn);
mysql_query($sql2, $conn);
mysql_close($conn);
 echo ("<SCRIPT>  location.href='DBmanage.html'; </SCRIPT>");  exit;
?>
