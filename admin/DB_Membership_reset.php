<?
$conn = mysql_connect("localhost", "cip2450",""); // MySQL 서버에 접속
mysql_select_db("test_db", $conn);               // DB 접속
$sql1 = "drop table Join_Membership";
$sql2 = "create table Join_Membership
(num int AUTO_INCREMENT PRIMARY KEY,
name varchar(20),
id varchar(20),
password varchar(20),
sex varchar(5),
phone int(20),
email varchar(40),
state VARCHAR(10),
sign_up_date VARCHAR(20)
)";
$sql3 = "INSERT INTO Join_Membership 
(name, id, password, sex, phone, email, state, sign_up_date) 
VALUES 
('관리용아이디', 'admin', '20010405', 'M', 0000, 'admin@WorkingNOTE', 'off', '1')";
/*$sql4 = "INSERT INTO Join_Membership 
(name, id, password, sex, phone, email, state, sign_up_date) 
VALUES 
('개발용아이디', 'develop', '20010405', 'M', 0000, 'develop@WorkingNOTE', 'off', '1')";*/
mysql_query($sql1, $conn);
mysql_query($sql2, $conn);
mysql_query($sql3, $conn);
/*mysql_query($sql4, $conn);*/
mysql_close($conn);
 echo ("<SCRIPT>  location.href='DBmanage.html'; </SCRIPT>");  exit;
?>
