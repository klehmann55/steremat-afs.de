<?php

// SESSION start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Define SESSION-Variables
$_SESSION['errormsg'] = [];
$_SESSION['formfield'] = [];

// Include the database configuration file
require('../sql/dbconfig.php');
require('../sql/class.db.php');

// Set POST-Variables
if( !empty($_POST) ) {
    $uname = htmlspecialchars($_POST['uname']);
    $pw = htmlspecialchars($_POST['pw']);
}

$db = new Db($dbms, $host, $port, $dbname, $username, $password);
$sel = $db->selectUser('"' . $uname . '"');

// var_dump($_POST);
// var_dump($uname);
// var_dump($pw);
// var_dump($sel);

// Login-Logic
if(empty($sel)) {
    $_SESSION['errormsg'] = 'Falscher Benutzername';
    $_SESSION['formfield'] = 'uname';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
else {
    if ( password_verify($pw, $sel[0]['pswd']) ) {
        setcookie('logged', '1hour', time()+3600);
        header('Location: cms.php');
        exit;
    }
    else {
        $_SESSION['errormsg'] = 'Falsches Passwort';
        $_SESSION['formfield'] = 'pw';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}