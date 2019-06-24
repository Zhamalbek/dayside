<?php
  class Task {
    // we define 3 attributes
    // they are public so that we can access them using $task->author directly
    public $id;
	public $fio;
	public $email;
	public $text;
	public $checkbox;
	public $login;


    public function __construct($id, $fio, $email, $text, $checkbox) {
      $this->id        = $id;
      $this->fio       = $fio;
      $this->email     = $email;
      $this->text      = $text;
      $this->checkbox  = $checkbox;
    }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
		
		global $page;
		global $pages_count;
        $perpage = 3;
        if (empty(@$_GET['p']) || ($_GET['p'] <= 0)) {
            $page = 1;
            } else {
                $page = $_GET['p']; 
            }
			
        $res =  $db->query("SELECT COUNT(*) FROM tasks");
        $count = $res->fetchColumn();
        $pages_count = ceil($count / $perpage);
        if ($page > $pages_count) $page = $pages_count;
        $start_pos = ($page - 1) * $perpage;
		
      $req = $db->prepare('SELECT * FROM tasks LIMIT :start, :limit');
        $req->bindParam(':start', $start_pos, PDO::PARAM_INT);
        $req->bindParam(':limit', $perpage, PDO::PARAM_INT);
        $req->execute();
      // we create a list of task objects from the database results
      foreach($req->fetchAll() as $task) {
        $list[] = new Task($task['id'], $task['fio'], $task['email'], $task['text'], $task['checkbox']);
      }

      return $list;
    }
    
    public static function pager($page, $pages_count) {
        global $page, $pages_count;
        for ($j = 1; $j <= $pages_count; $j++) {
            if ($j == $page) {
                echo ' <li class="active"><a class="page-link" href="index.php?controller=tasks&action=index&&p='.$j.'">'.$j.'</a></li> ';
            } else {
                echo ' <li class="page-item"><a class="page-link" href="index.php?controller=tasks&action=index&&p='.$j.'">'.$j.'</a></li> ';
            }
            if ($j != $pages_count) echo ' ';
        } 
        return true;
    }

    public static function sorting($sortid) {
      $list = [];
      $db = Db::getInstance();
		
		global $page;
		global $pages_count;
        $perpage = 3;
        if (empty(@$_GET['p']) || ($_GET['p'] <= 0)) {
            $page = 1;
            } else {
                $page = $_GET['p']; 
            }
			
        $res =  $db->query("SELECT COUNT(*) FROM tasks");
        $count = $res->fetchColumn();
        $pages_count = ceil($count / $perpage);
        if ($page > $pages_count) $page = $pages_count;
        $start_pos = ($page - 1) * $perpage;
		
      $sortid = intval($sortid);
      $req = $db->prepare('SELECT * FROM tasks ORDER BY :order ASC LIMIT :start, :limit');
      // the query was prepared, now we replace :id with our actual $id value
	  $req->bindParam(':order', $sortid, PDO::PARAM_INT);
      $req->bindParam(':start', $start_pos, PDO::PARAM_INT);
      $req->bindParam(':limit', $perpage, PDO::PARAM_INT);
      $req->execute();

      // we create a list of task objects from the database results
      foreach($req->fetchAll() as $task) {
        $list[] = new Task($task['id'], $task['fio'], $task['email'], $task['text'], $task['checkbox']);
      }

      return $list;
    }
	
	public static function insert($fio,$email,$text){
     $db = Db::getInstance();
	 $req = $db->prepare("INSERT INTO `tasks` (`id`, `fio`, `email`, `text`, `checkbox`) VALUES (NULL, :fio, :email, :text, '0')");
     $req->execute(['fio' => $fio,'email' => $email,'text' => $text]);
	 return 'Запись добавлен';
	}
	
	public static function update($id,$fio,$email,$text,$checkbox){
     $db = Db::getInstance();
	 $req = $db->prepare("UPDATE `tasks` SET 
							 `fio`     = :fio, 
							 `email`   = :email, 
							 `text`    = :text,
							 `checkbox`= :checkbox
						 WHERE `id`    = :id ");
     $req->execute(['id' => $id,'fio' => $fio,'email' => $email,'text' => $text,'checkbox' => $checkbox]);
	 return 'Запись изменен';
	}

    public static function show($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM tasks WHERE id = :id');
      $req->execute(array('id' => $id));
      $task = $req->fetch();

	return $task;
    }
	
	public static function login($user,$password){
     $db = Db::getInstance();
	 $req = $db->prepare("SELECT * FROM users WHERE user = :user and password = :password");
     $req->execute(['user' => $user,'password' => md5($password)]);
	 $task = $req->fetch();
	 
	 return $task;
	}
	public static function onchange($id){
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('UPDATE `tasks` SET `checkbox` = NOT `checkbox` WHERE `id` = :id');
      $req->execute(['id' => $id]);

      return 'Запись обновился';

	}
  }
?>