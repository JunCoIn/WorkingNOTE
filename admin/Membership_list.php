<?  // 회원 목록 출력

$conn = mysql_connect("localhost", "cip2450",""); 
mysql_select_db("test_db", $conn);        

if(!$name) $query= "select * from Join_Membership";
else $query= "select * from Join_Membership where name like '%$name%'";

$result = mysql_query($query, $conn); 
mysql_close($conn);
?>
<HTML>
<head>
  <link rel="stylesheet" href="center_view.css">
  <!-- 중앙에 동그란 직사각형 -->
  <style>
  .back_button {
    width: 200px;
    height: 30px;
    background-color: white;
    border: 1px solid #000;
	border-radius: 5px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
	margin-top: 20px;
	transition: background-color 0.3s ease;
  }
  .back_button:hover {
    background-color: lightgray; /* 마우스 호버 시 배경색 변경 */
  }
  </style>
  </head>
 <body>
 <div class="background">
    <div class="center_view">
<H1><center> 회원관리 </center></H1>
<center><button class="back_button" onclick="GoToHidden()">관리자 페이지로 돌아가기</button></center>
<br>
<center><table border=1 cellpadding=0 cellspacing=0 width=90%></center>
<TR><TD><center>회원번호</center></TD>
<TD><center> 성명 </center></TD>
<TD><center> 성별 </center></TD>
<TD><center> 아이디 </center></TD>
<TD><center> 비밀번호 </center></TD>
<TD><center> 전화번호 </center></TD>
<TD><center> 이메일 </center></TD>
<TD><center> 가입날짜 </center></TD>
<TD><center> 상태(온/오프) </center></TD>
<TD><center>수정</center></TD>
<TD><center>삭제</center></TD></TR>
<?
while($rec = mysql_fetch_array($result)) {
  if($rec[sex]=='M') $s1 = '남성';
  else                     $s1 = '여성';
  echo("
    <TR><TD><center> $rec[num] </center></TD>
    <TD BGCOLOR='white' ><center>$rec[name]</center></TD>
	<TD BGCOLOR='white'><center>$s1 </center></TD>
    <TD BGCOLOR='white'><center>$rec[id] </center></TD>
	<TD BGCOLOR='white'><center>$rec[password] </center></TD>
    <TD BGCOLOR='white'><center> 0$rec[phone]</center></TD>
	<TD BGCOLOR='white'><center> $rec[email]</center></TD>
    <TD BGCOLOR='white'><center> $rec[sign_up_date] </center></TD>
	<TD BGCOLOR='white'><center> $rec[state] </center></TD>
	<TD BGCOLOR='white'><center> 
	<a href='Membership_update.php?id=$rec[id]'> 수정</a> </center></TD>
	<TD BGCOLOR='white'><center> 
	<a href='Membership_delete.php?num=$rec[num]'> 삭제</a> </center></TD></TR> ");
}
?> </table><BR><center>
<form action='Membership_list.php' method='post'>
   <b>성명 검색 : </b>
   <input type='text' size='15' name='name'>
   <input type='submit' value="찾기"> &nbsp;&nbsp;
</form>
</center></div></div>
<script>
	function GoToHidden() {
    window.location.href = 'Hidden.html';		
}

</script>
</body></html>
