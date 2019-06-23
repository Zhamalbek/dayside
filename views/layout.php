<? if(($_POST['login'])or($_GET['action']=='login_out')) require_once('routes.php'); ?>
<DOCTYPE html>
<html>
  <head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="?controller=tasks&action=index">Задачи</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a  class="nav-item nav-link active" href='index.php'>Главный страница</a>
      <a  class="nav-item nav-link active" href='?controller=tasks&action=insert'>Добавить новый запись</a>
      <a  class="nav-item nav-link active" href='?controller=tasks&action=index'>Задачи</a>
      <?=($_SESSION['user']<>'')?"<a class='nav-item nav-link active' href='?controller=tasks&action=login_out'>Выйти</a>":"<a class='nav-item nav-link active' href='?controller=tasks&action=login'>Авторизация</a>"; ?>

    </div>
  </div>
</nav>
  <section class="jumbotron text-center">
    <div class="container">
	
		<?php require_once('routes.php'); ?>
	
    </div>
  </section>
  
	<footer class="text-muted">
	  <div class="container">
		<p class="float-right">
		  <a href="#">Copyright</a>
		</p>	  </div>
	</footer>
  <body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<html>