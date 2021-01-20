<?php
	ob_start();
	session_start();
	date_default_timezone_set('Europe/Istanbul');
	
	$connect = mysqli_connect('localhost', 'root', '', 'besdip');
	mysqli_set_charset($connect, 'utf8');
	
	function Output($json){
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
		exit();
	}
?>
