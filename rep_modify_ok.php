<?php
	include "./db.php";

	$rno=$_POST['rno'];
	//댓글번호
	$sql=mq("select * from reply where idx='".$rno."'");
	$reply=$sql->fetch_array();

	$bno=$_POST['b_no'];
	//게시글 번호
	$sql2=mq("select * from board where idx='".$bno."'");
	$board=$sql2->fetch_array();

	$sql3=mq("update reply set content='".$_POST['content']."' where idx='".$rno."'");
	echo "<script>alert('MODIFY COMPLETE');</script>";
?>

<script type="text/javascript">location.replace("./read.php?idx=<?php echo $bno; ?>");</script>

