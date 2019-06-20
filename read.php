<?php
	include "./db.php";
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>BOARD</title>
<link rel="stylesheet" type="text/css" href="./jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="./style.css" />
<script type="text/javascript" src="./js/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src="./js/jquery-ui.js"> </script>
<script type="text/javascript" src="./js/common.js"> </script>
</head>

<body>
<?php
	$bno=$_GET['idx'];
	$hit=mysqli_fetch_array(mq("select * from board where idx ='".$bno."'"));
	$hit=$hit['hit']+1;
	$fet=mq("update board set hit ='".$hit."' where idx = '".$bno."'");
	$sql=mq("select * from board where idx='".$bno."'");
	$board=$sql->fetch_array();
?>

<!--글 불러오기-->
<div id="board_read">
<h2><?php echo $board['title']; ?></h2>
<div id="user_info">
<?php echo $board['name']; ?> <?php echo $board['date']; ?>HIT: <?php echo $board['hit']; ?>
<div id="bo_line"></div>
</div>

<div>
FILE: <a href="./upload/<?php echo $board['file']; ?>" download>
<?php echo $board['file']; ?> </a>
</div>

<div id="bo_content">
<?php echo nl2br("$board[content]");
//nl2br이란 php함수이며 새로운 줄을 표시하는 기호를 html에서 인식할수 있도록 br태그로 변환해주는 역할  ?>
</div>

<!--목록, 수정, 삭제-->
<div id="bo_ser">
<ul>
<li><a href="./board.php">[LIST]</a></li>
<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[MODIFY]</a></li>
<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[DELETE]</a></li>
</ul>
</div>

<!--댓글 불러오기-->
<!--reply_view를 만들어서 sql문으로 reply테이블에 있는 댓글을 가져온다.-->
<!-- con_num = $bno -->
<div class="reply_view">
<h3>댓글 목록</h3>
<?php
	$sql3=mq("select * from reply where con_num='".$bno."' order by idx desc");
	while($reply=$sql3->fetch_array()){
?>
<div class="dap_lo">
<div><b><?php echo $reply['name']; ?></b></div>
<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?> </div>
<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
<div class="rep_me rep_menu">
<a class="dat_edit_bt" href="#">MODIFY</a>
<a class="dat_delete_bt" href="#">DELETE</a>
</div>

<!--댓글 수정 폼 dialog-->
<div class="dat_edit">
<form method="post" action="rep_modify_ok.php">
<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" />
<input type="hidden" name="b_no" value="<?php echo $bno; ?>" >
<input type="password" name="pw" class="dap_sm" placeholder="PASSWORD" />
<textarea name="content" class="dap_edit_t"> <?php echo $reply['content']; ?></textarea>
<input type="submit" value="MODIFY" class="re_mo_bt">
</form>
</div>

<!--댓글 삭제 비밀번호 확인-->
<div class='dat_delete'>
<form action="reply_delete.php" method="post">
<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" />
<input type="hidden" name="b_no" value="<?php echo $bno; ?>" >
<p>PASSWORD <input type="password" name="pw" /> <input type="submit" value="OK"></p>
</form>
</div>
</div>
<?php } ?>

<!-- 댓글 입력 폼 -->
<div class="dap_ins">
<form method="post" class="reply_form">
<input type="hidden" name="bno" value="<?php echo $bno; ?>" >
<input type="text" name="dat_user" id="dat_user" size="15" placeholder="ID" >
<input type="password" name="dat_pw" id="dat_pw" size="15" placeholder="PASSWORD" >
<div style="margin-top:10px; ">
<textarea name="content" class="reply_content" id="re_content" > </textarea>
<button type="submit" id="rep_bt" class="re_bt"> PUSH </button>
</div>
</form>
</div>
</div>


<div id="foot_box"></div>

</div>
</body>
</html>
