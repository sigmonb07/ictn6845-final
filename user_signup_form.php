<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Registration</title>

    <!-- Framework CSS -->
    <link rel="stylesheet" type="text/css" href="main.css" />

  </head>
  <body>
    <div class="container">
      <h1>Registration Form</h1>
      <hr>
      <div class="span-3">
      	<br/>
      </div>
      <div class="span-18">

        <form id="signup" action="signup.php" method="post" class="inline">
          <fieldset>
            <div class="span-9">
            <table>
				<tr>
					<td><label for="username">Username</label>
						<input type="text" class="text" id="username" name="username" value=""></td>
					<td><label for="username">Email</label>
						<input type="text" class="text" id="email" name="email" value=""></td>
				</tr>
				<tr>
					<td><label for="password">Password</label><br>
						<input type="password" class="text" id="password" name="password" value=""></td>
					<td><label for="password">Confirm Password</label><br>
						<input type="password" class="text" id="confirmedpassword" name="confirmedpassword" value=""></td>
				</tr>
				<tr>
					<td><label for="firstname">Firstname</label><br>
						<input type="text" class="text" id="firstname" name="firstname" value=""></td>
					<td><label for="lastname">Lastname</label><br>
						<input type="text" class="text" id="lastname" name="lastname" value=""></td>
				</tr>
				<tr>
					<td></td>
					<td><label for="role">Role</label><br>
						<input type="radio" class="radio" id="role" name="role" value="user">   User 
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="checkbox" id="terms" name="terms" value=""> Please check this checkbox to accept our terms.
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Submit">
						<input type="reset" value="Reset"></td>
				</tr>
			</table
            </div>
          </fieldset>
        </form>
      </div>
      <div class="span-3 last">
      	<br/>
      </div>
    </div>
  </body>
</html>
