<!DOCTYPE html>
<html>
  <head>
    <link href="main.css" rel="stylesheet">
    <link rel="icon"type="image/png" href="icon.png">
    <title>Ваши результаты</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="css/button.css" type="text/css"/>
	<style>


	body{
			font-weight: 1;
			font-family: 'Montserrat', sans-serif;
			color: white;
			
                
		}
		.tab button {
			background-color: white;
			text-color: white;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			transition: 0.3s;
			font-size: 17px;
		}

		.tab button:hover {
			background-color: #ddd;
		}
	
		.tab button.active {
			background-color: #ccc;
		}
	
		.tabcontent {
			display: none;
			padding: 6px 12px;
			border: none;
			border-top: none;
		}
		
		
		
		.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: #185875;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}
.blue { color: #185875; }
.yellow { color: #FFF842; }

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: DarkBrown;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #2d2d2d;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}



@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}


	</style>
	
	
  </head>
  <body background="img/black-rhombicube.png">
    <h2>Ваши результаты</h2>
	
	<p> 
		Здесь вы можете увидеть свои результаты, а так же проанализировать свои достижения.<br>
	</P>
	
	
	
	  
		<div class="tab">
			<button id="results" class="tablinks" onclick="openCity(event, 'London')">Результаты</button>
			<button  class="tablinks" onclick="openCity(event, 'Paris')">Анализ</button>
			<button class="tablinks" onclick="openCity(event, 'Tokyo')">Рейтинг</button>
		</div>
		
		
		<div id="London" class="tabcontent">
		<br><br>
		<p><h2> Результаты всех тестов </h2></p>
		<p> Вы можете произвести сортировку списка при необходимости, нажав на кнопку рядом с тем параметром, по которому необходимо сортировать.<p>
			<table border="15" cellpadding="5">
		<tr>
			<th>
				Название теста 
				
					<form action = "showresults.php" method="post">
						<input type="submit" value="&darr;" name="sortnamedown"> 
						<input type="submit" value="&uarr;" name="sortnameup">
					</form>
				
			</th>
			<th> 
				<b>Результат</b> 
				<form action = "showresults.php" method="post">
						<input type="submit" value="&darr;" name="sortresultdown"> 
						<input type="submit" value="&uarr;" name="sortresultup">
				</form>
			</th>
		</tr>
		
		<input type="hidden" value=
			<?php 
				require_once 'connection.php';
				
				$link = mysqli_connect($host, $user, $password, $database) 
					or die("Ошибка " . mysqli_error($link));
				
				session_start();
				$login = $_SESSION['login'];
				
				$query = "SELECT count(mark) FROM results WHERE mark=0";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				
				$value = mysqli_fetch_row($result)[0];
				
				echo $value;
				
				mysqli_close($link);
				
			?> id="mark0">
		<input type="hidden" value=
			<?php
				require_once 'connection.php';
				
				$link = mysqli_connect($host, $user, $password, $database) 
					or die("Ошибка " . mysqli_error($link));
				
				
				$login = $_SESSION['login'];
				
				$query = "SELECT count(mark) FROM results WHERE mark=1";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				
				$value = mysqli_fetch_row($result)[0];
				
				echo $value;
				
				mysqli_close($link);
			?> id="mark1">
		<input type="hidden" value=
			<?php
				require_once 'connection.php';
				
				$link = mysqli_connect($host, $user, $password, $database) 
					or die("Ошибка " . mysqli_error($link));
				
				
				$login = $_SESSION['login'];
				
				$query = "SELECT count(mark) FROM results WHERE mark=2";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				
				$value = mysqli_fetch_row($result)[0];
				
				echo $value;
				
				mysqli_close($link);
			?> id="mark2">
		<input type="hidden" value=
			<?php
				require_once 'connection.php';
				
				$link = mysqli_connect($host, $user, $password, $database) 
					or die("Ошибка " . mysqli_error($link));
				
				
				$login = $_SESSION['login'];
				
				$query = "SELECT count(mark) FROM results WHERE mark=3";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				
				$value = mysqli_fetch_row($result)[0];
				
				echo $value;
				
				mysqli_close($link);
			?> id="mark3">
		<input type="hidden" value=
			<?php
				require_once 'connection.php';
				
				$link = mysqli_connect($host, $user, $password, $database) 
					or die("Ошибка " . mysqli_error($link));
				
				
				$login = $_SESSION['login'];
				
				$query = "SELECT count(mark) FROM results WHERE mark=4";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				
				$value = mysqli_fetch_row($result)[0];
				
				echo $value;
				
				mysqli_close($link);
			?> id="mark4">
		<input type="hidden" value=
			<?php
				require_once 'connection.php';
				
				$link = mysqli_connect($host, $user, $password, $database) 
					or die("Ошибка " . mysqli_error($link));
				
				
				$login = $_SESSION['login'];
				
				$query = "SELECT count(mark) FROM results WHERE mark=5";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
				
				$value = mysqli_fetch_row($result)[0];
				
				echo $value;
				
				mysqli_close($link);
			?> id="mark5">
		

      <?php
      	
      	require_once 'connection.php';
      	
      	$link = mysqli_connect($host, $user, $password, $database) 
      		or die("Ошибка " . mysqli_error($link));
      	
      	$login = $_SESSION['login'];
		
		
		if (isset($_POST['sortnamedown'])){
			$query = "SELECT test, mark, max FROM results WHERE login='".$login."' ORDER BY test DESC";
		}
		else if (isset($_POST['sortnameup'])){
			$query = "SELECT test, mark, max FROM results WHERE login='".$login."' ORDER BY test";
		}
		else if (isset($_POST['sortresultup'])){
			$query = "SELECT test, mark, max FROM results WHERE login='".$login."' ORDER BY mark DESC";
		}
		else if (isset($_POST['sortresultdown'])){
			$query = "SELECT test, mark, max FROM results WHERE login='".$login."' ORDER BY mark";
		}
		else{
			$query = "SELECT test, mark, max FROM results WHERE login='".$login."'";
		}
		
      	
      	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      	
      	while ($row = mysqli_fetch_row($result)){
			echo "<tr>";
			echo "<th>".$row[0]."</th>";
			echo "<th>", $row[1], " из ", $row[2];
			echo "</tr>";
      	}
      	
      	mysqli_close($link);
      ?>
	  
	  </table>
		</div>

		<div id="Paris" class="tabcontent">
			<br><br>
			<p> 
				Диаграмма ниже показывает сколько вы набрали оценок, а так же показывает, каких. <br>
				Нажав на иконку оценки, вы можете отключить или включить ее из диаграммы.
			</p>
	  <br> <br>
	  <canvas id="myChart"></canvas>
	  
	  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	  <script src="diagram.js"></script>
		</div>

		<div id="Tokyo" class="tabcontent">
		<br><br>
			<p><h4>Рейтинг топ-10 участников тестирования</h4></p>
			<table class="container">
				<tr>
					<th>
						Позиция
					</th>
					<th>
						Логин
					</th>
					<th>
						Результат
					</th>
				<tr>
					
					<?php
						require_once 'connection.php';
				
						$link = mysqli_connect($host, $user, $password, $database) 
							or die("Ошибка " . mysqli_error($link));
				
						$login = $_SESSION['login'];
						$query = "SELECT login, SUM(mark) as val FROM results GROUP BY login ORDER BY `val` DESC LIMIT 10";
						$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
						
						$i = 1;
						while ($row = mysqli_fetch_row($result)){
							echo "<tr>";
							echo "<th>".$i."</th>";
							echo "<th>".$row[0]."</th>";
							echo "<th>".$row[1]."</th>";
							echo "</tr>";
							
							$i++;
					
							
		
						}
						
						mysqli_close($link);
					?>
					
				</tr>
			</table>
		</div>

	<script>
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}
	</script>
	  
	  
	<script>
		document.getElementById("results").click();
	</script>
	  
	  
	  <br><br>
      <a href="user.php" class = "a">Назад</a>
	  
	  
	  
  </body>
</html>