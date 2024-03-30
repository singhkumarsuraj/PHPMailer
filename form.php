<?php
include('connection.php');
include('database.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>User Signup Page</title>
</head>
<body>
	<div class="container">
		<form action="#" method="POST">

			<div class="title">
				User Registration
			</div>
			<div class="form">
				<div class="input_field">
					<label>First Name</label>
					<input type="text" class="input" name="fname" required>
				</div>

				<div class="input_field">
					<label>Last Name</label>
					<input type="text" class="input" name="lname">
				</div>

				<div class="input_field">
					<label>Password</label>
					<input type="text" class="input" name="password" required>
				</div>

				<div class="input_field">
					<label>Confirm Password</label>
					<input type="text" class="input" name="conpassword" required>
				</div>

				<div class="input_field">
					<label>Gender</label>
					<div class="custom_select">
						<select name="gender" required>
							<option value="Not Selected">Select</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>

				<div class="input_field">
					<label>Email Address</label>
					<input type="text" class="input" name="email" required>
				</div>

				<div class="input_field">
					<label>Phone Number</label>
					<input type="text" class="input" name="phone">
				</div>

				<div class="input_field">
					<label>Address</label>
					<textarea class="textarea" name="address"></textarea>
				</div>

				<div class="input_field terms">
					<label class="check">
						<input type="checkbox">
						<span class="checkmark"></span>
					</label>
					<p>Agree Terms & Conditions</p>
				</div>

				<div class="input_field">
					<input type="submit" value="Register" class="btn" name="register">
				</div>
				<div class="login">Registered User ? <a href="login.php" class="link">Login Here</a></div>


			</div>
		</form>
	</div>
</body>
</html>

