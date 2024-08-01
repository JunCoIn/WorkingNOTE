<?php
// DB연결
$conn = mysql_connect("localhost", "cip2450", ""); 
mysql_select_db("test_db", $conn);

$query = "SELECT * FROM `{$id}_membership_samu_DB`";
$result = mysql_query($query, $conn);

mysql_select_db("test_db", $conn);

$query1 = "SELECT * FROM `Join_Membership`";
$result1 = mysql_query($query1, $conn);

$row1 = mysql_fetch_array($result1);
$name1 = $row1["name"];
$num1 = $row1["num"];

mysql_select_db("test_db", $conn);

$query2 = "SELECT * FROM `Join_Office`";
$result2 = mysql_query($query2, $conn);


?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>메인 화면</title>
<link rel="stylesheet" href="./../CSS/main.css">
</head>
<body>
<div class="main_display">
  <div class="main1_display">
  <div class="main1_1_display">
  <button class="click_logo_button" onclick="move_home('<?php echo $id; ?>')"><img src="./../icon/logo_wh.jpg"></button>
  <!-- <div class="main1_1_line"></div> -->
  </div> <!-- main1 1 display -->
  <div class="main1_2_display">
  <button class="back_button" onclick="view_samu_list()"><img src="./../icon/samu_icon_wh.jpg"></button>
    <div id="samu_list" style="display: none;">
      <ul>
        <?php
		while ($row = mysql_fetch_array($result)) {
		$name = $row["name"];
		$office_num = intval($row["office_num"]);
    
		// id를 문자열로 감싸서 전달
		$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
    
		echo '<li><button class="back_button" 
		onclick="move_office(\'' . $id . '\', ' . $office_num . ')">
		<font size="1">' . $name . '</font></button></li>';
		}
		?>
		<li><button class="back_button" onclick="move_office_add('<?php echo $id; ?>')">
		<img src="./../icon/office_add_icon.jpg"></button></li>

      </ul>
    </div>
  <button class="back_button" onclick="move_schedule('<?php echo $id; ?>')"><img src="./../icon/schedule_icon_wh.jpg"></button>
  <button class="back_button" onclick="move_message('<?php echo $id; ?>')"><img src="./../icon/message_icon_wh.jpg"></button>
  </div> <!-- main1 2 display -->
  <div class="main1_3_display">
  <div class="main1_2_line"></div>
  <button class="logout_button" onclick="sign_out()">
  <img src="./../icon/logout_icon_wh.jpg"></button>
  </div> <!-- main1 3 display -->
  </div> <!-- main1 display -->
  <div class="main2_display">
  <div class="main2_1_display">
  <font class="menu_text" size=5 color=#FFFFFF><b>HOME</b></font>
  <div class="main2_1_line"></div>
  </div> <!-- main2 1 display -->
  <div class="main2_2_display">
  <button class="side_button" onclick="move_message('<?php echo $id; ?>')">
  &nbsp;&nbsp;&nbsp;<img src="./../icon/contact_icon.jpg">&nbsp;&nbsp;
  <font size=4 color=black>연락처</font>
  </button>
  <button class="side_button" onclick="move_schedule('<?php echo $id; ?>')">
  &nbsp;&nbsp;&nbsp;<img src="./../icon/todo_icon.jpg">&nbsp;&nbsp;
  <font size=4 color=black>일정 및 할일</font>
  </button>
  <button class="side_button" onclick="move_schedule_view()">
  &nbsp;&nbsp;&nbsp;<img src="./../icon/community_icon.jpg">&nbsp;&nbsp;&nbsp;
  <font size=4 color=black>커뮤니티</font>
  </button>
  <button class="side_button" onclick="move_schedule_view()">
  &nbsp;&nbsp;&nbsp;<img src="./../icon/meeting_icon.jpg">&nbsp;&nbsp;&nbsp;
  <font size=4 color=black>고객센터</font>
  </button>
  </div> <!-- main2 2 display -->
  <div class="main2_3_display">
  <!-- <div class="main2_2_line"></div> -->
  <button class="profile_button"><img src="./../icon/contact_icon.jpg"></button>
  <font class="profile_name" size=4><?php echo $name1; ?></font>
  <font class="profile_code" size=4 color=#A6A6A6><b># <?php echo $num1; ?></b></font>
  
  </div> <!-- main2 3 display -->
  </div> <!-- main2 display -->
  <div class="main3_display">
  <div class="main3_1_display">
  <font class="menu_text" size=5 color=black><b>Menu</b></font>
  <div class="main3_1_line"></div>
  </div> <!-- main3 1 display -->
  <div class="main3_2_display">
  </div> <!-- main3 2 display -->
  <div class="main3_3_display">
  여기에 채팅 기능 만들기
  </div> <!-- main3 3 display -->
  </div> <!-- main3 display -->
</div> <!-- main display -->
<script>
function move_home(id) {
      var form = document.createElement('form');
      form.method = 'post';
      form.action = './../home/home.php';

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;

      form.appendChild(input);
      document.body.appendChild(form);

      form.submit();
  }
function view_samu_list() {
	   var samuList = document.getElementById("samu_list");
  if (samuList.style.display === "none") {
    samuList.style.display = "block";
  } else {
    samuList.style.display = "none";
  }
 }
function move_office_add(id) {
      var form = document.createElement('form');
      form.method = 'post';
      form.action = './../office/office_add.php';

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;

      form.appendChild(input);
      document.body.appendChild(form);

      form.submit();
  }
 function move_office(id, office_num) {
    // 폼 생성
    var form = document.createElement('form');
    form.method = 'post';
    form.action = './../office/office.php';

    // id 값 추가
    var inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;
    form.appendChild(inputId);

    // office_num 값 추가
    var inputOfficeNum = document.createElement('input');
    inputOfficeNum.type = 'hidden';
    inputOfficeNum.name = 'office_num';
    inputOfficeNum.value = office_num;
    form.appendChild(inputOfficeNum);

    // 폼을 문서에 추가
    document.body.appendChild(form);

    // 폼 제출
    form.submit();
}
function move_schedule(id) {
      var form = document.createElement('form');
      form.method = 'post';
      form.action = './../schedule/calender.php';

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;

      form.appendChild(input);
      document.body.appendChild(form);

      form.submit();
  }
function move_message(id) {
      var form = document.createElement('form');
      form.method = 'post';
      form.action = './../message/contact.php';

      var input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'id';
      input.value = id;

      form.appendChild(input);
      document.body.appendChild(form);

      form.submit();
  }
function sign_out(){
    window.location.href = './..';
}
</script>
</body>
</html>
