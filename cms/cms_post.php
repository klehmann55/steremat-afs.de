<?php
    // Check cookie and forward if it is not set
    if (!isset($_COOKIE['logged'])) {
        header('Location: index.php');
        exit;
    }

    // Set GET-Variable on startsite
    if (!isset($_GET['p'])) {
        $_GET['p'] = "aktuelles";
    }

    // SET dark/light $_cookie-variable
    if ( isset($_GET['d']) and $_GET['d'] == 'dark' ) {
        setcookie('design', 'dark', time()+86400);
        header('Location: cms_post.php?sp='.$_GET['sp']);
        exit; 
    }
    elseif ( isset($_GET['d']) and $_GET['d'] == 'light' ) {
        setcookie('design', 'light', time()+86400);
        header('Location: cms_post.php?sp='.$_GET['sp']);
        exit;         
    } 

    // SET deu/eng $_cookie-variable
    if ( isset($_GET['l']) && $_GET['l'] == 'en' ) {
        setcookie('lang', 'en', time()+86400);
        setcookie('ls', 'true', time()-86400);
        header('Location: cms_post.php?sp='.$_GET['sp']);
        exit;
    }
    elseif ( isset($_GET['l']) && $_GET['l'] == 'de' ) {
        setcookie('lang', 'de', time()+86400);
        header('Location: cms_post.php?sp='.$_GET['sp']);
        exit;        
    }
    
    // SET simple-language $_cookie-variable
    if ( isset($_GET['ls']) && $_GET['ls'] == 'true' ) {
        setcookie('ls', 'true', time()+86400);
        header('Location: cms_post.php?sp='.$_GET['sp']);
        exit;
    }
    elseif ( isset($_GET['ls']) && $_GET['ls'] == 'false' ) {
        setcookie('ls', 'true', time()-86400);
        header('Location: cms_post.php?sp='.$_GET['sp']);
        exit;        
    }

    // Require the database configuration file
    require('../sql/dbconfig.php');
    require('../sql/class.db.php');

    // Create database connection
    $db = new Db($dbms, $host, $port, $dbname, $username, $password);

    // Require select_content.php
    require('../sql/select_content.php');
    // Require select_post.php
    require('../sql/select_post.php');
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>Steremat AFS GmbH - CMS</title>

    <meta charset="UTF-8">
    <meta name="expires" content="0">
    <meta name="viewport" content="device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="../img/logo/steremat-favicon.png">

    <?php
        if ( isset($_GET['d']) && $_GET['d'] == 'dark' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'dark' )  { ?>
            <link rel="stylesheet" type="text/css" href="../css/styles_dark.css">
    <?php }
        elseif ( isset($_GET['d']) && $_GET['d'] == 'light' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'light' ) { ?>
            <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <?php }
        else { ?>
            <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <?php } ?>

    <!-- <script type="text/javascript" src="../nicEdit/nicEdit.js"></script> -->
    <script type="text/javascript" src="../ckeditorfull/ckeditor.js"></script>

    <script type="text/javascript">
	    // bkLib.onDomLoaded(function() {  
        //     new nicEditor({fullPanel : true, iconsPath : '../nicEdit/nicEditorIcons.gif', maxWidth : 500}).panelInstance('area1').oninput;
        // });

        // document.addEventListener("DOMContentLoaded", bkLib1);
        document.addEventListener("DOMContentLoaded", bkLib2);

        // function bkLib1() {
        //    var areaone = document.getElementById('area1');
        //    areaone.oninput = new nicEditor({fullPanel : true, iconsPath : '../nicEdit/nicEditorIcons.gif'}).panelInstance('area1');
        // }

        function bkLib2() {
            CKEDITOR.replace( 'area1' );
        }
    </script>
						
</head>

<body>

    <div id="contentbox">  
        <div class="content-text">

            <h2>Beitrag ändern</h2>

            <br>

            <form action="../sql/insert_post.php" method="post">
            
                <label for="category">Kategorie:</label><br>
                <input type="radio" id="category" name="category" value="1" checked>Allgemein<br><br>

                <label for="headline">Titel:</label><br>
                <input type="text" id="headline" name="headline" value="<?= $sel1[0]['headline']; ?>"><br><br>

                <label for="area1">Text:</label><br>
                <textarea id="area1" name="area1">                
                    <?php 
                        echo $sel1[0]['text']; 
                    ?>
                </textarea>
                
                <br>

                <input type="hidden" id="update" name="update" value="update">
                <input type="hidden" id="sp" name="sp" value="<?= $_GET['sp']; ?>">
               
                <button type="submit">Beitrag ändern</button>
            </form>

            <br>
            <hr>
            <br>

            <form action="../sql/insert_post.php" method="post">
                <input type="hidden" id="delete" name="delete" value="delete">            
                <input type="hidden" id="sp" name="sp" value="<?= $_GET['sp']; ?>">
                <button type="submit">Beitrag löschen</button>
            </form>

            <br>
            <hr>

            <div id="back">
                <a href="cms_newsfeed.php?p=aktuelles">Zurück..</a>
            </div>

        </div>
    </div>

    <?php
        include("../includes/navigation_cms.php");
    ?>

</body>

</html>