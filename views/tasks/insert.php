<p>Добавление нового записа:</p>
	<?=$task;?>
	<form method="post" action="?controller=tasks&action=insert">
		ФИО:<br>
		<input type="text" name="fio">
		<br>
		Email:<br>
		<input type="email" name="email">
		<br>
		Текст:<br>
		<input type="text" name="text">
		<br>
		<input type="submit" name="save" value="Добавление">
	</form>