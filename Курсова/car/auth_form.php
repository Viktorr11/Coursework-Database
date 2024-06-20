<?php
	require_once 'config.php'; // підключаємо скрипт
	//Проводимо спробу підключення к серверу MySQL
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Помилка " . mysqli_error($link));
?>
<html>
	<head>
		<title>Авторизація</title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "css/style.css" type = "text/css">

	</head>
	<body>
		<div class = "wrap">
			<div class = "content-auth">
				<div class = "name">
					<h1>Авторизація</h1>
				</div>
				<form action="auth.php" method="post" name="forma" class = 'auth'>
					<label for="login" class="label">Введіть логін:</label><br/>
					<input type="text" name="login" size="30" class = "auth_input"><br/>
					<label for="pass">Введіть пароль:</label><br/>
					<input type="password" name="pass" size="30" class = "auth_input"><br/>
					<br/>
					<input id="submit" type="submit" value="Увійти" class="auth_button"><br/>
				</form>
				<p class = 'register_text'>Якщо немає акаунта - <a href="register.html">зареєструйтесь.</a></p>
			</div>
		</div>
	</body>
</html>
