<?php
	include "./db.php";

	$rno=$_POST['rno'];
	$sql=mq("select * from reply where idx='".$rno."'");
	$reply=$sql->fetch_array();

	$bno=$_POST['b_no'];
	$sql2=mq("select * from board where idx='".$bno."'");
	$board=$sql2->fetch_array();

	$pwk=$_POST['pw'];
	$bpw=$reply['pw'];

	
	if(password_verify($pwk,$bpw)){
		$sql=mq("delete from reply where idx='".$rno."'"); 
		echo "<script>alert('COMMENT DELETE OK'); </script>";
	
?>

<script type="text/javascript">location.replace("./read.php?idx=<?php echo $board['idx'] ?>"); </script>


<?php
	} else { 
?>

<scripte type="text/javascript"> alert('PASSWORD WRONG'); history.back(); </script>

<?php
	} 
?>

