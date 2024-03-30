<?php
include('connection.php');
include('database.php');

$id = $_GET['id'];

$query = "DELETE FROM form WHERE id='$id'";

	//for Executing this query 

$data = mysqli_query($conn, $query);

if($data) {
 echo "<script>alert('Data Deleted Successfuly...')</script>";
 ?>
 <meta http-equiv="refresh" content="10; url= http://localhost/crud/display.php"/>
 <?php

} 
else {
    echo "<script>alert('Failed to Delete Data...')</script>";
    ?>
    <meta http-equiv="refresh" content="10; url= http://localhost/crud/update.php"/>
    <?php
}
header("refresh: 0; url=http://localhost/crud/display.php");
exit();


?>