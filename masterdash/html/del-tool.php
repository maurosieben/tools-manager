<?php	
header('Location: index.php');
// Create connection with data base
$con=mysqli_connect("localhost","root","ptcdashboard","siemens_tools");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_GET['serial']) && !empty($_GET['serial'])) {
  mysqli_query($con,"DELETE FROM lista WHERE serial = '{$_GET['serial']}' ");
  echo "OK";

}
else 
{
   echo "Invalid Request";
}



?>