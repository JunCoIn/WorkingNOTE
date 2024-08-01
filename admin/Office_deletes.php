<?
if (!$innum) {  // Form을 통해 값이 입력되었는지를 검사
  echo ("<SCRIPT>
               window.alert('회사번호를 입력해 주세요.');    history.go(-1);
            </SCRIPT>");  exit;
}
$conn = mysql_connect("localhost", "cip2450",""); // MySQL 서버에 접속
mysql_select_db("test_db", $conn);               // DB 접속 

//include("db_connect.inc");  // DB 접속 정보

// 입력된 회원 정보를 member 테이블에 저장하는 질의 생성
$res = mysql_query( "select * from Join_Office where num = $num", $conn);
$rec = mysql_fetch_array($res);
if ($innum == $rec[num] ) {
    $query = "delete from Join_Office where num = $num";
	$query1 = "drop table `{$name}_office_contact_DB`";
/*	$query2 = "drop table `{$id}_membership_schedule_DB`";
	$query3 = "drop table `{$id}_membership_message_DB`";*/
    mysql_query ( $query, $conn );	// 회원 DB에서 회원을 삭제한다.
	mysql_query ( $query1, $conn );	// 회사 contact DB를 삭제한다.
/*	mysql_query ( $query2, $conn );	// 회원 schedule DB를 삭제한다.
	mysql_query ( $query3, $conn );	// 회원 message DB를 삭제한다.*/
} else {
   echo ("<SCRIPT>
               window.alert('회사번호를 확인해주세요.');    history.go(-1);
            </SCRIPT>");  exit;
}
mysql_close($conn);                 // MySQL 서버 접속 종료   
echo(" <script>location='Office_list.php';</script>"); // 자동 이동
?>
