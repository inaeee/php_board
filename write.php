<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>BOARD</title>
<link rel="stylesheet" type="text/css" href="./style.css" />
</head>

<body>
<center>
<div id="board_write">
<h1><a href="/">FREE BOARD</a></h1>
<h4>Write Board</h4>


<div id="write_area">
<form action="write_ok.php" method="post" enctype="multipart/form-data">

<div id="in_title">
TITLE: 
<textarea name="title" id="utitle" rows="1" cols="55" placeholder="TITLE" maxlength="100" required> </textarea>
</div>
<div class="wi_line"></div>
<div id="in_name">
NAME: 
<textarea name="name" id="uname" rows="1" cols="55" placeholder="NAME" maxlength="100" required> </textarea>
</div>
<div class="wi_line"></div>
<div id="in_content">
CONTENT: 
<textarea name="content" id="ucontent" placeholder="CONTENT" required> </textarea>
</div>
<div id="in_pw">
PASSWORD: 
<input type="password" name="pw" id="upw" placeholder="PASSWORD" required />
</div>
<div id="in_lock">
<input type="checkbox" value="1" name="lockpost" />LOCKPOST
</div>

<div id="in_file">
<input type="file" value="1" name="b_file" />
</div>


<div class="bt_se">
<button type="submit">CONTENT WRITE</button>
</div>
</form>
</div>
</div>
</center>
</body>

</html>
