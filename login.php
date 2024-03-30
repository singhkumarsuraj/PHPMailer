 <?php
 session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <title>User Login Page</title>

    <!-- Updated CSS for the custom styled message box -->
    <style>
        /* CSS for the custom styled message box */
        .messageBox {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #7CFC00; /* Light green background color */
            border: 1px solid #32CD32; /* Dark green border color */
            border-radius: 5px;
            font-weight: bold;
            color: black;
            text-align: center; /* Center align the text */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); /* Add a shadow effect */
        }

        /* CSS for the OK button */
        .okButton {
            background-color: #007bff; /* Blue button background color */
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .okButton:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* CSS for the password input field and eye icon */
        .password-container {
            position: relative;
        }

        .password-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>User Login</h1>

        <form action="#" method="POST" autocomplete="off" id="loginForm">
            <div class="form">
                <input type="text" name="username" class="textfield" placeholder="User Email" required>
                <div class="password-container">
                    <input type="password" name="password" class="textfield" id="password" placeholder="Password" required>
                    <i class="password-icon" id="togglePassword">🔒</i>
                </div>
                <div class="forgetpass"><a href="forget_password.php" class="link" onclick="">Forget Password ?</a></div>
                <input type="submit" name="login" value="Login" class="btn">
                <div class="signup">New Member ? <a href="form.php" class="link">SignUp Here</a></div>
            </div>
        </form>
    </div>

    <!-- HTML for the custom styled message box -->
    <div id="messageBox" class="messageBox">
        <p>Welcome ! Login Successful...</p>
    </div>

    <script>
    // JavaScript function to show the custom styled message box
        function message() {
            var messageBox = document.getElementById('messageBox');
            messageBox.style.display = 'block';
        }

    // JavaScript function to submit the login form
        function submitForm() {
            document.getElementById('loginForm').submit();
        }

    // JavaScript function to toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            this.textContent = '👁️'; // Change to an eye icon when password is visible
        } else {
            passwordField.type = 'password';
            this.textContent = '👁️‍🗨️'; // Change to a lock icon when password is hidden
        }
    });
</script>

<?php
include("connection.php");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM form WHERE email = '$username' && password = '$pwd'";

    $data = mysqli_query($conn,$query);

    $total = mysqli_num_rows($data);

    // User Conditions
    if($total == 1)
    {
        $_SESSION['user_name'] = $username;
        echo '<script type="text/JavaScript">';  
        echo 'message()'; // Call the function to show the message box
        echo '</script>';   
        ?>
        <!--<meta http-equiv="refresh" content ="1; url=http://localhost/crud/display.php" />-->
        <meta http-equiv="refresh" content ="1; url=http://localhost/crud/display.php" />
        <?php
    }
    else
    {
        echo '<script type ="text/JavaScript">';  echo 'alert("Login Failed due to Incorrect Details")'; echo '</script>';   
    }
}
?> 
</body>
</html>
