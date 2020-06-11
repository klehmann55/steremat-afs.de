<?php

// Include the database configuration file
require('sql/dbconfig.php');
require('sql/class.db.php');

// Create database connection
$db = new Db($dbms, $host, $port, $dbname, $username, $password);

// Insert Content, if DB-Selection is empty
if ( isset($_POST['submit']) ) {
    $db->insertFeedback('"' . $_POST['feedname'] . '"', '"' . $_POST['feedback'] . '"');
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

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
    <script type="text/javascript" src="nicEdit/nicEdit.js"></script>

    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", bkLib1);

        function bkLib1() {
           var areaone = document.getElementById('feedback');
           areaone.oninput = new nicEditor({fullPanel : true, iconsPath : 'nicEdit/nicEditorIcons.gif'}).panelInstance('feedback');
        }

    </script>

</head>

<body>

    <div id="contentbox">  
        <div class="content-text">

            <?php if ( isset($_POST['submit']) ) { 
                echo "<br><b>Danke für dein Feedback !</b><br><br><hr>";
            } ?>

            <a href="index.php"><input type="button" value="Zurück zur Seite"></a>

            <h2> Eure Ideen, Vorschläge & Wünsche </h2> 
            Hier könnt Ihr eure Ideen und Vorschläge für eure Webssite hinterlassen.<br>
            Bitte hinterlasst doch auch euren Namen, damit wir bei Uneindeutigkeiten nochmal nachfragen können.<br><br> <hr><br>

            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="feedname"><b>Name:</b></label><br>
                <input type="text" id="feedname" name="feedname"><br><br>
                <textarea id="feedback" name="feedback" cols="" rows="30" style="width:100%;" placeholder="Konstruktive Kritik, Vorschläge, Ideen und Wünsche.."><br><b>Konstruktive Kritik, Vorschläge, Ideen und Wünsche..</b></textarea><br><br>
                <input type="submit" id="submit" name="submit">
            </form>

            <br><hr><br>

            <a href="index.php"><input type="button" value="Zurück zur Seite"></a>

        </div>
    </div>

</body>
</html>