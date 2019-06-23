<p>Авторизация:</p>
	<?=$task;?>
	<form method="post" action="?controller=tasks&action=login">
		Логин:<br>
		<input type="text" name="user">
		<br>
		Пароль:<br>
		<input type="password" name="password">
		<br>
		<input type="submit" name="login" value="Авторизация">
	</form>