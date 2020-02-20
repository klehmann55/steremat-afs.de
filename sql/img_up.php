<?php

require('dbconfig.php');
require('class.db.php');
$db = new Db($dbms, $host, $port, $dbname, $username, $password);


if(isset($_POST)) { 


$folder = "img/uploads/"; 
$image = $_FILES['img']['name']; 
$path = $folder . $image ; 

// var_dump($_FILES);
// var_dump($image);
// var_dump($path);

$target_file = $folder.basename($_FILES["img"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$allowed = array('jpeg','png' ,'jpg'); 
$filename = $_FILES['img']['name']; 

$ext=pathinfo($filename, PATHINFO_EXTENSION); 

    if(!in_array($ext,$allowed) ) { 
        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
    }
    else { 
        $db->updateImage($path, $image, '"'.$_POST['p'].'"');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    } 

} 

