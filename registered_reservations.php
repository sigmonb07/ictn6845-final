<?php
include('database.php');
session_start();

$room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);


if(isset($_SESSION['userID'])) {
	// Get all reservations for the user 
	$loggedInUserID = $_SESSION['userID'];
	$statement1 = $db->prepare("SELECT reg_reservations.userID,reservations.room_id,reservations.reservation_id,reservations.time,reservations.length FROM reservations INNER JOIN reg_reservations ON reservations.reservation_id = reg_reservations.reservation_id");
	$statement1->execute();
	$registeredReservationList = $statement1->fetchAll();
	$statement1->closeCursor();
}

?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>CCC Room Reservation Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<!-- the body section -->
<body>
<main>
    <h1>Your UserID is <?php echo $_SESSION['userID']; ?></h1>
    <hr>
    <h2>Active Room Reservations</h2>
	
	<table>
		<tr>
            <th>User ID</th>
            <th>Room</th>
            <th>Time</th>
			<th>Length</th>

			<th></th>
        </tr>
		<?php foreach ($registeredReservationList as $row) : ?>
		<tr>
			<td><?php echo $row['userID']; ?></td>
			<td><?php echo $row['room_id']; ?></td>
			<td><?php echo $row['time']; ?></td>
			<td><?php echo $row['length']; ?></td>
			<td>
				<form action="drop_reservation.php" method="POST">
					<?php $ReservationID = $row['reservation_id']; ?>
				<input type="hidden" name="ReservationToDrop" value="<?php echo "$ReservationID"; ?>" ></input>
				<input type="submit" value="Remove Reservation"></input>
				</form>
			</td>
        </tr>
		<?php endforeach; ?>
     </table>
	 <br>
	 <a href="user_home.php">Back to Registration
	 <br><br>
</main>
</body>
</html>