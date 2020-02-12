<?php
    if (!isset($_GET['p'])) {
        $_GET['p'] = "startseite";
    }

    // Include the database configuration file
    require('sql/dbconfig.php');
    require('sql/class.db.php');

    // Create database connection
    $db = new Db($dbms, $host, $port, $dbname, $username, $password);
    $sel = $db->selectContent('"' . $_GET['p'] . '"');
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>Steremat AFS GmbH</title>

    <meta charset="UTF-8">
    <meta name="expires" content="0">
    <meta name="viewport" content="device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="img/logo/steremat-favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/javascript.js"></script>
</head>

<body>

    <div id="contentbox">  
        <div class="content-text">
            <div class="header-img">
                <img src="img/pixabay/faeuste1.jpg" alt="Zusammenarbeit Fäuste" width="100%">
            </div>
            <?php 
                if(!empty($sel)) {
                    echo $sel[0]['content'];
                } 
                else {
                    echo "Hier entstehen in Zukunft, noch mehr Inhalte für euch.";
                }
            ?>
        </div>
    </div>

    <?php
        include("includes/navigation.php");
    ?>

</body>

</html>