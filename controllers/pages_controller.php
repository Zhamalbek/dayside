<?php
  class PagesController {
    public function home() {
      require_once('views/pages/home.php');
	  call('tasks', 'index');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>