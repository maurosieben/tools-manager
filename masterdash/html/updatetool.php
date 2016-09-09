<?php	
header('Location: index.php');
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","siemens_tools");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['serial']) && !empty($_GET['serial'])) {
  $query = "UPDATE lista SET cse = '{$_GET['cse']}', calib ='{$_GET['calib']}' WHERE serial = '{$_GET['serial']}' ";
  mysqli_query($con,$query);
  echo "OK";
}
else 
{
   echo "Invalid Request";
}
?>