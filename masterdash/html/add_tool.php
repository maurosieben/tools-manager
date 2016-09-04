<html>
  
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        
  </head>
  
  <body>
    
    <center>
      <div class="container">
	
	<div class="masthead">
	  <!-- <h3 class="text-muted">Project name</h3> -->
      
	  <img src="siemens.jpg"></img>
	  
	  <!-- page title -->
	  
	  <h1>Adicionar ferramenta<h1>
	</div>
    
	
	<?php
	  
	  // Create connection
	  $con=mysqli_connect("localhost","root","ptcdashboard","siemens_tools");
	  
	  // Check connection
	  if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	
	  $result = mysqli_query($con,"SELECT * FROM lista");
	  mysqli_free_result($result);
	  
	  echo "<table class='table table-striped'>";
	  // print a table of IPs, hostnames and Check-in time
	  echo "<tr>";
	  echo "<th>Série</th>";
	  echo "<th>Descrição</th>";
	  echo "<th>CSE/Local</th>";
	  echo "<th>Calibração</th>";
	  echo "</tr>";      
	  ?>
	
	<form class ="navbar-form navbar-center" role="Media Link" action="addtool.php" method="get">
	  <div class="form-group">
	    <tr>
	      <td><input type="text" name="serial_inf" placeholder="Número de Série" ></td>
	      <td><input type="text" name="desc_inf" placeholder="Ferramenta" ></td>
	      <td><input type="text" name="cse_inf" placeholder="CSE ou Local"></td>
	      <td><input type="text" name="calib_inf" placeholder="ano-mês-dia"></td>
	      <td><button type="submit" class="btn btn-primary">Add</button></td>
	    </tr>
	  </div>
	</form>
  </body>
</html>
