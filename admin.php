<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login-style.css">
	<title>Admin Login Page</title>
	<style>
		table
		{
			background-color: black;
			border: 5px solid black;
			border-radius: 25px;
			background: rgba(0, 0, 0, 0.2);

		}
		#type
		{
			width: 300px;
			border: 0;
			outline: 0;
			background: transparent;
			border-bottom: 3px solid white;
			color: green;
			font-size: 25px;
			font-weight: bold;

		}
		#type::placeholder {
			color: red; /* Text color while typing */
		}
		input::-webkit-input-placeholder
		{
			font-size: 20px;
			line-height: 3;
			color: white;
		}
		#btn
		{
			width: 250px;
			background-color: orange;
			height: 35px;
			font-size: 20px;
			cursor: pointer;
			background-color: red;
			border-radius: 10px;
			font-weight: bold;
		}
		#btn:hover
		{
			background: green;
		}

	</style>
</head>

<body><br><br><br><br>
	<div class=container>
		<table width="25%" border="0" align="center" cellpadding="20">
			<tr>
				<td align="center"><img src="logo/admin_logo.png" width="50%"></td>
			</tr>
			<tr>
				<td><input type="text" placeholder="Email" id="type"></td>
			</tr>
			<tr>
				<td><input type="text" placeholder="Password" id="type"></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" value="Login" id="btn"></td>
			</tr>
		</div>
	</table>

</body>
</html>