<?
if (!$num) {  // 탈퇴대상이 선택되었는지를 검사
  echo ("<SCRIPT>
    window.alert('탈퇴할 대상을 선택해 주세요.');    history.go(-1);
    </SCRIPT>");  exit;
}
$conn = mysql_connect("localhost", "cip2450",""); // MySQL 서버에 접속
   mysql_select_db("test_db", $conn);               // DB 접속

//include("db_connect.inc");  // DB 접속 정보

// member 테이블에서 사용자 정보 조회
$result = mysql_query("select * from Join_Office where num = $num", $conn);
$rcount = mysql_num_rows($result); // 대상 회원 수 조회
mysql_close($conn);          // MySQL 서버 접속 종료
$rec = mysql_fetch_array($result);
?>
<head>
  <link rel="stylesheet" href="center_view.css">
  <!-- 중앙에 동그란 직사각형 -->
  </head>
  <body>
  <div class="background">
    <div class="center_view">
<H1><center> 회사 삭제 </center></H1>

<?
echo("<center>
<FORM NAME='customer_info' ACTION='Office_deletes.php' METHOD='post'>
        <input type=hidden name='num' value=$rec[num]>
  <TABLE border=1 cellpadding=0 cellspacing=0 width=300>
   <TR>
    <TD align='center' WIDTH='80'>회사 이름</TD>    <TD> $rec[name] </TD>
  </TR>  <TR>
    <TD align='center'>가입 날짜</TD>    <TD> $rec[sign_up_date]</TD>
  </TR>   <TR>
    <TD align='center' WIDTH='80'>회사번호 확인</TD>   <TD><INPUT TYPE='password' name= 'innum' SIZE='20'></TD>
  </TR>  <TR>
    <TD COLSPAN=2 ALIGN='center'>
    <INPUT TYPE='submit' VALUE='삭 제'>
    <INPUT TYPE='button'  VALUE='돌아가기' onClick='history.go(-1);'>
  </TD></TR>
");
?>
</TABLE> </FORM>
</body></div></div></html>
