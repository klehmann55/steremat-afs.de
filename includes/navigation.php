<div id="navigation-top">
    <a href="index.php">
        <img id="logo" alt="Steremat Logo" src="img/logo/Logo_steremat.png">
    </a>
    <nav id="navtop">
        <ul id="left">
            <a href="index.php?p=startseite" <?php if ($_GET['p'] == "startseite") echo " id=\"active\""; ?> ><li>Startseite</li></a>
            <a href="index.php?p=wirüberuns" <?php if ($_GET['p'] == "wirüberuns") echo " id=\"active\""; ?> ><li>Wir über uns</li></a>
            <a href="index.php?p=angebote" <?php if ($_GET['p'] == "angebote") echo " id=\"active\""; ?> ><li>Angebote</li></a>
            <a href="index.php?p=projekte" <?php if ($_GET['p'] == "projekte") echo " id=\"active\""; ?> ><li>Projekte</li></a>
            <a href="index.php?p=partner" <?php if ($_GET['p'] == "partner") echo " id=\"active\""; ?> ><li>Partner</li></a>
        </ul>
        <ul id="right">
            <a href="index.php?p=aktuelles" <?php if ($_GET['p'] == "aktuelles") echo " id=\"active\""; ?> ><li>Aktuelles</li></a>
            <a href="index.php?p=publikationen" <?php if ($_GET['p'] == "publikationen") echo " id=\"active\""; ?> ><li>Publikationen</li></a>
            <a href="index.php?p=standorte" <?php if ($_GET['p'] == "standorte") echo " id=\"active\""; ?> ><li>Standorte</li></a>
        </ul>
    </nav>
</div>

<div id="navigation-bottom">
    <nav id="navfooter">
        <ul>
            <a href="index.php?p=kontakt" <?php if ($_GET['p'] == "kontakt") echo " id=\"active\""; ?> ><li>Kontakt</li></a>
            <a href="index.php?p=impressum" <?php if ($_GET['p'] == "impressum") echo " id=\"active\""; ?> ><li>Impressum</li></a>
            <a href="index.php?p=datenschutz" <?php if ($_GET['p'] == "datenschutz") echo " id=\"active\""; ?> ><li>Datenschutz</li></a>
            <a href="index.php?p=agb" <?php if ($_GET['p'] == "agb") echo " id=\"active\""; ?> ><li>Allgemeine Geschäftsbedingungen</li></a>
        </ul>
    </nav>
</div>