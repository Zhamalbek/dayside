<?php
  class TasksController {
    public function index() {
      // we store all the tasks in a variable
	  $_GET['sort']=$_GET['sort']*1;
	  if ($_GET['sort']==0)
        $tasks = Task::all();
      else
        $tasks = Task::sorting($_GET['sort']);
      require_once('views/tasks/index.php');
    }

    public function insert() {
		if(isset($_POST['save']))
		{	 
			 $fio = $_POST['fio'];
			 $email = $_POST['email'];
			 $text = $_POST['text'];
			 $task = Task::insert($fio,$email,$text);
		}
      require_once('views/tasks/insert.php');
    }
	
    public function update() {
		if($_SESSION['user'] == '') {
			echo 'вы не авторизованы!!!';
			call('tasks', 'login');
			exit();
		}
		if(isset($_POST['saveup']))
		{	 
			 $id = $_GET['id'];
			 $fio = $_POST['fio'];
			 $email = $_POST['email'];
			 $text = $_POST['text'];
			 $checkbox = ($_POST['checkbox']=='on')?'1':'0';
			 $task = Task::update($id,$fio,$email,$text,$checkbox);
		}
      if (!isset($_GET['id']))
        return call('pages', 'error');
	
	  $task = Task::show($_GET['id']);
      require_once('views/tasks/update.php');
    }
	
    public function login() {
		if(isset($_POST['login']))
		{	 
			 $user = $_POST['user'];
			 $password = $_POST['password'];
			 $task = Task::login($user,$password);
			 //print_r($task);
			 if ($task <> ''){
			 $_SESSION['user'] = $_POST['user'];
			 header('Location: http://'.$_SERVER['HTTP_HOST']);
			 }
		$task = 'Логин или пароль неверен'; 
		}
      require_once('views/tasks/login.php');
    }
    public function login_out() {
		$_SESSION['user'] = '';
		header('Location: http://'.$_SERVER['HTTP_HOST']);
    }
    public function onchange() {
		if($_SESSION['user'] == '') {
			echo 'вы не авторизованы!!!';
			call('tasks', 'login');
			exit();
		}
		$id = $_GET['id'];
		$task = Task::onchange($id);
		call('tasks', 'index');
    }
	
  }
?>