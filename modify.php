<?php
	include "./db.php";

	$bno=$_GET['idx'];
	$sql=mq("select * from board where idx='$bno';");
	$board=$sql->fetch_array();
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>BOARD</title>
<link rel="stylesheet" href="./style.css" />
</head>

<body>
<div id="board_write">
<h1><a href="/">FREE BOARD</a></h1>
<h4>Modify Board</h4>
<div id="write_area">
<form action="modify_ok.php/<?php echo $board['idx']; ?>" method="post">
<input type="hidden" name="idx" value="<?=$bno?>" />
<!-- 게시글 번호를 불러와 input 태그에 입력한다. -->
<div id="in_title">
<textarea name="title" id="utitle" rows="1" cols="55" placeholder="TITLE" maxlength="100" required>
<?php echo $board['title']; ?> </textarea>
</div>
<div class="wi_line"></div>
<div id="in_name">
<textarea name="name" id="uname" rows="1" cols="55" placeholder="NAME" maxlength="100" required>
<?php echo $board['name']; ?></textarea>
</div>
<div class="wi_line"></div>
<div id="in_content">
<textarea name="content" id="ucontent" placeholder="CONTENT" required>
<?php echo $board['content']; ?></textarea>
</div>
<div id="in_pw">
<input type="password" name="pw" id="upw" placeholder="PASSWORD" required />
</div>
<div class="bt_se">
<button type="submit">WIRTE CONTENT</button>
</div>
</form>
</div>
</div>
</body>
</html>
