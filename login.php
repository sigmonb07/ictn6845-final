<?php
	session_start();
	$params = session_get_cookie_params(); 
	
	if(isset($_COOKIE["username"])) {
		$usernameCookie = $_COOKIE['username'];
	}
	else {$usernameCookie = "";}
	
	if(isset($_COOKIE["password"])) {
		$passwordCookie = $_COOKIE['password'];
	}
	else {$passwordCookie = "";}
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>CCC Room Reservations Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>


<!-- the body section -->    

	<body>
		<main>
			<form action="login2.php" method="post">
				<div class="imgcontainer">
					<img src="ccc.jpg" alt="Avatar" class="avatar">
				</div>
				<div class="container">
					<p>
						<label><b>Username</b></label>
						<input type="text" placeholder="Enter Username" name="uname" value="<?php echo $usernameCookie; ?>" required>
					</p>
					<p>
						<label><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="psw" value="<?php echo $passwordCookie; ?>" required>
					</p>
				</div>

				<div class="container" style="background-color:#f1f1f1">
					<button type="submit">Login</button>
					<button type="button" class="cancelbtn">Cancel</button>
					<p><input type="checkbox" name="remember_me" checked="checked"> Remember me <a href="user_signup_form.php" class="newUserURL">New User?</a></p>
				</div>
			</form>
		</main>
	</body>
</html>