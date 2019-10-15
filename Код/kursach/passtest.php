<!DOCTYPE html>
<html>
  <head>
    <link rel="icon"type="image/png" href="icon.png">
	<!--<link href="main.css" rel="stylesheet">-->
    <title>Прохождение теста</title>
    <meta charset="utf-8">
		
		
	

	<style>
		#timer{
			margin: 20px auto;
			text-align: center;
			color: white;
			font-family: fantasy;
			font-size: 100px;
			cursor: default;
		}

		#timer div{
			display: inline;
		}
		
		input {
				text-decoration: none;
				outline: none;
				//\\display: inline-block;
				padding: 20px 30px;
				margin: 10px 20px;
				position: relative;
				color: white;
				border: 1px solid rgba(255,255,255,.4);
				background: none;
				font-weight: 300;
				font-family: 'Montserrat', sans-serif;
				text-transform: uppercase;
				letter-spacing: 2px;
			}
			input:before,
			input:after {
				content: "";
				position: absolute;
				width: 0;
				height: 0;
				opacity: 0;
				box-sizing: border-box;
			}
			input:before {
				bottom: 0;
				left: 0;
				border-left: 1px solid white;
				border-top: 1px solid white;
				transition: 0s ease opacity .8s, .2s ease width .4s, .2s ease height .6s;
			}
			input:after {
				top: 0;
				right: 0;
				border-right: 1px solid white;
				border-bottom: 1px solid white;
				transition: 0s ease opacity .4s, .2s ease width , .2s ease height .2s;
			}
			input:hover:before,
			input:hover:after{
				height: 100%;
				width: 100%;
				opacity: 1;
			}
			input:hover:before {transition: 0s ease opacity 0s, .2s ease height, .2s ease width .2s;}
			input:hover:after {transition: 0s ease opacity .4s, .2s ease height .4s , .2s ease width .6s;}
			input:hover {background: rgba(255,255,255,.2);}
		
		body{
			text-align:center;
			width:300px;
            height:200px;
            position:absolute;
            left:50%;
            font-weight: 300;
			font-family: 'Montserrat', sans-serif;
            margin:-0px 0 0 -150px;color: MistyRose;
			font-weight: 300;
			font-family: 'Montserrat', sans-serif;
		}
		
		hr.up { 
			height: 30px; 
			border-style: solid; 
			border-color: #8c8b8b; 
			border-width: 1px 0 0 0 ; 
			border-radius: 20px; 
			transform: rotate(-180deg);
		} 
		hr.down{
			height: 30px; 
			border-style: solid; 
			border-color: #8c8b8b; 
			border-width: 1px 0 0 0 ; 
			border-radius: 20px;
		}

	</style>
  </head>
  <body background="img/black-rhombicube.png">
   
   <?php
   session_start();
	  /*
		проверка, проходил ли пользователь тест? таймер
	  */
		require_once 'connection.php';
		
		$login = $_SESSION['login'];
		
		$link = mysqli_connect($host, $user, $password, $database) 
							or die("Ошибка " . mysqli_error($link));
		
		$_SESSION['testname'] = $_POST['test'];
		$query = "SELECT count(login) FROM results WHERE test='".$_SESSION['testname']."' and login='".$login."'" ;
			
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		
		$row = mysqli_fetch_row($result);
		
		$str = "<div id='timer'>
	<div id='hour'></div>&nbsp;
	<div id='minute'>5</div>&nbsp;:
	<div id='second'>0</div>
	</div>";
		if ($row[0] == '0'){
			echo $str;
			echo "<script src='scripts/timer.js'></script>";
		}
		
		
		mysqli_close($link);
      ?>
	
	
	
	<h2>
      <?php
	  /*
			вывод имени теста
	  */
		
      	if (isset($_POST['exit'])){
      		header("Location: user.php");
      		exit;
      	}
      	
      	$test = $_POST['test'];
      	$_SESSION['testname'] = $_POST['test'];
      	echo $test;
      	
      ?>
	 </h2>
    <p style="border: 1px solid; padding: 10px; border-radius: 0 20px">Для того, чтобы ответить на вопрос, требуется ввести полностью ответ.<br>
    После того, как все ответы будут заполнены, необходимо нажать на кнопку "Сохранить ответы".
	<br><br>Время на выполнение теста: 5 минут<br></p>
	
    <br>
    <p>
      <?php
	  /*
		проверка, проходил ли пользователь тест, если да, то показать результат
	  */
		require_once 'connection.php';
		
		$login = $_SESSION['login'];
		
		$link = mysqli_connect($host, $user, $password, $database) 
							or die("Ошибка " . mysqli_error($link));
		
		$query = "SELECT mark, max, login  FROM results WHERE test='".$_SESSION['testname']."' and login='".$login."'" ;
			
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		
		$row = mysqli_fetch_row($result);
		
		if ($row[2] == $login){
			echo "<h3>Вы уже проходили этот тест и набрали ", $row[0], " из ", $row[1], "</h3>";
		}
		
		
		mysqli_close($link);
      ?>
    </p>
	
	
    <form action="checkanswers.php" method="POST" >
      <input type="hidden" name="test" value = "<?php echo $_POST['testnumber']; ?>">
      <input type="hidden" name="login" value="<?php echo $_POST['login']; ?>">
      
      <?php
		/*
			вывод на экран вопросов
			сохранение порядка вопросов
			
		*/
      	require_once 'connection.php';
      	
		
      	$link = mysqli_connect($host, $user, $password, $database) 
      		or die("Ошибка " . mysqli_error($link));
      	
      	$login = $_SESSION['login'];
      	$query = "SELECT count(name) FROM tests WHERE name='".$test."'";
      	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      	
      	$countofquestions = mysqli_fetch_row($result)[0];
      	
      	$query = "SELECT question, answer0, answer1, answer2, answer3 FROM tests WHERE name='".$test."' ORDER BY rand() LIMIT 5";
      	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      	
		$questions = array('first', 'second', 'third', 'fourth', 'fifth');
		
		
      	for ($i = 0; $i < 5/*$countofquestions*/; $i++){
      		$row = mysqli_fetch_row($result);
			$p = $questions[$i];
			$_SESSION[$p] = $row[0];
			
			if ($row){
				echo "<hr class='down'>";
      		echo $row[0]."?<br><br>";
      		echo "<div style='text-align: center; border: 1px solid rgba(255,255,255,.4);'>".$row[1]."</div>&emsp;&emsp;";
      		echo "<div style='text-align: center;border: 1px solid rgba(255,255,255,.4);'>".$row[2]."</div><br><br>";
      		echo "<div style='text-align: center;border: 1px solid rgba(255,255,255,.4);'>".$row[3]."</div>&emsp;&emsp;";
      		echo "<div style='text-align: center;border: 1px solid rgba(255,255,255,.4);'>".$row[4]."</div>&emsp;&emsp;";
      		echo "<input type='text' name ='answers[]'>";
      		
			echo "<hr class='up'> <br>";
			}
			
				
			
			
      	}
		
		
      	
      	mysqli_close($link);
		
		session_write_close();
      	
		
      	
      ?>
      
     
      <?php
	  
	  
		//проверка, проходил ли пользователь тест, если да, то скрыть кнопку сохранить ответы
	  
      	require_once 'connection.php';
      	
      	$login = $_SESSION['login'];
      	
      	$link = mysqli_connect($host, $user, $password, $database) 
      						or die("Ошибка " . mysqli_error($link));
      	
      	$query = "SELECT mark, max, login  FROM results WHERE test='".$_SESSION['testname']."' and login='".$login."'" ;
      		
      	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      	
      	$row = mysqli_fetch_row($result);
      	
      	if ($row[2] != $login){
      		echo "<input type='submit' class='button' value='Сохранить ответы' name ='savetest'>";
      	}
		mysqli_close($link);	
		//echo "<input type='submit' class='button' value='Сохранить ответы' name ='savetest'>";
      ?>
    </form>
    <form action="user.php" method="POST">
      <br>
      <input type="submit" class="button" value="Вернуться" name ="exit" >
	  <br><br><br><br>
    </form>
  </body>
</html>