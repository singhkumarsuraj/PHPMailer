

<?php
include('connection.php');
include('database.php');


session_start();
//echo "Welcome ".$_SESSION["user_name"];



$id = $_GET['id'];

		$userporfile = $_SESSION['user_name'];  //-------------------------------------Login Session Starts------------------------------------------------>

		if($userporfile == TRUE)
		{

		}
		else
		{		
			header("Location: login.php");
			//<meta http-equiv="refresh" content ="1; url=http://localhost/crud/login.php" />
		}
		$query = "SELECT * FROM form WHERE id='$id'";
		$data  = mysqli_query($conn, $query);

		$result = mysqli_fetch_assoc($data);
		
		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" type="text/css" href="style.css">
			<title>PHP CRUD Operations</title>
		</head>
		<body>
			<div class="container">
				<form action="update_design.php" method="POST">

					<div class="title">
						Update Details
					</div>
					<div class="form">
						<div class="input_field">
							<label>First Name</label>
							<input type="text" value="<?php echo $result["fname"]; ?>" class="input" name="fname" required>
						</div>

						<div class="input_field">
							<label>Last Name</label>
							<input type="text" value="<?php echo $result["lname"]; ?>" class="input" name="lname">
						</div>

						<div class="input_field">
							<label>Password</label>
							<input type="text" value="<?php echo $result["password"]; ?>" class="input" name="password" required>
						</div>

						<div class="input_field">
							<label>Confirm Password</label>
							<input type="text" value="<?php echo $result["cpassword"]; ?>" class="input" name="conpassword" required>
						</div>

						<div class="input_field">				
							<label>Gender</label>
							<div class="custom_select">
								<select name="gender" required>
									<option value="">Select Gender</option>
									<option value="Male" <?php if($result["gender"] == "Male") echo "selected"; ?>>Male</option>
									<option value="Female" <?php if($result["gender"] == "Female") echo "selected"; ?>>Female</option>
								</select>
							</div>
						</div>


						<div class="input_field">
							<label>Email Address</label>
							<input type="text" value="<?php echo $result["email"]; ?>" class="input" name="email" required>
						</div>

						<div class="input_field">
							<label>Phone Number</label>
							<input type="text" value="<?php echo $result["phone"]; ?>" class="input" name="phone" required>
						</div>

						<div class="input_field"><label>Address</label><textarea class="textarea" name="address" required><?php echo $result["address"]; ?></textarea></div>

						<div class="input_field terms">
							<label class="check">
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
							<p>Agree Terms & Conditions</p>
						</div>

						<div class="input_field">
							<input type="submit" value="Update Details" class="btn" name="update">
						</div>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
					</div>
				</form>
			</div>
		</body>
		</html>