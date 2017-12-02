<?php
	session_start();
	include 'database.php';
	$ReservationToDrop = filter_input(INPUT_POST, 'ReservationToDrop');
	$userID = $_SESSION['userID'];
	$stmt = $db->prepare("DELETE FROM reg_reservations WHERE reservation_id = $ReservationToDrop");
	$stmt->execute();
	
	header('Location: admin_home2.php');
	exit;
?>