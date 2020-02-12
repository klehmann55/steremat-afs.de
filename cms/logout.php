<?php
setcookie('logged', '', time()-3600);
setcookie('PHPSESSID', '', time()-3600, '/');
header('Location: index.php');