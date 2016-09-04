<?php
header('Location: index.php');
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","siemens_tools");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Verify IP and hostname
if(isset($_GET['serial_inf']) && !empty($_GET['serial_inf']) && isset($_GET['desc_inf']) && !empty($_GET['desc_inf']) && isset($_GET['cse_inf']) && !empty($_GET['cse_inf']) && isset($_GET['calib_inf']) && !empty($_GET['calib_inf'])){

  mysqli_query($con,"INSERT INTO lista (serial, descri, cse, calib) VALUES ('{$_GET['serial_inf']}','{$_GET['desc_inf']}','{$_GET['cse_inf']}','{$_GET['calib_inf']}')");
  echo "OK";
}
else{
  echo "Invalid Request";
}
?>
