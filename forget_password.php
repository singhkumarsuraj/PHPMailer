<?php 
session_start();

$page_title = "Password Reset Form";

if (isset($_SESSION['status'])) {
    $status_message = $_SESSION['status'];
    $status_type = $_SESSION['status_type']; // New session variable for status type
    unset($_SESSION['status']); // Clear the session status after displaying it
    unset($_SESSION['status_type']); // Clear the session status type after displaying it
} else {
    $status_message = ""; // Default empty message
    $status_type = ""; // Default empty type
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <title>Forget Password</title>
</head>
<body>

    <div class="container">
        <?php if (!empty($status_message)) : ?>
            <!-- Display SweetAlert message -->
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
                // Check status type and display corresponding SweetAlert
                <?php if ($status_type == 'success' || $status_type == 'danger') : ?>
                    Swal.fire({
                        title: '<?php echo ucfirst($status_type); ?>',
                        html: '<?php echo $status_message; ?>',
                        icon: '<?php echo $status_type == "success" ? "success" : "error"; ?>',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        <?php if ($status_type == 'success') : ?>
                            window.location.href = "update_password.php";
                        <?php endif; ?>
                    });
                <?php endif; ?>
            </script>
        <?php endif; ?>
        <form action="password-reset-code.php" method="POST">
            <div class="title">
                Verify Your Email
            </div>
            <div class="form">
                <div class="input_field">
                    <label>Registered Email</label>
                    <input type="text" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <button type="submit" class="btn" name="password_reset_link">Send OTP</button>
                </div>
            </div>
        </form>
        
    </div>

    <!-- Include SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>
