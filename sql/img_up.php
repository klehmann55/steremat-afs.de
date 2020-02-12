<?php

require('dbconfig.php');
$db = new Db($dbms, $host, $port, $dbname, $username, $password);

if ( array_key_exists('img', $_FILES) ) {

    $tmpname = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];
    $hndFile = fopen($tmpname, "r");
    $data = addslashes(fread($hndFile, filesize($tmpname)));

    $db->insertImage($data, $type, '"' . $_GET['p'] . '"');

    // if (!mysqli($strQuery)) {
    //     die(mysqli_error());
    // }

}

