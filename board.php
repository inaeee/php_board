<?php
	include "./db.php";
?>



<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>BOARD</title>
<link rel="stylesheet" type="text/css" href="./style.css" />
</head>



<body>
<div id="board_area">
<center>
<h1>FREE BOARD</h1>
<h4>Hwang inae's Board</h4>
<br>
</center>
<table class="list-table">
<thead>
<tr>
<th width="70">NUMBER</th>
<th width="500">TITLE</th>
<th width="120">NAME</th>
<th width="100">DATE</th>
<th width="100">HIT</th>
</tr>
</thead>

<?php
	$sql=mq("select * from board order by idx desc limit 0,5");
	//board 테이블에 있는 idx를 기준으로 내림차순해서 5개까지 표시
	while($board=$sql->fetch_array()){
	//쿼리의 행이 끝날때까지 반복
		$title=$board["title"];
		if(strlen($title)>30){
			$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
			//title이 30을 넘으면 ...표시		
		}

	
	$sql2=mq("select * from reply where con_num='".$board['idx']."'");
	//reply 테이블에서 con_num 항목이 board 테이블의 idx와 같은 것을 선택하고, rep_count 변수에  mysqli_num_rows 함수로 카운트
	$rep_count=mysqli_num_rows($sql2);
?>

<tbody>
<tr>
<td width="70"><?php echo $board['idx']; ?></td>
<td width="500"><?php $lockimg="<img src='./img/lock.png' alt='lock' title='lock' with='20' height='20' />";
if($board['lock_post']=="1"){
	?><a href="./ck_read.php?idx=<?php echo $board['idx'];?>"><?php echo $title, $lockimg;}
else{
	?> 

<?php
	$boardtime=$board['date'];
	$timenow=date("Y-m-d");
	if($boardtime==$timenow){
		$img="<img src='./img/new.png' alt='new' title='new' />";
	}else{
		$img="";
	}
?>

<a href="./read.php?idx=<?php echo $board['idx'];?>"><?php echo $title; }?>
<span class="re_ct"> [<?php echo $rep_count; ?>] <?php echo $img; ?> </spen></a></td>
<td width="120"><?php echo $board['name']; ?></td>
<td width="100"><?php echo $board['date']; ?></td>
<td width="100"><?php echo $board['hit']; ?></td>
</tr>
</tbody>
<?php } ?>
</table>


<div id="write_btn">
<a href="./write.php"><button>WRITE</button></a>
</div>



<center>
<div id="search_box">
<form action="./search_result.php" method="get">
<select name="catgo">
<option value="title">TITLE</option>
<option value="name">NAME</option>
<option value="content">CONTENT</option>
</select>
<input type="text" name="search" size="40" required="required" /><button>SEARCH</button>
</form>
</div>
</center>


</div>
</body>
</html>
