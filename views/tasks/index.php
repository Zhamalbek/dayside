<p>Все задачи:</p>


<table  class="table table-bordered"> 
	<tr>
		<th><a href="?controller=tasks&action=index&sort=2">ФИО</a></th> 
		<th><a href="?controller=tasks&action=index&sort=3">E-mail</a></th>
		<th><a href="?controller=tasks&action=index&sort=4">Текста задачи</a></th>
		<?=($_SESSION['user']=='')?'':'<th><a href="?controller=tasks&action=index&sort=5">Выполнение задачи</a></th>'?>
		<?=($_SESSION['user']=='')?'':'<th>Изменить</th>'?>
	</tr>
<? foreach($tasks as $task): ?>
    <tr>
        <td><?=$task->fio; ?></td>
        <td><?=$task->email; ?></td>
        <td><?=$task->text; ?></td>
		<? if ($_SESSION['user']<>''){?>
        <td><input type="checkbox" onchange='window.location.href = "/?controller=tasks&action=onchange&id=<?=$task->id; ?>"'<?=($task->checkbox=='0')?'':'checked'; ?>></td>
        <td><a class="btn btn-primary" href="?controller=tasks&action=update&id=<?=$task->id; ?>" role="button">Открыть</a></td>
		<? } ?>
    </tr>
<? endforeach; ?>
</table>

<nav aria-label="Page navigation example">
  <ul class="pagination  justify-content-center">
	<? Task::pager($page, $pages_count); ?>
  </ul>
</nav>