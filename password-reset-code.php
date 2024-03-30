<?php
session_start();
include('connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'C:\xampp\htdocs\crud\phpmailer\vendor\autoload.php';

function generate_otp() {
    // Generate a random 6-digit OTP
    return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
}

function send_password_reset_otp($get_name, $get_email, $otp)
{
    //Server settings
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'surajbsc@student.iul.ac.in';
    $mail->Password   = 'szeopaaypbvljggx';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('surajbsc@student.iul.ac.in', 'Major Project - Car Price Prediction');
    $mail->addAddress($get_email);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset OTP';

    //Email Template design
    $email_template = "
        <h2>Hello $get_name,</h2>

        <h3>This is an Auto-Generated Email for Password Reset Request for your Account.</h3>

        <p>Your OTP for password reset is: <b>$otp</b></p>
        <br>
        <p>This email is based on Development of : <b>Major Project of Car Price Prediction</b>.</p><br><br>
        <p>This Project is Under Development Please Ignore this Email</P><br>
        <p> Developed By :</p>
        <b>SURAJ KUMAR SINGH<b> <br><br> B.TECH (Computer Science & Engineering) <br> INTEGRAL UNIVERSITY LUCKNOW.</p>
        <p>Year- 4th</p><p>Semester- 8th </p><br>
    ";

    $mail->Body = $email_template; // Assign the email template to the Body property

    try {
        $mail->send();
        $_SESSION['status'] = "OTP has been sent to your email.";
        $_SESSION['status_type'] = "success"; // Add status type
        header('Location: update_password.php');
        exit(0);
    } catch (Exception $e) {
        $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $_SESSION['status_type'] = "error"; // Add status type
        header('Location: update_password.php');
        exit(0);
    }
}



if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check_email_query = "SELECT * FROM form WHERE email='$email' LIMIT 1";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $row = mysqli_fetch_assoc($check_email_result);
        $get_name = $row['fname'];
        $get_email = $row['email'];

        $otp = generate_otp(); // Generate OTP

        // Update the OTP in the database
        $update_otp_query = "UPDATE form SET verify_token='$otp' WHERE email='$email'";
        $result = mysqli_query($conn, $update_otp_query);
        if (!$result) {
            $_SESSION['status'] = "Error updating token: " . mysqli_error($conn);
            $_SESSION['status_type'] = "error";
            header('Location: update_password.php?email=' . urlencode($email));
            exit(0);
        }

        // Send OTP via email
        send_password_reset_otp($get_name, $get_email, $otp);
    } else {
        $_SESSION['status'] = "No Email Found";
        header('Location: update_password.php');
        exit(0);
    }
}

?>
