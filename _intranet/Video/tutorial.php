<!DOCTYPE html>
<html lang="de">
<head>
<title>Intranet - Videos</title>
</head>
<body>
    <video src="<?= $_GET['v'] ?>.mp4" controls autoplay loop>
    Ihr Browser kann dieses Video nicht wiedergeben.<br/>
    Dieser Film zeigt eine Demonstration des video-Elements. 
    Sie können ihn unter <a href="<?= $_GET['v'] ?>.mp4">Link-Addresse</a> abrufen.
    </video>
    <br><br>
    <a href="../index.php">Zurück</a>
</body>
</html>