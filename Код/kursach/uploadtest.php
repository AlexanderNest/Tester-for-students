<?php
	require_once 'connection.php';
	
	
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
	
	
		
	$query = "SELECT max(testnumber) FROM tests"; // получим номер последнего теста, чтобы правильно добавить новый
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	
	
	$currenttest = mysqli_fetch_row($result)[0] + 1; // номер, с которым будет добавлен тест
	
	$text = $_POST['test']; // текст из формы
	$allquestions = explode(';', $text); // массив вопросов и ответов
	

	foreach($allquestions as $question){
		$name = $_POST['name'];
		$ask = explode('?', $question)[0];
		$answers = explode(' ', explode('?', $question)[1]);
		$answer0 = $answers[1];
		$answer1 = $answers[2];
		$answer2 = $answers[3];
		$answer3 = $answers[4];
		$trueanswer = $answers[5];
		$query = "INSERT INTO `tests`(`name`, `testnumber`, `question`, `answer0`, `answer1`, `answer2`, `answer3`, `rightanswer`) VALUES ('".$name."','" .$currenttest."','".$ask."','".$answer0."','".$answer1."','".$answer2."','".$answer3."','".$trueanswer."')";
		
		mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));
		
	}
	
	mysqli_close($link);
	header ('Location: admin.php');
	exit();
	
?>