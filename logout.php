<?php
session_start();

foreach($_SESSION['activeRegistrations'] as $login)
{
	unset($_SESSION['activeRegistrations']);
}
session_destroy() ;
setcookie('username');
setcookie('password');
header("Location: login.php");
?>