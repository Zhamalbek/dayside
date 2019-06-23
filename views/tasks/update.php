<p>Изменение записа:</p>
	<form method="post" action="?controller=tasks&action=update&id=<?=$task['id']?>">
		ФИО:<br>
		<input value="<?=$task['fio']?>" type="text" name="fio">
		<br>
		Email:<br>
		<input value='<?=$task['email']?>' type="email" name="email">
		<br>
		Текст:<br>
		<input value="<?=$task['text']?>" type="text" name="text">
		<br>
		Выполнение задачи:<br>
		<td><input type="checkbox" <?=($task['checkbox']=='0')?'':'checked'; ?> name="checkbox"></td>
		<br>
		<input type="submit" name="saveup" value="Изменение">
	</form>