<?php

//Delete your cookies to log you out.
setcookie("loggedin", "");
setcookie("username", "");
header( 'Location: login.php' );
?>