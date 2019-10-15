<?php
session_start();
$_SESSION['login'] = $_POST['login'];
if (isset($_POST['enter'])){
	enter();
}else 
if (isset($_POST['register'])){
	register();
}


function enter(){
	require_once 'connection.php';
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
		
	$hashed_password = md5($_POST['password']);
	$login = $_POST['login'];
	
	$query = "SELECT type FROM users WHERE password='".$hashed_password."' AND login='".$login."'";
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	$row = mysqli_fetch_row($result)[0];
	
	if (!$row){
		echo "<script>alert('Вы ввели неверный логин или пароль, попробуйте снова.')</script>";
		require_once 'index.php';
	}else{
		if ($row == 'admin'){
			$_SESSION['login'] = $login;
			header ('Location: admin.php');
			exit;
		}
		else{
			
			$_SESSION['login'] = $login;
			header("Location: user.php");
			$_POST['login'] = $login;
		}
		
		
	};
	
	mysqli_close($link);
};
function register(){
	require_once 'connection.php'; // данные для входа в субд
	 
	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
	 
	$query ="SELECT login, password FROM users WHERE login='".$_POST['login']."'";
	
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	
	if (!mysqli_fetch_row($result)){
		
		$query = "INSERT INTO users (login, password) VALUES('".$_POST['login']."','".md5($_POST['password'])."')";
		mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));
		echo "<script>alert('Вы зарегистрированы, зайдите в систему с вашим паролем')</script>";
	} else{
		echo "<script>alert('Данный пользователь уже зарегистрирован')</script>";
	};
	
	mysqli_close($link);
	
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";

};
?>