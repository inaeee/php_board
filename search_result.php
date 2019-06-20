<?php
	include "./dp.php";
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>FREE BOARD</title>
<link rel="stylesheet" type="text/css" href="./style.css" />
</head>

<body>
<div id="board_area">
<?php
	$catagory=$_GET['catgo'];
	$search_con=$_GET['search'];
?>
<center>
<h1><?php echo $catagory;?> 에서  '<?php echo $search_con;?>' 검색결과 </h1>
<h4 style="margin-top:30px;"> <a href="./board.php"> HOME </a></h4>
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
	$sql2=mq("select * from board where $catagory like '%$search_con%' order by idx desc");
	while($board=$sql2->fetch_array()){
		$title=$board["title"];
		if(strlen($title)>30){
			$title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
		}
		$sql3=mq("select * from reply where con_num='".$board['idx']."'");
		$rep_count=mysqli_num_rows($sql3);
?>

<tbody>
<tr>
<td width="70"><?php echo $board['idx']; ?></td>
<td width="500"><?php
	$lockimg="<img src='./img/lock.png' alt='lock' title='lock' with='20' height='20' />";
	if($board['lock_post']=="1"){
		?>
<a href="./ck_read.php?idx=<?php echo $board['idx'];?>">
<?php echo $title, $lockimg; } else { ?>

<?php
	$boardtime=$board['date'];
	$timenow=date("Y-m-d");
	if($boardtime==$timenow){
		$img="<img src='./img/new.png' alt='new' title='new' />";
	}else{
		$img="";
	}
?>

<a href="./read.php?idx=<?php echo $board['idx']; ?>">
<span style="background:yellow;"><?php echo $title; }?> </span>
<span class="re_ct"> [<?php echo $rep_count;?>] <?php echo $img;?> </span></a></td>

<td width="120"><?php echo $board['name'];?></td>
<td width="100"><?php echo $board['date'];?></td>
<td width="100"><?php echo $board['hit'];?></td>
</tr>
</tbody>

<?php } ?>
</table>


<div id="search_box2">
<form action="./search_result.php" method="get">
<select name="catgo">
<option value="title">TITLE</option>
<option value="name">NAME</option>
<option value="content">CONTENT</option>
</select>
<input type="text" name="search" size="40" required="required" /><button>SEARCH</button>
</form>
</div>
</div>
</body>
</html>
