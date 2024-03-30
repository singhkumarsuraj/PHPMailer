<?php
if(isset($_POST['register'])) {
    $fname          = $_POST['fname'];
    $lname          = $_POST['lname'];
    $password       = $_POST['password'];
    $conpassword    = $_POST['conpassword'];
    $gender         = $_POST['gender'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $address        = $_POST['address'];

        // Assuming you have established database connection and stored it in $conn

        // Insert query
    $query = "INSERT INTO form (fname, lname, password, cpassword, gender, email, phone, address)
    VALUES ('$fname', '$lname', '$password', '$conpassword', '$gender', '$email', '$phone', '$address')";

    $data = mysqli_query($conn, $query);

    if($data) {
        echo "<script>alert('Registration Successful...')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url= http://localhost/crud/display.php"/>
        <?php

    } else {
        echo "<script>alert('Registration Failed... due to server / user alredy exist with same email try another')</script>";
        ?>
        <meta http-equiv="refresh" content="1; url= http://localhost/crud/form.php"/>
        <?php        
    }
    header("refresh: 0; url=http://localhost/crud/display.php");
    exit();
}

?>

<!-- ---------------------------------------------------------------------------------------------------------------- -->

<?php
    // Include your database connection script

if(isset($_POST['update'])) {
        // Retrieve form data
    $id             = $_POST['id'];
    $fname          = $_POST['fname'];
    $lname          = $_POST['lname'];
    $password       = $_POST['password'];
    $conpassword    = $_POST['conpassword'];
    $gender         = $_POST['gender'];
    $email          = $_POST['email'];
    $phone          = $_POST['phone'];
    $address        = $_POST['address'];

        // Update query
    
    $query = "UPDATE form SET fname='$fname', lname='$lname', password='$password', cpassword='$conpassword',
    gender='$gender', email='$email', phone='$phone', address='$address' WHERE id='$id'";

    $data = mysqli_query($conn, $query);

    if($data) {
       echo "<script>alert('Data Updated Successfuly...')</script>";
       ?>
       <meta http-equiv="refresh" content="10; url= http://localhost/crud/display.php"/>
       <?php

   } 
   else {
    echo "<script>alert('Failed to Update...')</script>";
    ?>
    <meta http-equiv="refresh" content="10; url= http://localhost/crud/update.php"/>
    <?php
}
header("refresh: 0; url=http://localhost/crud/display.php");
exit();
}
?>

<!-- ---------------------------------------------------------------------------------------------------------------- -->
