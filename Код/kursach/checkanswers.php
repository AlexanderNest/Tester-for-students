<?php
	if (isset($_POST['exit'])){
		header("Location: login.php");
		exit;
	}
	
	if (!isset($_SESSION)){
		session_start();
	}
	
	require_once 'connection.php';
	
	$answers = $_POST['answers'];
	$questions = array($_SESSION['first'], $_SESSION['second'], $_SESSION['third'], $_SESSION['fourth'], $_SESSION['fifth']);
	//print_r($questions);
	//echo "<br><br>";
	for ($i=0; $i < 5; $i++){
		//echo $questions[$i], " ", $answers[$i], "<br><br>";		
	}
	
	$count = count($answers);
	$login = $_SESSION['login'];
	$test = $_POST['test'];
	
	
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
	
	
	//$query = "SELECT distinct name FROM tests WHERE testnumber=".$test;
	//$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	
	$nameoftest = $_SESSION['testname'];//mysqli_fetch_row($result)[0];
	
	

	$i = 0;
	$mark = 0;
	
	while ($i < 5){
		$query = "SELECT rightanswer FROM tests WHERE name='".$nameoftest."' and question='".$questions[$i]."'";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		
		
		$row = mysqli_fetch_row($result)[0];
		
		//echo $answers[$i], " ", $row, "<br>";
		
		
		if (!strcmp($answers[$i], $row)){
			//echo "true, case";
			$mark++;
		}
	
		$i++;
	}
	
	
	$query = "SELECT login FROM results WHERE login='".$login."' and test='".$nameoftest."'";
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	$row = mysqli_fetch_row($result);
	

	if ($row[0] != $login){
		$query = "INSERT INTO `results`(`login`, `test`, `mark`, `max`) VALUES ('".$login."', '".$nameoftest."', ".$mark.", ".$count.")";
		mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	}
	
	mysqli_close($link);
	
	echo "<h2>Правильные ответы: $mark/$count</h2>";
	echo "Вы будете перенаправлены на свою страницу";
	
	echo "<meta http-equiv='Refresh' content='5; url=user.php'>";

	
?>