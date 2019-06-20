<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8'); //인코딩 타입을 utf-8로 맞춰주는 함수

	$db=new mysqli("localhost","hwangia1786","mshwangia1786M","hwangia1786");
	$db->set_charset("utf8");

	function mq($sql){
		global $db; //global은 외부에서 선언된 $sql를 함수 내에서 쓸 수 있게 해준다.
		return $db->query($sql);
	}
?>
