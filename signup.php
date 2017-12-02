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

<?php
$dbservername = "localhost";
$dbusername = "id3121202_mgs_user";
$dbpassword = "password";
$dbname = "id3121202_ictn6845";

$username= $_POST["username"];
$email= $_POST["email"];
$password= $_POST["password"];
$confirmPassword= $_POST["confirmedpassword"];
$firstname= $_POST["firstname"];
$lastname= $_POST["lastname"];
$role= $_POST["role"];
$terms= $_POST["terms"];

echo "User account $username has been successfully added:<br>" ;

try {
    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO usertable (username, email, password, confirmedpassword, firstname, lastname, role) VALUES ('$username', '$email', '$password', '$confirmPassword', '$firstname', '$lastname', '$role')";

    // use exec() because no results are returned
    $conn->exec($sql);

    echo "User account database updated successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>
<br>
<br>
<a href='login.php'>Click here</a> to return to login page
</main>
</body>
</html>