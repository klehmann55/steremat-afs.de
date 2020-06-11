<?php

// Include the database configuration file
require('dbconfig.php');
require('class.db.php');

// Create database connection
$db = new Db($dbms, $host, $port, $dbname, $username, $password);


$sel1 = $db->selectPost('"' . $_POST['sp'] . '"');


// Insert Post, if DB-Selection is empty
if (empty($sel1)) {
    $db->insertPost('"' . $_POST['category'] . '"', '"' . $_POST['headline'] . '"', '"' . $_POST['area1'] . '"');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Update Post, if $_POST is isset
else  {
    if(isset($_POST['delete'])) {
        $db->deletePost($_POST['sp']);
        header('Location: ../cms/cms_newsfeed.php?p=aktuelles');
        exit;
    }
    else if(isset($_POST['update'])) {
        $db->updatePost($_POST['category'], '"' . $_POST['headline'] . '"', '"' . $_POST['area1'] . '"', '"' . $_POST['sp'] . '"');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo "Nichts eingegeben.";
        exit;
    }
}
