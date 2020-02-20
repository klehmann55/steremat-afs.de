<?php

// Include the database configuration file
require('dbconfig.php');
require('class.db.php');

// Create database connection
$db = new Db($dbms, $host, $port, $dbname, $username, $password);

// Select DE or EN Content, if $_GET['l'] isset
if ( isset($_POST['l']) ) {
    $sel = $db->selectContentEN('"' . $_POST['p'] . '"');
}
else {
    $sel = $db->selectContent('"' . $_POST['p'] . '"');
}

// Insert Content, if DB-Selection is empty
if (empty($sel)) {
    if ( isset($_POST['l']) ) {
        $db->insertContentEN('"' . $_POST['area1'] . '"', '"' . $_POST['p'] . '"');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    else {
        $db->insertContent('"' . $_POST['area1'] . '"', '"' . $_POST['p'] . '"');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

// Update Content, if DB-Selection is isset
else {
    if(isset($_POST)) {
        if ( isset($_POST['l']) ) {
            $db->updateContentEN($_POST['area1'], '"' . $_POST['p'] . '"');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        else {
            $db->updateContent($_POST['area1'], '"' . $_POST['p'] . '"');
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
    else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo "Nichts eingegeben.";
        exit;
    }
}
