<?php

// Select DE or EN Content, if $_GET['l'] isset

if ( isset($_GET['ls']) && $_GET['ls'] == 'true' || isset($_COOKIE['ls']) && $_COOKIE['ls'] == 'true' ) {
    $sel = $db->selectContentLS('"' . $_GET['p'] . '"');
}
elseif ( isset($_GET['l']) && $_GET['l'] == 'en' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en' ) {
    $sel = $db->selectContentEN('"' . $_GET['p'] . '"');
}
elseif ( isset($_GET['l']) && $_GET['l'] == 'de' || isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'de' ) {
    $sel = $db->selectContent('"' . $_GET['p'] . '"');
}
else {
    $sel = $db->selectContent('"' . $_GET['p'] . '"');
}

?>