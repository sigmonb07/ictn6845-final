<?php
// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

$_SESSION['activeRegistrations']=array();
$SessionUserID = $_SESSION['userID'];

require_once('database.php');

// Get Room ID
$room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);
if ($room_id == NULL || $room_id == FALSE) {
    $room_id = 1;
}

// Get all rooms
$statement1 = $db->prepare("SELECT * FROM rooms");
$statement1->bindValue(':room_id', $room_id);
$statement1->execute();
$roomList = $statement1->fetchAll();
$statement1->closeCursor();

// Get room name
$stmt = 'SELECT * FROM rooms WHERE room_id = :room_id';
$stmt = $db->prepare($stmt);
$stmt->bindValue(':room_id', $room_id);
$stmt->execute();
$roomList = $stmt->fetch();
$roomName = $roomList['room_name'];
$stmt->closeCursor();

// Get all reservations
$queryReservations = 'SELECT * FROM reservations
                           ORDER BY reservation_id';
$statement2 = $db->prepare($queryReservations);
$statement2->execute();
$ReservationList = $statement2->fetchAll();
$statement2->closeCursor();

// Get all registered reservations
$statement4 = $db->prepare("SELECT * FROM reg_reservations");
$statement4->execute();
$registeredReservationList = $statement4->fetchAll();
$statement4->closeCursor();

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
    <h1>Welcome <?php echo $_SESSION['firstName']; ?>!</h1>
	<hr>
    <section>
    
    <tr>
	<td></td>

    
        <!-- display a table of rooms to reserve -->
        <h2>Please Select The Room You Would Like To Reserve</h2>
        <table>
            <tr>
                <th>Room</th>
                <th>Time</th>
                <th>Length</th>
            </tr>
			
            <?php foreach ($ReservationList as $reservation) : ?>
				<tr>
					<form action="add_reservation.php" method="POST">
					<td><?php echo $reservation['room_id']; ?></td>
					<td><?php echo $reservation['time']; ?></td>
					<?php $regID = $reservation['reservation_id']; ?>
					<td><?php echo $reservation['length']; ?></td>
					<!-- <td><input type="button" disabled="" value="Register"></input></td> -->
					<input type="hidden" name="regID" value="<?php echo "$regID"; ?>" ></input>
					<td>
						<?php 
							if (empty($registeredReservationList)) { ?>
								<input type="submit" value="Reserve"></input>
							<?php }
							else {
								foreach ($registeredReservationList as $listing) {
									if ($reservation['reservation_id'] != $listing['reservation_id']){ ?>
										<input type="submit" value="Reserve"></input>
									<?php }
									else { ?>
										<input type="submit" disabled="" value="Reserve"></input>
									<?php }
							}
						} ?>
					</td>
					</form>
				</tr>    
			<?php endforeach; ?>
        </table>
		<br>
		<a href="registered_reservations.php">See Active Reservations
		<br><br>
		<a href="logout.php">Logout!</a>
    </section>
</main>    
<footer></footer>
</body>
</html>