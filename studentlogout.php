<?php
// Starts session
session_start();

// Destroys session
session_destroy();

// Redirects to login.php
header('Location: studentlogin.php');

?>