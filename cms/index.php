<?php
    session_start();

    if (isset($_COOKIE['logged'])) {
        header('Location: cms.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <title>Steremat AFS - CMS Login</title>

    <meta charset="UTF-8">
    <meta name="expires" content="0">
    <meta name="viewport" content="device-width, initial-scale=1.0">

    <link rel="icon" type="image/png" href="../img/logo/steremat-favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="../js/javascript.js"></script>
</head>

<body>
    <div id="login">
        <form action="login.php" method="post">
            <h2>Steremat AFS - CMS Login</h2>

            <input type="text" name="uname" id="uname" placeholder="Benutzername" required><br>
            <input type="password" name="pw" id="pw" placeholder="Passwort" pattern=".{8,}" required><br><br>

            <a href="../"><input type="button" value="Zurück"></a>
            <button type="submit">Login</button>
        </form>
        <br>
        
    </div>

    <?php require('../includes/error_form.php'); ?>
</body>

</html>