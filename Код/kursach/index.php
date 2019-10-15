<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Войдите в систему</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css">
</head>
<body>
   <div id="login">
        <form action="login.php" method="post">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input type="text" name="login" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fontawesome-lock"></span><input type="password" name="password" value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input type="submit" value="ВОЙТИ" name="enter"></p>
				<p><?php for ($i = 0; $i < 25; $i++) echo "&nbsp"; ?> Нет аккаунта? &nbsp;&nbsp;</p>
				
            </fieldset>
			
        </form>
		<fieldset class="clearfix">
			<form action="registration.php" method="post">
				<p><input type="submit" value="ЗАРЕГИСТРИРОВАТЬСЯ" name="register"></p>
			</form>
        </fieldset>
    </div>
</body>
</html>