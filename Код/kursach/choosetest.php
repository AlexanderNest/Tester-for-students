<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css" type="text/css"/>
		<link rel="icon"type="image/png" href="icon.png">
		<title>Выберите тест</title>
		<meta charset="utf-8">
		
		<style>
			html {height: 100%}
			body, html {
				background-color: #000;
				color: #fff;
				width: 100%;
				height: 100%;
				margin: 0;
				padding: 0;
				overflow: hidden;
			}
			canvas {
				position:absolute;
				top:0;
				left:0
			}
			a, select, input {
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
			a:before,
			a:after {
				content: "";
				position: absolute;
				width: 0;
				height: 0;
				opacity: 0;
				box-sizing: border-box;
			}
			a:before {
				bottom: 0;
				left: 0;
				border-left: 1px solid white;
				border-top: 1px solid white;
				transition: 0s ease opacity .8s, .2s ease width .4s, .2s ease height .6s;
			}
			a:after {
				top: 0;
				right: 0;
				border-right: 1px solid white;
				border-bottom: 1px solid white;
				transition: 0s ease opacity .4s, .2s ease width , .2s ease height .2s;
			}
			a:hover:before,
			a:hover:after{
				height: 100%;
				width: 100%;
				opacity: 1;
			}
			a:hover:before {transition: 0s ease opacity 0s, .2s ease height, .2s ease width .2s;}
			a:hover:after {transition: 0s ease opacity .4s, .2s ease height .4s , .2s ease width .6s;}
			a:hover {background: rgba(255,255,255,.2);}
		</style>
		
	</head> 
	
	
	<body>
	
		<canvas id="bgCanvas"></canvas>
		<script src="scripts/background.js"></script>
		
		<div style=" width:300px;
                height:200px;
                position:absolute;
                left:50%;
                top:50%;
                margin:-100px 0 0 -150px;">	
				
			<form action="passtest.php" method="post">
				<select name="test" style="background-color: none; color: none; width:280px;"; >
					<?php
						session_start();
					
						$login = $_SESSION['login'];
						
						require_once 'connection.php';
						
						$link = mysqli_connect($host, $user, $password, $database) 
							or die("Ошибка " . mysqli_error($link));
						
						$login = $_POST['login'];
						$query = "SELECT DISTINCT testnumber, name FROM tests";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						
						while ($row = mysqli_fetch_row($result)){
							
							//echo $row[0] , " ", $row[1], "<br><br>";
							echo "<option style='color:black; background-color: transparent'> $row[1] </option>";
							
		
						}
						
						mysqli_close($link);
					?>
				</select>
				
				<input class = "a" type="submit" name="" value="Пройти тест" style="width:280px; text-align: center;">
				<br>
				<input class ="a" type="submit" name="exit" value="Вернуться" style="width:280px; text-align: center;">
			</form>
		</div>
	</body>
</html>