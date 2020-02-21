<?php

    if ( !isset($_GET['p']) ) {
        $_GET['p'] = "startseite";
        // setcookie('lang', 'de', time()+86400);
        // header('Location: index.php?p='.$_GET['p']);
        // exit; 
    }

    // Remember with PHP-Cookie, if the user allow cookies, or not
    if ( isset($_GET['c']) && $_GET['c'] == 'yes' ) {
        setcookie('cookies', 'yes', time()+86400);
        header('Location: index.php?p='.$_GET['p']);
        exit;
    }
    elseif ( isset($_GET['c']) && $_GET['c'] == 'no' ) {
        // setcookie('cookies', 'no', time()+86400);
        setcookie('cookies', 'no', 0);
        header('Location: index.php?p='.$_GET['p']);
        exit;
    }

    // SET dark/light $_cookie-variable
    if ( isset($_COOKIE['cookies']) && $_COOKIE['cookies'] == 'yes' ) {
        if ( isset($_GET['d']) && $_GET['d'] == 'dark' ) {
            setcookie('design', 'dark', time()+86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;
        }
        elseif ( isset($_GET['d']) && $_GET['d'] == 'light' ) {
            setcookie('design', 'light', time()+86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;         
        }
    }
 

    // SET deu/eng $_cookie-variable
    if ( isset($_COOKIE['cookies']) && $_COOKIE['cookies'] == 'yes' ) {
        if ( isset($_GET['l']) && $_GET['l'] == 'en' ) {
            setcookie('lang', 'en', time()+86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;
        }
        elseif ( isset($_GET['l']) && $_GET['l'] == 'de' ) {
            setcookie('lang', 'de', time()+86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;        
        }
    }
        
    // Include the database configuration file
    require('sql/dbconfig.php');
    require('sql/class.db.php');

    // Create database connection
    $db = new Db($dbms, $host, $port, $dbname, $username, $password);

    // Select DE or EN Content, if $_GET['l'] isset
    if ( isset($_GET['l']) && $_GET['l'] == 'de' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'de' ) {
        $sel = $db->selectContent('"' . $_GET['p'] . '"');
    }
    elseif ( isset($_GET['l']) && $_GET['l'] == 'en' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en' ) {
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
                        if ( isset($_GET['l']) && $_GET['l'] == 'en' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en' ) {
                            echo $sel[0]['content_en'];
                        }
                        elseif ( isset($_GET['l']) && $_GET['l'] == 'de' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'de' ) {
                            echo $sel[0]['content'];
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
        include("includes/navigation.php");
    ?>

    <!-- Accept Cookie Question -->
    <?php if ( empty($_COOKIE) ) { ?>
        <div id="cookie-statement"><div>
            <span>Ja, auch diese Webseite verwendet Cookies. </span><br><br>
            <span>Allerdings sammeln wir KEINE Daten für Dritte,<br>sondern setzen jediglich Cookies für die Funktion unserer Website.</span>
            <br><br>
            <span>Das sind folgende Cookies:
            <br>Cookies erlauben, Sprache und Design</span>
            <br>
            <br>
            Alles weiteren Infos zum Thema Cookies, erfahrt ihr unter:<br>
            <a href="index.php?p=datenschutz" <?php if ($_GET['p'] == "datenschutz") echo " id=\"active\""; ?> >Datenschutz</a></div>
            <br><br>

            Cookies erlauben?<br>
            <a href="index.php?p=<?= $_GET['p']; ?>&c=yes">Ja</a>
            <a href="index.php?p=<?= $_GET['p']; ?>&c=no">Nein</a>
        </div>
    <?php } ?>

</body>

</html>