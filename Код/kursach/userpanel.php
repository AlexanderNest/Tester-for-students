<!DOCTYPE html>
<html>
  <head>
	<link href="main.css" rel="stylesheet">
    <link rel="icon"type="image/png" href="icon.png">
    <title>Автоматизированная система проведения тестирования</title>
    <meta charset="utf-8">
	
	<style>
	body{
			font-weight: 1;
			font-family: 'Montserrat', sans-serif;
			color: white;
			
                
		}
		container th h1 {
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
  color: white;
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

input {
  text-decoration: none;
  outline: none;
  display: inline-block;
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
	</style>
  </head>
  <body  style="background: linear-gradient(to right, #000000, #434343);">
    <h2>Редактирование списка пользователей</h2>
    <form action="changeusers.php" method="POST">
    <input type="submit"  value="Добавить" name="register">
	<?php 
		session_start();
		if (!strcmp($_SESSION['login'], 'admin')){
			echo "<input type='submit' value='Добавить админа' name='registeradmin'>";
		}
		?>
    <input type="submit"  value="Удалить" name="delete">
    <p>
    	Имя пользователя  &emsp;
    	<input type="text" style="width:300px" name="login" placeholder="Логин">
    </p>
    <p>
    	Пароль  &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; &ensp;       
    	<input style="width:300px" type="text" name="password" placeholder="Ввод пароля при добавлении">
    </p>
    
	
    </form>    
      <form action="admin.php" method="POST">
      <input type="submit"  value="Назад">
    </form>
	
	
    
	<table class="container" border=1 cellpadding=5">
		<tr>
			<th>
				Номер 
			</th>
			<th>
				Пользователь
			</th>
		</tr>
		<?php
		require_once 'connection.php';
		
		$link = mysqli_connect($host, $user, $password, $database) 
			or die("Ошибка " . mysqli_error($link));
		
		
			
		$query = "SELECT login FROM users"; 
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		
		echo "<br><br><br>";
		
		$i = 1;
		while ($row = mysqli_fetch_row($result)){
			if ($row[0] != 'admin'){
				echo "<tr>";
				echo "<th>", $i, "</th>", "<th>", $row[0], "</th>";
				echo "</tr>";
				$i++;
			}
			
		}
		mysqli_close($link);
		?>
	</table>
	
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
  </body>
</html>
