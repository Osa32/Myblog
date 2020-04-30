<?php

class Controller {
	
	protected $model;

	function __construct() {
       $hostcn = "localhost";
       $usercn = "root";
       $pswcn = "vvossa3232";
       $dbcn = "valikblog";
       $this->model = new Model($hostcn, $usercn, $pswcn, $dbcn);
    }

	function main(){
		if (!isset($_GET['action']) & !isset($_POST['action'])) {
			$this->list_posts();
		}
		else {
			$function = $_GET['action'] ? $_GET['action'] : $_POST['action'];
			if (method_exists('Controller',$function)) {
			 	$this->$function();
			}
		}
	}

	function header() {
		$res_header = $this->model->header();
		return $res_header;
	}

	function list_posts() {
		$posts = $this->model->list_posts();
			include 'view/posts.php';
	}

	function get_one_category($link_id) {
		$result = $this->model->get_one_category($link_id);
		return $result;
	}

	function get_blogs_by_type() {
		$posts = $this->model->get_blogs_by_type($_GET['id']);
		include 'view/posts.php';
	}
	
	//                      Admin
	// ---------------------------------------------------
	
	function in_out() {
		if (isset($_COOKIE['login'])) {
			setcookie ("login", "", time() - 3600);
			header('Location: http://myblog/');
		}else{
			$login = $this->model->in_out($_POST['login'],$_POST['password']);
			if (!empty($login)) {
				setcookie ("login", $_POST['login']);
				header('Location: http://myblog/');
			}else{
				setcookie ("error", TRUE, time()+1);
				header('Location: http://myblog/');
			}
		}
	}
	
	function admin() {
		if (!empty($_COOKIE['login'])) {
			$posts = $this->model->list_posts();
		    include 'view/admin.php';
		}
	}

	function delete() {
		if (!empty($_COOKIE['login'])) {
			$this->model->delete($_GET['id']);
			header('Location: http://myblog/?action=admin');
		}
	}

	function edit() {
		if (!empty($_COOKIE['login'])) {
			$post = $this->model->pull_by_id($_GET['id']);
			include 'view/edit.php';
		}
		if (!empty($_COOKIE['login']) & !empty($_POST['action'])) {
			$this->model->update($_POST['name'],$_POST['body'],$_POST['author'],$_POST['link_id'],$_POST['id'],$_POST['tags']);
			header('Location: http://myblog/?action=admin');
		}
	}

	function insert() {
		if (!empty($_COOKIE['login'])) {
			include 'view/insert.php';
		}
		if (!empty($_COOKIE['login']) & !empty($_POST['action'])) {
			$this->model->insert($_POST['name'],$_POST['body'],$_POST['link_id'],$_COOKIE['login'],$_POST['tags']);
			header('Location: http://myblog/?action=admin');
		}
	}
}

















