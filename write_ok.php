<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<?php
	include "./db.php";
	$date=date('Y-m-d');
	//현재시간 나타냄
	//$userpw=password_hash($_POST['pw'], PASSWORD_DEFAULT);
	//비밀번호 암호로 나타내기
	if(isset($_POST['lockpost'])){
		$lo_post='1';
	}else{
		$lo_post='0';
	}


	$tmpfile=$_FILES['b_file']['tmp_name'];
	$o_name=$_FILES['b_file']['name'];
	$filename=iconv("UTF-8","EUC-KR",$_FILES['b_file']['name']);
	$folder="./upload/".$filename;
	move_uploaded_file($tmpfile,$folder);


	$sql=mq("insert into board(name,pw,title,content,date,lock_post,file) values('".$_POST['name']."','".$_POST['pw']."','".$_POST['title']."','".$_POST['content']."','".$date."','".$lo_post."','".$o_name."')");
?>

<script type="text/javascript"> alert("WRITE COMPLETE"); </script>
<meta http-equiv="refresh" content="0; url=./board.php" />


