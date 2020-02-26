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
            setcookie('ls', 'true', time()-86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;
        }
        elseif ( isset($_GET['l']) && $_GET['l'] == 'de' ) {
            setcookie('lang', 'de', time()+86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;        
        }
    }

    // SET simple-language $_cookie-variable
    if ( isset($_COOKIE['cookies']) && $_COOKIE['cookies'] == 'yes' ) {
        if ( isset($_GET['ls']) && $_GET['ls'] == 'true' ) {
            setcookie('ls', 'true', time()+86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;
        }
        elseif ( isset($_GET['ls']) && $_GET['ls'] == 'false' ) {
            setcookie('ls', 'true', time()-86400);
            header('Location: index.php?p='.$_GET['p']);
            exit;        
        }
    }
        
    // Include the database configuration file
    require('sql/dbconfig.php');
    require('sql/class.db.php');

    // Create database connection
    $db = new Db($dbms, $host, $port, $dbname, $username, $password);

    // Include select_content.php
    require('includes/select_content.php');
    
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
    
</head>

<body>

    <div id="contentbox">  
        <div class="content-text">
            <div class="header-img">
                <img src="<?= $sel[0]['imgpath']; ?>" alt="<?= $sel[0]['imgname']; ?>" width="100%">
            </div>
                <?php
                    require('includes/show_content.php');
                ?>
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
            <hr>
            <span>Das sind folgende technische Cookies:
            <br><br>
            <b>Sprache und Design</b></span>
            <hr>
            <br>
            Alles weiteren Infos zum Thema Cookies, erfahrt ihr unter:<br>
            <a href="index.php?p=datenschutz" <?php if ($_GET['p'] == "datenschutz") echo " id=\"active\""; ?> >Datenschutz</a></div>
            <br><br>

            Cookies erlauben?<br>
            <a href="index.php?p=<?= $_GET['p']; ?>&c=yes"><input type="button" value="Akzeptieren"></a>
            <a href="index.php?p=<?= $_GET['p']; ?>&c=no"><input type="button" value="Ablehnen"></a>
        </div>
    <?php } ?>

</body>

</html>