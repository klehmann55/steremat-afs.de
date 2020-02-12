<?php

// Include the database configuration file
require('dbconfig.php');
require('class.db.php');

// Create database connection
$db = new Db($dbms, $host, $port, $dbname, $username, $password);
$sel = $db->selectContent('"' . $_POST['p'] . '"');

if (empty($sel)) {
    $db->insertContent('"' . $_POST['area1'] . '"', '"' . $_POST['p'] . '"');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
else {
    if(!empty($_POST)) {
        $db->updateContent('"' . $_POST['area1'] . '"', '"' . $_POST['p'] . '"');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo "Nichts eingegeben.";
        exit;
    }
}
