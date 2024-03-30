<?php
session_start();

echo "<div style='font-size: 20px; font-weight: bold; color: blue;'>Welcome : ".$_SESSION["user_name"]."</div>";?>

<!-- Front end Designing of Database Table Records     START-->

<html>
<head>
	<title>Display</title>
	<style>
		body
		{
			background: #ffffcc;
		}
		table
		{	background: white;
			tr:nth-child(even){
				background-color: #D6EEEE;}
				text-align: center;
			}
			.update,.delete
			{
				background-color: green;
				color: white;
				border: 0;
				outline: none;
				border-radius: 5px;
				height: 23px;
				width: 80px;
				font-weight: bold;
				cursor: pointer;
			}
			.delete
			{
				background-color: red;
			}
		</style>
	</head>

	<!-- Front end Designing of Database Table Records     END-->


	<!-- Database Table Records Fetch Code     START-->

	<?php
	include("connection.php");
	//error_reporting(0);

	$userporfile = $_SESSION['user_name'];  //-------------------------------------Login Session Starts------------------------------------------------>

	if($userporfile == TRUE)
	{

	}
	else
	{		
		header("Location: login.php");
			//<meta http-equiv="refresh" content ="1; url=http://localhost/crud/login.php" />
	}


	$query = "SELECT * FROM form";
	$data = mysqli_query($conn, $query);

	$total = mysqli_num_rows($data);

	$result = mysqli_fetch_assoc($data);


	//echo $total;
	if($total != 0)
	{
		?>
		<h2 align="center"><mark>Displaying Database Records</mark><br>
			<center><table  border="1" cellspacing="7" width= 85%></h2>
				<tr><br>
					<th width="5%">ID</th>
					<th width="8%">First Name</th>
					<th width="8%">Last Name</th>
					<th width="10%">Gender</th>
					<th width="20%">Email</th>
					<th width="10%">Phone</th>
					<th width="20%">Address</th>
					<th width="19%">Operations</th>
				</tr>
				<?php
		 // Use single quotes around the array key
				while($result = mysqli_fetch_assoc($data))
				{
					echo "<tr>
					<td>".$result['id']."</td>
					<td>".$result['fname']."</td>
					<td>".$result['lname']."</td>
					<td>".$result['gender']."</td>
					<td>".$result['email']."</td>
					<td>".$result['phone']."</td>
					<td>".$result['address']."</td>
					<td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
					<a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick = 'return checkdelete()'></a></td> 
					</tr>
					";	
				}
			}
			else
			{
				echo "No Record Found";
			}

			?>
		</table>
	</center>


	<!-- Logout Button START-->




	<div id="logoutBtn" style="text-align: center;">  
		<a href="logout.php"><input type="submit" value="Logout" style="background-color: blue; color: white; height: 35px; width: 100px; margin-top: 20px; margin-right: 20px; font-size: 18px; border: 0; border-radius: 5px; cursor: pointer; font-weight: normal;" onmouseover="hoverRed()" onmouseout="hoverGreen()" onclick="changeColor()"></a>
	</div>

	<script>
		var previousColor = 'blue';
		var previousFontWeight = 'normal';

		function changeColor() {
			var logoutBtn = document.getElementById('logoutBtn');
			var btnStyle = logoutBtn.querySelector('input[type="submit"]').style;
			if (btnStyle.backgroundColor === 'red') {
				previousColor = 'blue';
				previousFontWeight = 'normal';
				btnStyle.backgroundColor = 'blue';
				btnStyle.fontWeight = 'normal';
			} else {
				previousColor = 'red';
				previousFontWeight = 'bold';
				btnStyle.backgroundColor = 'red';
				btnStyle.fontWeight = 'bold';
			}
		}

		function hoverRed() {
			var logoutBtn = document.getElementById('logoutBtn');
			var btnStyle = logoutBtn.querySelector('input[type="submit"]').style;
			btnStyle.backgroundColor = 'red';
			btnStyle.fontWeight = 'bold';
		}

		function hoverGreen() {
			var logoutBtn = document.getElementById('logoutBtn');
			var btnStyle = logoutBtn.querySelector('input[type="submit"]').style;
			if (previousColor === 'blue') {
				btnStyle.backgroundColor = 'blue';
				btnStyle.fontWeight = 'normal';
			} else {
				btnStyle.backgroundColor = 'red';
				btnStyle.fontWeight = 'bold';
			}
		}
	</script>




	<!-- Logout Button END-->


	<p><mark>Visitors Count: <?php include('C:\xampp\htdocs\crud\Visitors Count\visitor_count'); ?><mark></p>


		<!-- Database Table Records Fetch Code     END-->

		<!-- Function For Check Delete using JavaScript -->

		<script>
			function checkdelete()
			{
				return confirm('Are You sure you want to Delete this Record ?');
			}
		</script>