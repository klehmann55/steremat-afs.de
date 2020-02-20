<?php
    // Check cookie and forward if it is not set
    if (!isset($_COOKIE['logged'])) {
        header('Location: index.php');
        exit;
    }

    // Set GET-Variable on startsite
    if (!isset($_GET['p'])) {
        $_GET['p'] = "startseite";
    }

    // SET dark/light $_cookie-variable
    if ( isset($_GET['d']) and $_GET['d'] == 'dark' ) {
        setcookie('design', 'dark', time()+86400);
        header('Location: cms.php?p='.$_GET['p']);
        exit; 
    }
    elseif ( isset($_GET['d']) and $_GET['d'] == 'light' ) {
        setcookie('design', 'light', time()+86400);
        header('Location: cms.php?p='.$_GET['p']);
        exit;         
    } 

    // SET deu/eng $_cookie-variable
    if ( isset($_GET['l']) && $_GET['l'] == 'en' ) {
        setcookie('lang', 'en', time()+86400);
        header('Location: cms.php?p='.$_GET['p']);
        exit;
    }
    elseif ( isset($_GET['l']) && $_GET['l'] == 'de' ) {
        setcookie('lang', 'de', time()+86400);
        header('Location: cms.php?p='.$_GET['p']);
        exit;        
    }  

    // Include the database configuration file
    require('../sql/dbconfig.php');
    require('../sql/class.db.php');

    // Create database connection
    $db = new Db($dbms, $host, $port, $dbname, $username, $password);

    // Select DE or EN Content, if $_GET['l'] isset
    if ( isset($_GET['l']) && $_GET['l'] == 'en' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en' ) {
        $sel = $db->selectContentEN('"' . $_GET['p'] . '"');
    }
    elseif ( isset($_GET['l']) && $_GET['l'] == 'de' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'de' ) {
        $sel = $db->selectContent('"' . $_GET['p'] . '"');
    }
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

    <script src="../js/javascript.js"></script>

    <script type="text/javascript" src="../nicEdit/nicEdit.js"></script>
    <!-- <script src="//cdn.ckeditor.com/4.13.1/full-all/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/inline/ckeditor.js"></script> -->
    <script type="text/javascript">
	    // bkLib.onDomLoaded(function() {  
        //     new nicEditor({fullPanel : true, iconsPath : '../nicEdit/nicEditorIcons.gif', maxWidth : 500}).panelInstance('area1').oninput;
        // });

        document.addEventListener("DOMContentLoaded", bkLib1);
        // document.addEventListener("DOMContentLoaded", bkLib2);

        function bkLib1() {
           var areaone = document.getElementById('area1');
           areaone.oninput = new nicEditor({fullPanel : true, iconsPath : '../nicEdit/nicEditorIcons.gif'}).panelInstance('area1');
        }

        function bkLib2() {
            CKEDITOR.replace( 'area1' );
        //     // ClassicEditor
        //     // InlineEditor
        //                         .create( document.querySelector( '#area1' ) )
        //                         .then( editor => {
        //                                 console.log( editor );
        //                         } )
        //                         .catch( error => {
        //                                 console.error( error );
        //                         } );
        }
    </script>
						
</head>

<body>

    <div id="contentbox">  
        <div class="content-text">
        
            <div class="header-img">
                <img src="../<?= $sel[0]['imgpath']; ?>" alt="../<?= $sel[0]['imgname']; ?>" width="100%">
            </div>
            <br>
            <form action="../sql/img_up.php" method="post" enctype="multipart/form-data">
                <input type="file" name="img" size="40">
                <input type="hidden" id="p" name="p" value="<?= $_GET['p']; ?>">
                <button type="submit">Bild hochladen</button>
            </form>

            <br>
            <!-- // if(!empty($sel)) {
                            //     echo $sel[0]['content'];
                            // } 
                            // else {
                            //     echo "Noch leer: Bitte Inhalt einfügen.";
                            // } -->
            <form action="../sql/update_content.php" method="post">
                
                <textarea id="area1" name="area1">                
                    <?php
                        if(!empty($sel)) {
                            if ( isset($_GET['l']) && $_GET['l'] == 'en' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en' ) {
                                echo $sel[0]['content_en'];
                            }
                            elseif ( isset($_GET['l']) && $_GET['l'] == 'de' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'de' ) {
                                echo $sel[0]['content'];
                            }
                        }
                        else {
                                echo "Noch leer: Bitte Inhalt einfügen.";
                        }
                    ?>           
                </textarea>
                
                <br>
                
                <input type="hidden" id="p" name="p" value="<?= $_GET['p']; ?>">
                <?php
                    if ( isset($_GET['l']) ) { ?>
                        <input type="hidden" id="l" name="l" value="<?= $_GET['l']; ?>">
                <?php } ?>              

                <button type="submit">Daten ändern</button>
            </form>

        </div>
    </div>

    <?php
        include("../includes/navigation_cms.php");
    ?>

</body>

</html>