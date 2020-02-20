<?php

    if ( !isset($_GET['p']) ) {
        $_GET['p'] = "startseite";
    }

    // SET dark/light $design-variable
    if ( isset($_GET['d']) and $_GET['d'] == 'dark' ) {
        setcookie('design', 'dark', time()+86400);
    }
    elseif ( isset($_GET['d']) and $_GET['d'] == 'light' ) {
        setcookie('design', 'light', time()+86400);
        header('Location: index.php?p='.$_GET['p'].'&l='.$_GET['l']);
        exit;         
    } 
        
    // Include the database configuration file
    require('sql/dbconfig.php');
    require('sql/class.db.php');

    // Create database connection
    $db = new Db($dbms, $host, $port, $dbname, $username, $password);

    // Select DE or EN Content, if $_GET['l'] isset
    if ( isset($_GET['l']) ) {
        $sel = $db->selectContentEN('"' . $_GET['p'] . '"');
    }
    else {
        $sel = $db->selectContent('"' . $_GET['p'] . '"');
    }
    
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>Steremat AFS GmbH</title>

    <meta charset="UTF-8">
    <!-- <meta name="expires" content="0"> -->
    <meta http-equiv="expires" content="0">
    <meta name="viewport" content="device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="img/logo/steremat-favicon.png">

    <?php
        if ( isset($_GET['d']) && $_GET['d'] == 'dark' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'dark' )  { ?>
            <link rel="stylesheet" type="text/css" href="css/styles_dark.css">
    <?php }
        elseif ( isset($_GET['d']) && $_GET['d'] == 'light' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'light' ) { ?>
            <link rel="stylesheet" type="text/css" href="css/styles.css">
    <?php }
        else { ?>
            <link rel="stylesheet" type="text/css" href="css/styles.css">
    <?php } ?>
    
    <script src="js/javascript.js"></script>
</head>

<body>

    <div id="contentbox">  
        <div class="content-text">
            <div class="header-img">
                <img src="<?= $sel[0]['imgpath']; ?>" alt="<?= $sel[0]['imgname']; ?>" width="100%">
            </div>
            <div id="text">
                <?php 
                    if(!empty($sel)) {
                        if ( isset($_GET['l']) ) {
                            echo $sel[0]['content_en'];
                        }
                        else {
                            echo $sel[0]['content'];
                        }
                    } 
                    else {
                        echo "<br>Hier entstehen in Zukunft, noch mehr Inhalte für euch.";
                    }
                ?>
            </div>
        </div>
    </div>

    <?php
        if ( $_GET['l'] == 'en' ) {
            include("includes/navigation_en.php");
        }
        else {
            include("includes/navigation.php");
        }        
    ?>

</body>

</html>