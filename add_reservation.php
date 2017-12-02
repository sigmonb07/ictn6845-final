<?php
	session_start();
	include 'database.php';
	$ReservationID = filter_input(INPUT_POST, 'regID');
	$room_id = filter_input(INPUT_POST, 'room_id');
	$userID = $_SESSION['userID'];
	
	$stmt = $db->prepare("INSERT INTO reg_reservations (reservation_id,userID,room_id) VALUES ('$ReservationID','$userID','$room_id')");
	$stmt->execute();
	
	$_SESSION['activeReservations'][] = $ReservationID;
	
    header('Location: registered_reservations.php');
	exit;
?>

	 <br>
	 <a href="user_home.php">Back to Registration</a>

