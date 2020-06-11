<?php
    if ( !empty($sel) ) {
        if ( isset($_GET['ls']) && $_GET['ls'] == 'true' || isset($_COOKIE['ls']) && $_COOKIE['ls'] == 'true' ) {
            echo $sel[0]['content_ls'];
        }                        
        elseif ( isset($_GET['l']) && $_GET['l'] == 'en' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en' ) {
            echo $sel[0]['content_en'];
        }
        elseif ( isset($_GET['l']) && $_GET['l'] == 'de' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'de' ) {
            echo $sel[0]['content'];
        }
        else {
            echo $sel[0]['content'];
        }
    }
    else {
        echo "<br>Hier entstehen in Zukunft, noch mehr Inhalte für euch.";
    }
?>