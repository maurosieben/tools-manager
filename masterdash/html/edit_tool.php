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
	  
	  <h1>Editar informações<h1>
	</div>
    
	
	<?php
	  
	   // Create connection
	   $con=mysqli_connect("localhost","root","ptcdashboard","siemens_tools");
	   
	   // Check connection
	   if (mysqli_connect_errno()) {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	   }
	   if(isset($_GET['serial']) && !empty($_GET['serial'])) {
	   $result = mysqli_query($con,"SELECT * FROM lista WHERE serial = '{$_GET['serial']}' ");
	   //echo "OK";
	   }
	   else 
	   {
	   echo "Invalid Request";
	   
	   }
	   //$result = mysqli_query($con,"SELECT * FROM lista WHERE serial = '1910'");
	   echo "<table class='table table-striped'>";
	   // print a table of IPs, hostnames and Check-in time
	   echo "<tr>";
	   echo "<th>Série</th>";
	   echo "<th>Descrição</th>";
	   echo "<th>CSE/Local</th>";
	   echo "<th>Calibração</th>";
	   echo "<th>Ação</th>";
	   echo "</tr>";      
	   ?>
	
	<form class ="navbar-form navbar-center" role="Media Link" action="updatetool.php" method="get">
	  <div class="form-group">
	    <tr>
	      <!--	      <td><input type="text" name="serial_inf" placeholder="Número de Série" ></td>
	      <td><input type="text" name="desc_inf" placeholder="Ferramenta" ></td> -->
	      <?php
		 while($row = mysqli_fetch_array($result)) {
		 //echo "<tr>";
		 echo "<td>";
		 echo $row['serial'];
		 echo "</td>";
		 echo "<td>";
		 echo $row['descri'];
		 echo "<td><input type='text' name='cse' placeholder ={$row['cse']}></td>";
		 echo "<td><input type='text' name='calib' placeholder={$row['calib']}></td>";
		 echo "<input type='hidden' name='serial' value={$row['serial']}>";
		 echo "<td><a href=http://localhost:80/del-tool.php?serial={$row['serial']}>Deletar</a></td>";
		 }
	      	 ?>
	      <td><button type="submit" class="btn btn-primary">Editar</button></td>
	    </tr>
	  </div>
	</form>
  </body>
</html>
