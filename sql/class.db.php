<?php
// Class Db
class Db{
	
	private $options;
	private $db;
	private $sql;
	private $statement;
	private $data;

	// CONSTRUCTER
	function __construct($dbms, $host, $port, $dbname, $username, $password) {
		$this -> options = [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
								PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL ];
		$this -> db = new PDO($dbms 	. ':host=' . $host
										. ';port=' . $port
										. ';dbname=' . $dbname,
										$username, $password,
										$this -> options);
		$this -> db -> query('SET NAMES utf8');
	}

	// Select Content
	function selectContent($static) {
		$this -> sql = 'SELECT content FROM content WHERE static =' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}
	// Insert Content
	function insertContent($insert, $static) {
		$this -> sql = 'INSERT INTO content (content, static) VALUES ('.$insert.', '.$static.')';
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}
	// Update Content
	function updateContent($update, $static) {
		$this -> sql = 'UPDATE content SET content=' . $update . ' WHERE static=' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}

	// Select User Data
	function selectUser($user) {
		$this -> sql = 'SELECT uname, pswd FROM user WHERE uname =' . $user;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}

	// Select Image
	function selectImage($static) {
		$this -> sql = 'SELECT imgdata, imgtype FROM content WHERE static =' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}
	// Insert Image
	function insertImage($data, $type, $static) {
		$this -> sql = 'INSERT INTO content (imgdata, imgtype) VALUES ($data,$type) WHERE static =' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		// $this -> sql -> execute();
	}
	function updateImage($update, $static){
		$this -> sql = 'UPDATE content SET imgdata = "' . $update . '" WHERE static = "' . $static . '"';
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}
}