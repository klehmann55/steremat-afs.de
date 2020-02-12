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

    // Include the database configuration file
    require('../sql/dbconfig.php');
    require('../sql/class.db.php');

    // Include upload-script
    require('../sql/img_up.php');

    // Create database connection
    $db = new Db($dbms, $host, $port, $dbname, $username, $password);
    $sel = $db->selectContent('"' . $_GET['p'] . '"');
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>Steremat AFS GmbH - CMS</title>

    <meta charset="UTF-8">
    <meta name="expires" content="0">
    <meta name="viewport" content="device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="../img/logo/steremat-favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="../js/javascript.js"></script>

    <script type="text/javascript" src="../nicEdit/nicEdit.js"></script>
    <script type="text/javascript">
	    // bkLib.onDomLoaded(function() {  
        //     new nicEditor({fullPanel : true, iconsPath : '../nicEdit/nicEditorIcons.gif', maxWidth : 500}).panelInstance('area1').oninput;
        // });

        document.addEventListener("DOMContentLoaded", bkLib1);

        function bkLib1() {
           var areaone = document.getElementById('area1');
           areaone.oninput = new nicEditor({fullPanel : true, iconsPath : '../nicEdit/nicEditorIcons.gif'}).panelInstance('area1');
        }
    </script>
						
</head>

<body>

    <div id="contentbox">  
        <div class="content-text">

            <div class="header-img">
                <img src="../img/pixabay/faeuste1.jpg" alt="Zusammenarbeit Fäuste" width="100%">
            </div>

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="img" size="40">
                <button type="submit">Bild hochladen</button>
            </form>

            <br>

            <form action="../sql/update_content.php" method="post">
                <textarea id="area1" name="area1">
                    <?php 
                        if(!empty($sel)) {
                            echo $sel[0]['content'];
                        } 
                        else {
                            echo "Noch leer: Bitte Inhalt einfügen.";
                        }
                    ?>
                </textarea>

                <br>
                
                <input type="hidden" id="p" name="p" value="<?= $_GET['p']; ?>">
                <button type="submit">Daten ändern</button>
            </form>

        </div>
    </div>

    <?php
        include("../includes/navigation_cms.php");
    ?>

</body>

</html>