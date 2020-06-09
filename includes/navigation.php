<?php

if ( isset($_GET['l']) && $_GET['l'] == 'en' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en' ) { ?>
    <div id="navigation-top">
        <a href="index.php">
            <img id="logo" alt="Steremat Logo" src="img/logo/Logo_Steremat_wBG1a.png">
        </a>

        <div class="lang">

            <?php 
            if ( isset($_GET['d']) && $_GET['d'] == 'dark' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'dark' ) { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&d=light"><div class="design-button"></div></a> 
            <?php }
            elseif ( isset($_GET['d']) && $_GET['d'] == 'light' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'light' ) { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&d=dark"><div class="design-button"></div></a>
            <?php } 
            else { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&d=dark"><div class="design-button"></div></a>
            <?php } ?>

            <a href="index.php?p=<?= $_GET['p']; ?>&l=de">DEU</a>
        </div>

        <nav id="menu">
            <ul>
                <li class="topmenu"><a href="index.php?p=startseite" <?php if ($_GET['p'] == "startseite") echo " id=\"active\""; ?> >Home</a></li>
                
                <li class="topmenu"><a href="index.php?p=wirüberuns" <?php if ($_GET['p'] == "wirüberuns") echo " id=\"active\""; ?> >About Us</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=kernaufgaben" <?php if ($_GET['p'] == "kernaufgaben") echo " id=\"active\""; ?> >Core Tasks</a></li>
                        <li class="submenu"><a href="index.php?p=leitbild" <?php if ($_GET['p'] == "leitbild") echo " id=\"active\""; ?> >Leading<br>Image</a></li>
                        <li class="submenu"><a href="index.php?p=qm" <?php if ($_GET['p'] == "qm") echo " id=\"active\""; ?> >QM</a></li>
                    </ul>            
                </li>
                <li class="topmenu"><a href="index.php?p=angebote" <?php if ($_GET['p'] == "angebote") echo " id=\"active\""; ?> >Offers</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=beschaeftigung" <?php if ($_GET['p'] == "beschaeftigung") echo " id=\"active\""; ?> >Activity</a></li>
                    </ul> 
                </li>
                <li class="topmenu"><a href="index.php?p=projekte" <?php if ($_GET['p'] == "projekte") echo " id=\"active\""; ?> >Projects</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=stadtnaturranger" <?php if ($_GET['p'] == "stadtnaturranger") echo " id=\"active\""; ?> >Stadtnatur-<br>ranger</a></li>
                        <li class="submenu"><a href="index.php?p=peb" <?php if ($_GET['p'] == "peb") echo " id=\"active\""; ?> >PEB</a></li>
                    </ul>  
                </li>
                <li class="topmenu"><a href="index.php?p=partner" <?php if ($_GET['p'] == "partner") echo " id=\"active\""; ?> >Partners</a></li>
                <li class="topmenu"><a href="index.php?p=standorte" <?php if ($_GET['p'] == "standorte") echo " id=\"active\""; ?> >Locations</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=standorte" <?php if ($_GET['p'] == "standorte") echo " id=\"active\""; ?> >Storkower</a></li>
                        <li class="submenu"><a href="index.php?p=gartenfelder_str" <?php if ($_GET['p'] == "gartenfelder_str") echo " id=\"active\""; ?> >Gartenfelder</a></li>
                        <li class="submenu"><a href="index.php?p=gustav_adolf_str" <?php if ($_GET['p'] == "gustav_adolf_str") echo " id=\"active\""; ?> >Gustav-Adolf</a></li>
                        <li class="submenu"><a href="index.php?p=lahnstr_58" <?php if ($_GET['p'] == "lahnstr_58") echo " id=\"active\""; ?> >Lahnstr. 58</a></li>
                        <li class="submenu"><a href="index.php?p=lahnstr_70" <?php if ($_GET['p'] == "lahnstr_70") echo " id=\"active\""; ?> >Lahnstr. 70</a></li>
                    </ul>
                </li>
            </ul>
            <ul id="right">
                <li class="topmenu"><a href="feedback.php"><input type="button" value="-> FEEDBACK & Ideen <-"></a></li>
                <li class="topmenu"><a href="index.php?p=aktuelles" <?php if ($_GET['p'] == "aktuelles") echo " id=\"active\""; ?> >Current</a></li>
                <li class="topmenu"><a href="index.php?p=publikationen" <?php if ($_GET['p'] == "publikationen") echo " id=\"active\""; ?> >Publications</a></li>
                
            </ul>
        </nav>
    </div>

    <div id="navigation-bottom">
        <nav id="navfooter">
            <ul>
                <li><a href="index.php?p=kontakt" <?php if ($_GET['p'] == "kontakt") echo " id=\"active\""; ?> >Contact</a></li>
                <li><a href="index.php?p=impressum" <?php if ($_GET['p'] == "impressum") echo " id=\"active\""; ?> >Legal</a></li>
                <li><a href="index.php?p=datenschutz" <?php if ($_GET['p'] == "datenschutz") echo " id=\"active\""; ?> >Privacy</a></li>
                <li><a href="index.php?p=agb" <?php if ($_GET['p'] == "agb") echo " id=\"active\""; ?> >Terms of Service</a></li>
            </ul>
        </nav>
    </div>
<?php
}
else {
?>
    <div id="navigation-top">
        <a href="index.php">
            <img id="logo" alt="Steremat Logo" src="img/logo/Logo_Steremat_wBG1a.png">
        </a>

        <div class="lang">
            <?php
            if ( isset($_GET['ls']) && $_GET['ls'] == 'true' || isset($_COOKIE['ls']) && $_COOKIE['ls'] == 'true') { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&ls=false" <?php if ( isset($_GET['ls']) && $_GET['ls'] == "true" || isset($_COOKIE['ls']) && $_COOKIE['ls'] == "true" ) echo " id=\"active\""; ?> >LEICHTE SPRACHE</a>
            <?php }
            else { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&ls=true" <?php if ( isset($_GET['ls']) && $_GET['ls'] == "true" || isset($_COOKIE['ls']) && $_COOKIE['ls'] == "true" ) echo " id=\"active\""; ?> >LEICHTE SPRACHE</a>
            <?php } ?>

            <?php 
            if ( isset($_GET['d']) && $_GET['d'] == 'dark' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'dark' ) { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&d=light"><div class="design-button"></div></a> 
            <?php }
            elseif ( isset($_GET['d']) && $_GET['d'] == 'light' || isset($_COOKIE['design']) && $_COOKIE['design'] == 'light' ) { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&d=dark"><div class="design-button"></div></a>
            <?php } 
            else { ?>
                <a href="index.php?p=<?= $_GET['p']; ?>&d=dark"><div class="design-button"></div></a>
            <?php } ?>
            
            <a href="index.php?p=<?= $_GET['p']; ?>&l=en">ENG</a>
        </div>

        <nav id="menu">
            <ul>
                <li class="topmenu"><a href="index.php?p=startseite" <?php if ($_GET['p'] == "startseite") echo " id=\"active\""; ?> >Startseite</a></li>
                
                <li class="topmenu"><a href="index.php?p=wirüberuns" <?php if ($_GET['p'] == "wirüberuns") echo " id=\"active\""; ?> >Wir über uns</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=kernaufgaben" <?php if ($_GET['p'] == "kernaufgaben") echo " id=\"active\""; ?> >Kernaufgaben</a></li>
                        <li class="submenu"><a href="index.php?p=leitbild" <?php if ($_GET['p'] == "leitbild") echo " id=\"active\""; ?> >Leitbild</a></li>
                        <li class="submenu"><a href="index.php?p=qm" <?php if ($_GET['p'] == "qm") echo " id=\"active\""; ?> >QM</a></li>
                    </ul>            
                </li>
                <li class="topmenu"><a href="index.php?p=angebote" <?php if ($_GET['p'] == "angebote") echo " id=\"active\""; ?> >Angebote</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=beschaeftigung" <?php if ($_GET['p'] == "beschaeftigung") echo " id=\"active\""; ?> >Beschäftigung</a></li>
                    </ul> 
                </li>
                <li class="topmenu"><a href="index.php?p=projekte" <?php if ($_GET['p'] == "projekte") echo " id=\"active\""; ?> >Projekte</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=stadtnaturranger" <?php if ($_GET['p'] == "stadtnaturranger") echo " id=\"active\""; ?> >Stadtnatur-<br>ranger</a></li>
                        <li class="submenu"><a href="index.php?p=peb" <?php if ($_GET['p'] == "peb") echo " id=\"active\""; ?> >PEB</a></li>
                    </ul>  
                </li>
                <li class="topmenu"><a href="index.php?p=partner" <?php if ($_GET['p'] == "partner") echo " id=\"active\""; ?> >Partner</a></li>
                <li class="topmenu"><a href="index.php?p=standorte" <?php if ($_GET['p'] == "standorte") echo " id=\"active\""; ?> >Standorte</a>
                    <ul>
                        <li class="submenu"><a href="index.php?p=standorte" <?php if ($_GET['p'] == "standorte") echo " id=\"active\""; ?> >Storkower</a></li>
                        <li class="submenu"><a href="index.php?p=gartenfelder_str" <?php if ($_GET['p'] == "gartenfelder_str") echo " id=\"active\""; ?> >Gartenfelder</a></li>
                        <li class="submenu"><a href="index.php?p=gustav_adolf_str" <?php if ($_GET['p'] == "gustav_adolf_str") echo " id=\"active\""; ?> >Gustav-Adolf</a></li>
                        <li class="submenu"><a href="index.php?p=lahnstr_58" <?php if ($_GET['p'] == "lahnstr_58") echo " id=\"active\""; ?> >Lahnstr. 58</a></li>
                        <li class="submenu"><a href="index.php?p=lahnstr_70" <?php if ($_GET['p'] == "lahnstr_70") echo " id=\"active\""; ?> >Lahnstr. 70</a></li>
                    </ul>
                </li>
            </ul>
            <ul id="right">
                <li class="topmenu"><a href="feedback.php"><input type="button" value="-> FEEDBACK & Ideen <-"></a></li>
                <li class="topmenu"><a href="index.php?p=aktuelles" <?php if ($_GET['p'] == "aktuelles") echo " id=\"active\""; ?> >Aktuelles</a></li>
                <li class="topmenu"><a href="index.php?p=publikationen" <?php if ($_GET['p'] == "publikationen") echo " id=\"active\""; ?> >Publikationen</a></li>
            </ul>
        </nav>
    </div>

    <div id="navigation-bottom">
        <nav id="navfooter">
            <ul>
                <li><a href="index.php?p=kontakt" <?php if ($_GET['p'] == "kontakt") echo " id=\"active\""; ?> >Kontakt</a></li>
                <li><a href="index.php?p=impressum" <?php if ($_GET['p'] == "impressum") echo " id=\"active\""; ?> >Impressum</a></li>
                <li><a href="index.php?p=datenschutz" <?php if ($_GET['p'] == "datenschutz") echo " id=\"active\""; ?> >Datenschutz</a></li>
                <li><a href="index.php?p=agb" <?php if ($_GET['p'] == "agb") echo " id=\"active\""; ?> >Allgemeine Geschäftsbedingungen</a></li>
            </ul>
        </nav>
    </div>
<?php
}
?>
