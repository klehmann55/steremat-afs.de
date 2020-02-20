<div id="navigation-top">
    <a href="index.php">
        <img id="logo" alt="Steremat Logo" src="img/logo/Logo_steremat.png">
    </a>

    <div class="lang">
        <?php 
        if ( isset($_GET['d']) && $_GET['d'] == 'dark' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'dark' ) { ?>
            <a href="index.php?p=<?= $_GET['p']; ?>&l=en&d=light">Light</a> 
        <?php }
        elseif ( isset($_GET['d']) && $_GET['d'] == 'light' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'light' ) { ?>
            <a href="index.php?p=<?= $_GET['p']; ?>&l=en&d=dark">Dark</a>
        <?php } 
        else { ?>
            <a href="index.php?p=<?= $_GET['p']; ?>&l=en&d=dark">Dark</a>
        <?php } ?>

        <a href="index.php?p=<?= $_GET['p']; ?>" class="lang">DEU</a>
    </div>

    <nav id="menu">
        <ul>
            <li class="topmenu"><a href="index.php?p=startseite&l=en" <?php if ($_GET['p'] == "startseite") echo " id=\"active\""; ?> >Home</a></li>
            
            <li class="topmenu"><a href="index.php?p=wirüberuns&l=en" <?php if ($_GET['p'] == "wirüberuns") echo " id=\"active\""; ?> >About Us</a>
                <ul>
                    <li class="submenu"><a href="index.php?p=kernaufgaben&l=en" <?php if ($_GET['p'] == "kernaufgaben") echo " id=\"active\""; ?> >Core Tasks</a></li>
                    <li class="submenu"><a href="index.php?p=leitbild&l=en" <?php if ($_GET['p'] == "leitbild") echo " id=\"active\""; ?> >Leading<br>Image</a></li>
                    <li class="submenu"><a href="index.php?p=qm&l=en" <?php if ($_GET['p'] == "qm") echo " id=\"active\""; ?> >QM</a></li>
                </ul>            
            </li>
            <li class="topmenu"><a href="index.php?p=angebote&l=en" <?php if ($_GET['p'] == "angebote") echo " id=\"active\""; ?> >Offers</a>
                <ul>
                    <li class="submenu"><a href="index.php?p=beschaeftigung&l=en" <?php if ($_GET['p'] == "beschaeftigung") echo " id=\"active\""; ?> >Activity</a></li>
                </ul> 
            </li>
            <li class="topmenu"><a href="index.php?p=projekte&l=en" <?php if ($_GET['p'] == "projekte") echo " id=\"active\""; ?> >Projects</a>
                <ul>
                    <li class="submenu"><a href="index.php?p=stadtnaturranger&l=en" <?php if ($_GET['p'] == "stadtnaturranger") echo " id=\"active\""; ?> >Stadtnatur-<br>ranger</a></li>
                    <li class="submenu"><a href="index.php?p=peb&l=en" <?php if ($_GET['p'] == "peb") echo " id=\"active\""; ?> >PEB</a></li>
                </ul>  
            </li>
            <li class="topmenu"><a href="index.php?p=partner&l=en" <?php if ($_GET['p'] == "partner") echo " id=\"active\""; ?> >Partners</a></li>
        </ul>
        <ul id="right">
            <li class="topmenu"><a href="index.php?p=aktuelles&l=en" <?php if ($_GET['p'] == "aktuelles") echo " id=\"active\""; ?> >Current</a></li>
            <li class="topmenu"><a href="index.php?p=publikationen&l=en" <?php if ($_GET['p'] == "publikationen") echo " id=\"active\""; ?> >Publications</a></li>
            <li class="topmenu"><a href="index.php?p=standorte&l=en" <?php if ($_GET['p'] == "standorte") echo " id=\"active\""; ?> >Locations</a>
                <ul>
                    <li class="submenu"><a href="index.php?p=standorte&l=en" <?php if ($_GET['p'] == "standorte") echo " id=\"active\""; ?> >Storkower</a></li>
                    <li class="submenu"><a href="index.php?p=gartenfelder_str&l=en" <?php if ($_GET['p'] == "gartenfelder_str") echo " id=\"active\""; ?> >Gartenfelder</a></li>
                    <li class="submenu"><a href="index.php?p=gustav_adolf_str&l=en" <?php if ($_GET['p'] == "gustav_adolf_str") echo " id=\"active\""; ?> >Gustav-Adolf</a></li>
                    <li class="submenu"><a href="index.php?p=lahnstr_58&l=en" <?php if ($_GET['p'] == "lahnstr_58") echo " id=\"active\""; ?> >Lahnstr. 58</a></li>
                    <li class="submenu"><a href="index.php?p=lahnstr_70&l=en" <?php if ($_GET['p'] == "lahnstr_70") echo " id=\"active\""; ?> >Lahnstr. 70</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>

<div id="navigation-bottom">
    <nav id="navfooter">
        <ul>
            <li><a href="index.php?p=kontakt&l=en" <?php if ($_GET['p'] == "kontakt") echo " id=\"active\""; ?> >Contact</a></li>
            <li><a href="index.php?p=impressum&l=en" <?php if ($_GET['p'] == "impressum") echo " id=\"active\""; ?> >Legal</a></li>
            <li><a href="index.php?p=datenschutz&l=en" <?php if ($_GET['p'] == "datenschutz") echo " id=\"active\""; ?> >Privacy</a></li>
            <li><a href="index.php?p=agb&l=en" <?php if ($_GET['p'] == "agb") echo " id=\"active\""; ?> >Terms of Service</a></li>
        </ul>
    </nav>
</div>