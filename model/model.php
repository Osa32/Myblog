<?php

class Model {
	
	protected $conn;

	function __construct($hostmd, $usermd, $pswmd, $dbmd){
		$this->$conn = mysqli_connect($hostmd,$usermd,$pswmd,$dbmd);
	}

	function header() {
		$query = "SELECT * FROM categories";
		$result = mysqli_query($this->$conn, $query);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$header_array[] = $row;
		}
		return $header_array;
	}

	function list_posts() {
		$query = "SELECT * FROM blogs";
		$result = mysqli_query($this->$conn, $query);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$posts_array[] = $row;
		}
		return $posts_array;
	}

	function get_one_category($link_id) {
		$query = "SELECT category FROM categories WHERE link_id='".$link_id."' ";
		$result = mysqli_query($this->$conn, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row['category'];
	}

	function get_blogs_by_type($link_id) {
		$query = "SELECT * FROM blogs WHERE link_id='".$link_id."' ";
		$result = mysqli_query($this->$conn, $query);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$posts_array[] = $row;
		}
		return $posts_array;
	}
	
	//                      Admin
	// ---------------------------------------------------
	
	function in_out($login, $pass) {
		$query = "SELECT * FROM users WHERE login='".$login."' AND pass='".$pass."' ";
		$result = mysqli_query($this->$conn, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}

	function delete($del_id) {
		$query = "DELETE FROM blogs WHERE id='".$del_id."' ";
		mysqli_query($this->$conn, $query);
	}

	function pull_by_id($edit_id) {
		$query = "SELECT * FROM blogs WHERE id='".$edit_id."' ";
		$result = mysqli_query($this->$conn, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}

	function update($name, $body, $author, $link_id, $edit_id, $tags) {
		$query = "UPDATE blogs SET name='".$name."', body='".$body."', author='".$author."', link_id='".$link_id."', tags='".$tags."' WHERE id='".$edit_id."' ";
		mysqli_query($this->$conn, $query);
	}

	function insert($name, $body, $link_id, $author, $tags) {
		$query = "INSERT INTO blogs (name, body, link_id, author, created_time, tags) VALUES ('".$name."', '".$body."', '".$link_id."', '".$author."', now(),'".$tags."') ";
		mysqli_query($this->$conn, $query);
	}
}