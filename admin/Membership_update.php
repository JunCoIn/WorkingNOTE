<?  // 회원 정보 수정 화면
$conn = mysql_connect("localhost", "cip2450",""); // MySQL 서버에 접속
mysql_select_db("test_db", $conn);               // DB 접속

//include("test_db");  // DB 접속 정보
$result =mysql_query("select * from Join_Membership where  id = '$id'", $conn);
$rec = mysql_fetch_array($result);
//  검색한 회원정보 출력 화면
?>
<html><head>
 <link rel="stylesheet" href="center_view.css">
  <!-- 중앙에 동그란 직사각형 -->
</head>
<body>
<div class="background">
    <div class="center_view"><center>
	<H1><center> 회원정보 수정 </center></H1>
<?
echo("
  <FORM  NAME='customer_info' ACTION='Membership_updates.php' METHOD='post'>
        <input type=hidden name='id' value=$rec[id]>
  <TABLE WIDTH='600'border=1>
  <TR>
    <TD align='center' FONT COLOR='Navy' WIDTH='80'> <SMALL> <B>아이디</B></SMALL></TD>
    <TD>$rec[id]</TD>
  </TR> <TR>
    <TD align='center' FONT COLOR='Navy'> <SMALL><B>비밀번호</B></SMALL></TD>
    <TD><INPUT TYPE='text' name='password' SIZE='10' value=$rec[password]></TD>
  </TR><TR>
    <TD align='center' FONT COLOR='Navy'><SMALL><B>성    명</B></SMALL></TD>
    <TD><INPUT TYPE='text' name='name' SIZE='10' value=$rec[name]></TD>
  </TR><TR>
    <TD align='center' FONT COLOR='Navy'><SMALL><B>성    별</B></SMALL></TD>
");
if($rec[sex] == 'M') { $s1 = 'checked'; $s2 = ''; } // 남자
else                      { $s1 = '';        $s2 = 'checked'; } // 여자
echo("
    <TD><input type=radio name='sex' value='M' $s1>남
            <input type=radio name='sex' value='F' $s2>여</TD>
 </TR><TR>
    <TD align='center' FONT COLOR='Navy'><SMALL><B>전화번호</B></SMALL></TD>
    <TD><INPUT TYPE='text' name='phone' SIZE='18' value=0$rec[phone]></TD>
 </TR><TR>
    <TD align='center' FONT COLOR='Navy'><SMALL><B>이메일</B></SMALL></TD>
    <TD><INPUT TYPE='text' name='email' SIZE='18' value=$rec[email]>
	</TD>
 </TR>
 <TR>
    <TD align='center' FONT COLOR='Navy'><SMALL><B>가입날짜</B></SMALL></TD>
    <TD>$rec[sign_up_date]
	</TD>
 </TR>
</TABLE>
<center><br>
    <INPUT TYPE='submit' VALUE='  수 정  '>
    <INPUT TYPE='button'  VALUE='돌아가기' onClick='history.go(-1);'>
	</center></FORM>
");
?>
</div></div>
</body></html>
