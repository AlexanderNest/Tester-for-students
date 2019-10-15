<?php
	require_once 'connection.php';
	
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
	
	
	$test = $_POST['test'];
	$query = "DELETE FROM `tests` WHERE name='".$test."'";
	mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	
	mysqli_close($link);
	
	header ('Location: deletetest.php');
	exit();
?>