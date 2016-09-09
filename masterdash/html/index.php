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
	  
	  <h1>Monitor de ferramentas<h1>
	</div>
	
	<?php
	   
	   setlocale(LC_ALL, 'pt_BR');
	   // Create connection
	   $con=mysqli_connect("localhost","root","ptcdashboard","siemens_tools");
	   
	   // Check connection
	   if (mysqli_connect_errno()) {
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	   }
	   
	  if(isset($_POST['search']))
	   {
	   $valueToSearch = $_POST['valueToSearch'];
	   // search in all table columns
	   // using concat mysql function
	   $query = "SELECT * FROM `lista` WHERE CONCAT(`serial`, `descri`, `cse`, `calib`) LIKE '%".$valueToSearch."%'";
	   $result = mysqli_query($con, $query); 
	   }
	   else
	   {
	   $result = mysqli_query($con,"SELECT * FROM lista"); 
	   }

	   echo "<table class='table table-striped'>";
	   // print a table whith info
	   echo "<tr>";
	   echo "<th>Série</th>";
	   echo "<th>Descrição</th>";
	   echo "<th>CSE/Local</th>";
	   echo "<th>Calibração</th>";
	   echo "<th>Ação</th>";
	   echo "</tr>";
	   
	   while($row = mysqli_fetch_array($result)) {
	   echo "<tr>";
	   echo "<td>";
	   echo $row['serial'];
	   echo "</td>";
	   echo "<td>";
	   echo $row['descri'];
	   echo "</td>";
	   echo "<td>";
	   echo $row['cse'];
	   echo "</td>";
	   echo "<td>";
	   //$date_form = strftime('%d/%m/%y', $row['calib']);
	   echo $row['calib'];
	   //echo $date_form;
	   echo "</td>";
	   echo "<td>";
	   echo "<a href=http://localhost:80/edit_tool.php?serial={$row['serial']}> Editar</a>";
	   echo "</td>";
	   echo "</tr>";
	   }
	   mysqli_free_result($result);
	   ?>
	
	<form class ="navbar-form navbar-center" role="Media Link" action="add_tool.php" method="get">
	    <!-- <div class="form-group">
		 MasterLoad - Load to All Dashboards: <input type="text" name="url">
		 </div> -->
	    <tr> <button type="submit" class="btn btn-primary">Adicionar Ferramenta</button></tr><tr></tr>
	</form>

	<form action="index.php" method="post">
	  <tr><input type="text" name="valueToSearch" placeholder="Pesquisa"></tr>
	  <tr><input type="submit" name="search" value="Filtro"><br><br></tr> 
	  
  </body>
</html>
