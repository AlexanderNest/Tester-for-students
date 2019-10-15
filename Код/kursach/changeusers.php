<?php
	session_start();
	require_once 'connection.php';
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
	
	$login = $_POST['login'];
	
	if (isset($_POST['register'])){
		$pass = $_POST['password'];
		
		
		$query = "SELECT login FROM users WHERE login='".$login."'";

		$result = mysqli_query($link, $query);
		if( mysqli_fetch_row($result)[0] != $login){
			$query = "INSERT INTO users (login, password) VALUES('".$login."','".md5($pass)."')";
			mysqli_query($link, $query);
			echo "<script>alert('Пользователь добавлен')</script>";
		}
		else{
			echo "<script>alert('Данный пользователь уже зарегистрирован')</script>";
		}
		
		
	}
	if (isset($_POST['registeradmin'])){
		$pass = $_POST['password'];
		$query = "INSERT INTO users (login, password, type) VALUES('".$login."','".md5($pass)."', 'admin')";
		mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));
		echo "<script>alert('Админ добавлен')</script>";
	}
	if (isset($_POST['delete'])){
		if ($login == 'admin' || $_SESSION['login'] == $login){
			echo "<script>alert('Вы не можете удалить этого пользователя')</script>";
		}else{
			$query = "SELECT login FROM users WHERE login='".$login."'";

			$result = mysqli_query($link, $query);
			if( mysqli_fetch_row($result)[0] == $login){
				$query = "DELETE FROM `users` WHERE login='".$login."'";
				mysqli_query($link, $query);
				echo "<script>alert('Пользователь удален')</script>";
			}
			else{
				echo "<script>alert('Пользователь не найден')</script>";
			}
		}
		
	}
	
	mysqli_close($link);
	echo "Вы будете перенаправлены в меню администрирования списка пользователей";
	echo "<meta http-equiv='Refresh' content='2; url=userpanel.php'>";
?>