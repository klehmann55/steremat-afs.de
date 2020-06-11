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




	// Select Content ............................................................................
	function selectContent($static) {
		$this -> sql = 'SELECT content, imgpath, imgname FROM content WHERE static =' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}
	// Select Content ENG ............................................................................
	function selectContentEN($static) {
		$this -> sql = 'SELECT content_en, imgpath, imgname FROM content WHERE static =' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}
	// Select Content LS ............................................................................
	function selectContentLS($static) {
		$this -> sql = 'SELECT content_ls, imgpath, imgname FROM content WHERE static =' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}
	// Select Newsfeed ............................................................................
	function selectNewsfeed() {
		$this -> sql = 'SELECT n.id, c.category_de, n.headline, n.text FROM newsfeed AS n JOIN category AS c ON n.category = c.id ORDER BY n.id DESC';
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}
	// Select Post ............................................................................
	function selectPost($id) {
		$this -> sql = 'SELECT c.category_de, n.headline, n.text FROM newsfeed AS n JOIN category AS c ON n.category = c.id WHERE n.id = ' . $id;
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
	// Insert Content ENG
	function insertContentEN($insert, $static) {
		$this -> sql = 'INSERT INTO content (content_en, static) VALUES ('.$insert.', '.$static.')';
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}
	// Insert Content LS
	function insertContentLS($insert, $static) {
		$this -> sql = 'INSERT INTO content (content_ls, static) VALUES ('.$insert.', '.$static.')';
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}
	// Insert Post
	function insertPost($category, $headline, $text) {
		$this -> sql = 'INSERT INTO newsfeed (category, headline, text) VALUES ('.$category.', '.$headline.', '.$text.')';
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}



	// Update Content
	function updateContent($update, $static) {
		// $this -> sql = 'UPDATE content SET content="' . $update . '" WHERE static=' . $static;
		// $this -> sql = 'UPDATE content SET content=' . $update . ' WHERE static=' . $static;
		$this -> sql = 'UPDATE content SET content= :update WHERE static=' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this-> statement -> bindValue(':update', $update); 
		$this -> statement -> execute();
	}
	// Update Content ENG
	function updateContentEN($update, $static) {
		// $this -> sql = 'UPDATE content SET content="' . $update . '" WHERE static=' . $static;
		// $this -> sql = 'UPDATE content SET content=' . $update . ' WHERE static=' . $static;
		$this -> sql = 'UPDATE content SET content_en= :update WHERE static=' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this-> statement -> bindValue(':update', $update); 
		$this -> statement -> execute();
	}
	// Update Content LS
	function updateContentLS($update, $static) {
		// $this -> sql = 'UPDATE content SET content="' . $update . '" WHERE static=' . $static;
		// $this -> sql = 'UPDATE content SET content=' . $update . ' WHERE static=' . $static;
		$this -> sql = 'UPDATE content SET content_ls= :update WHERE static=' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this-> statement -> bindValue(':update', $update); 
		$this -> statement -> execute();
	}
	// Update Post
	function updatePost($category, $headline, $msg, $id) {
		// $this -> sql = 'UPDATE content SET content="' . $update . '" WHERE static=' . $static;
		// $this -> sql = 'UPDATE content SET content=' . $update . ' WHERE static=' . $static;
		$this -> sql = 'UPDATE newsfeed SET category=' . $category . ', headline=' . $headline . ', text=' . $msg . ' WHERE id=' . $id;
		$this -> statement = $this -> db -> prepare($this -> sql);
		// $this-> statement -> bindValue(':category', $category);
		// $this-> statement -> bindValue(':headline', $headline); 
		// $this-> statement -> bindValue(':text', $msg); 
		$this -> statement -> execute();
	}



	// Select User Data ............................................................................
	function selectUser($user) {
		$this -> sql = 'SELECT uname, pswd FROM user WHERE uname =' . $user;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}



	// Select Image ............................................................................
	function selectImage($static) {
		$this -> sql = 'SELECT bildpfad FROM content WHERE static =' . $static;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
		$this -> data = $this -> statement -> fetchAll();
		return $this -> data;
	}
	// Update Image
	function updateImage($path, $name, $static) {
		move_uploaded_file($_FILES['img']['tmp_name'], '../'.$path); 
		$this -> sql = 'UPDATE content SET imgpath="' . $path . '", imgname="'. $name .'" WHERE static =' . $static;  
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();	
	}


	// Insert Feedback
	function insertFeedback($name, $feedback) {
		$this -> sql = 'INSERT INTO feedback (name, feedback) VALUES ('.$name.', '.$feedback.')';
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}


	// Delete Post
	function deletePost($id){
		$this -> sql = 'DELETE FROM newsfeed WHERE id=' . $id;
		$this -> statement = $this -> db -> prepare($this -> sql);
		$this -> statement -> execute();
	}
}