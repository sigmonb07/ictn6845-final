<?php

session_start();
require_once ('database.php');

$user = $_POST['uname'];
$password = $_POST['psw'];
$rememberMe = $_POST['remember_me'];

if($rememberMe == 'on'){
    $hour = time() + 300;
    setcookie('username',$user,$hour);
	setcookie('password',$password,$hour);
}

$result = $db->prepare("SELECT * FROM usertable WHERE userName= :userName AND password= :password");
$result->bindParam(':userName', $user);
$result->bindParam(':password', $password);
$result->execute();
$rows = $result->fetch();
if($rows > 0) {
    $_SESSION['userName'] = $rows['userName'] ;
	$_SESSION['firstName'] = $rows['firstName'] ;
    $_SESSION['role'] = $rows['role'] ;
    $_SESSION['userID'] = $rows['userID'] ;
	
    if($rows['role'] == 'User')
        header("location: user_home.php");
    elseif ($rows['role'] == 'Admin')
        header("location: admin_home2.php");
}

?>