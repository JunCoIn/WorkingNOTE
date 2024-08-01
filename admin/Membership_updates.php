<?
$conn = mysql_connect("localhost", "cip2450",""); // MySQL 서버에 접속
mysql_select_db("test_db", $conn);               // DB 접속
//include("db_connect.inc");  // DB 접속 정보
$query = "update Join_Membership
        set password='$password',name='$name',sex='$sex',
        phone='$phone',email='$email' where id='$id'";
mysql_query($query, $conn);
mysql_close($conn);
echo("$id $name 님이 수정되었습니다.!!!!!!!!<BR>");
echo(" <script>location ='Membership_list.php';</script>");
?>
