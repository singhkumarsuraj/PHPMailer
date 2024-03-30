<?php
session_start();
include('connection.php');

// Check if the status message and type are set in the session
$status_message = isset($_SESSION['status']) ? $_SESSION['status'] : '';
$status_type = isset($_SESSION['status_type']) ? $_SESSION['status_type'] : '';

// Unset the session variables to prevent them from being displayed again
unset($_SESSION['status']);
unset($_SESSION['status_type']);

// Check if the OTP form is submitted
if (isset($_POST['submit'])) {
    // Validate OTP and update password
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $otp = mysqli_real_escape_string($conn, $_POST['otp']);

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        $_SESSION['status'] = "Passwords do not match.";
        $_SESSION['status_type'] = "error";
        header('Location: update_password.php?email=' . urlencode($email));
        exit(0);
    }

    // Check if OTP is valid (you need to implement this part)
    $stored_otp = ""; // Retrieve OTP from the database for the given email (you need to implement this part)
    if ($otp !== $stored_otp) {
        $_SESSION['status'] = "Invalid OTP.";
        $_SESSION['status_type'] = "error";
        header('Location: update_password.php?email=' . urlencode($email));
        exit(0);
    }

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $update_password_query = "UPDATE form SET password='$hashed_password' WHERE email='$email'";
    mysqli_query($conn, $update_password_query);

    // Reset the verification token in the database (optional)
    // $reset_token_query = "UPDATE form SET verify_token='' WHERE email='$email'";
    // mysqli_query($conn, $reset_token_query);

    $_SESSION['status'] = "Password updated successfully.";
    $_SESSION['status_type'] = "success";
    header('Location: login.php'); // Redirect to login page
    exit(0);
}




// Resend OTP logic
if (isset($_POST['resend_otp'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Generate new OTP (you need to implement this part)
    $new_otp = "123456"; // Example new OTP

    // Update the OTP in the database
    $update_otp_query = "UPDATE form SET verify_token='$new_otp' WHERE email='$email'";
    $result = mysqli_query($conn, $update_otp_query);
    if (!$result) {
        echo "Error updating token: " . mysqli_error($conn);
        // Or you can redirect with an error message
        exit(0);
    } else {
        echo "Token updated successfully.";
    }

    // Send the new OTP via email (you need to implement this part)
    // Example code to send email with new OTP
    $to = $email;
    $subject = "New OTP for Password Reset";
    $message = "Your new OTP is: $new_otp";
    $headers = "From: surajbsc@student.iul.ac.in"; // Change this to your email address
    mail($to, $subject, $message, $headers);

    $_SESSION['status'] = "New OTP has been sent to your email.";
    $_SESSION['status_type'] = "success";
    header('Location: update_password.php?email=' . urlencode($email));
    exit(0);
}


// Check if no email found
if (isset($_POST['resend_otp']) && mysqli_num_rows($check_email_result) == 0) {
    $_SESSION['status'] = "No Email Found";
    header('Location: login.php'); // Redirect to login page
    exit(0);
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Update Password</title>
</head>
<body>
    <div class="container">
        <?php if (!empty($status_message)): ?>
            <?php if ($status_type === 'success'): ?>
                <!-- Display success message -->
                <script>
                    alert("<?php echo $status_message; ?>");
                </script>
            <?php elseif ($status_type === 'error'): ?>
                <!-- Display error message -->
                <script>
                    alert("<?php echo $status_message; ?>");
                </script>
            <?php endif; ?>
        <?php endif; ?>

        <!-- Update password form -->
        <form action="update_password.php" method="POST">
            <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
            <div class="title">
                Update Password 
            </div>
            <div class="form">
                <div class="input_field">
                    <label>New Password</label>
                    <input type="password" class="input" name="new_password" required>
                </div>
                <div class="input_field">
                    <label>Retype Password</label>
                    <input type="password" class="input" name="confirm_password" required>
                </div>
                <div class="input_field">
                    <label>Enter OTP</label>
                    <input type="text" class="input" name="otp" required>
                </div>
                <div class="input_field">
                    <input type="submit" value="Submit" class="btn" name="submit">
                </div>
                <div class="input_field">
                    <input type="submit" value="Resend OTP" class="btn" name="resend_otp">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
