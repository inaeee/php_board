<?php
	include "./db.php";
	$bno=$_GET['idx'];
	$sql=mq("delete from board where idx='$bno';");
?>

<script type="text/javascript">alert("DELETE COMPLETE");</script>
<meta http-equiv="refresh" content="0; url=./board.php" />
