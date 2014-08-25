<?php
$con = mysqli_connect("localhost","root","root","taskman_projekt");

// handling of requests

	// handling of submit 'completed' request
	if ($_POST[completed])
		{	
			$sql = "DELETE FROM Taskman WHERE Nummer=$_POST[completed]";
			mysqli_query($con,$sql);
			mysqli_query($con,"ALTER TABLE Taskman AUTO_INCREMENT = 1");
		}

	// handling of submit 'slet' request
	if ($_POST[slet])
		{	
			$sql = "DELETE FROM Taskman WHERE Nummer=$_POST[slet]";
			mysqli_query($con,$sql);
			mysqli_query($con,"ALTER TABLE Taskman AUTO_INCREMENT = 1");
		}

	// handling of submit 'dag' form
	if ($_POST[dag])
		{
			$variabel  = $_POST[dag];
			$pieces = explode(" ", $variabel);
			$dag = $pieces[0]; // piece1
			$nummer = $pieces[1]; // piece2
			mysqli_query($con,"UPDATE Taskman SET Dag='$dag'
			WHERE Nummer=$nummer");		
		}

	// handling of submit 'header' form
	if ($_POST[headerSelect])
		{
			$headerNummer  = $_POST[headerSelect];
			$pieces = explode(" ", $headerNummer);
			$count = count($pieces);
			$cMinus1 = $count - 1;
			$cMinus2 = $count - 2;
			 // $header = $pieces[0]; // piece1

			for ($i = 0; $i < $cMinus1; $i++) {
			    $header .= $pieces[$i];
				if ($i < $cMinus2) { $header .= " ";}
			}
			$nr = $pieces[$cMinus1]; // piece2
			mysqli_query($con,"UPDATE Taskman SET Heading='$header'
			WHERE Nummer=$nr");		
		}

	// handling sletHeader
	if ($_POST[sletHeader])
		{	
			$sql = "DELETE FROM Headings WHERE Nummer=$_POST[sletHeader]";
			mysqli_query($con,$sql);
			mysqli_query($con,"ALTER TABLE Taskman AUTO_INCREMENT = 1");
		}

	// handling slet alt
	if ($_POST[sletalt]) 
	{
		mysqli_query($con,"DELETE FROM Taskman");
		mysqli_query($con,"ALTER TABLE Taskman AUTO_INCREMENT = 1");
	}

	mysqli_close($con);



	// add task handling
	if ($_POST[submit]) {
		$opgave = $_POST[opgave];
		$underopgave = $_POST[underopgave];
		$dagGlobal = $_POST[dag];

		//connect to DB
			$con=mysqli_connect("localhost","root","root","taskman_projekt");

		// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

		mysqli_query($con,"INSERT INTO `Taskman` (`Nummer`, `Opgave`, `Underopgave`, `Dag`, `Heading` ) VALUES (NULL,'$opgave','$underopgave','$dagGlobal', 'ingen')");
	}


	// edit task handling
	if ($_POST[submitEdit]) {

		$opgave = $_POST[opgaveEdit];
		$underopgave = $_POST[underopgaveEdit];
		$taskNummer = $_POST[taskNummer];


		//connect to DB
			$con=mysqli_connect("localhost","root","root","taskman_projekt");

		// Check connection
			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}


		mysqli_query($con,"UPDATE Taskman SET Opgave='$opgave', Underopgave='$underopgave'
		WHERE Nummer=$taskNummer");	
	}
	
	
// import data to view

	//retreive tasks from DB	
	
	$con = mysqli_connect("localhost","root","root","taskman_projekt");
	$result = mysqli_query($con,"SELECT * FROM Taskman");
	$count= mysqli_num_rows($result); 

	$result_list = array();
	while($row = mysqli_fetch_array($result)) {
		$result_list[] = $row;
	}	

	//retreive headings from DB
			$resultHeadings = mysqli_query($con,"SELECT * FROM Headings");
			$countHeadings= mysqli_num_rows($resultHeadings); 
			$result_listHeadings = array();
			while($row = mysqli_fetch_array($resultHeadings)) {
				$result_listHeadings[] = $row;
			}
	
	

// ******* flyt ******
$taskHeadings = array ();
$heading = $_POST[heading];

if ($_POST[submitHeading]) {
	$taskHeadings[] = $heading;
	mysqli_query($con,"INSERT INTO `Headings` (`Nummer`,`Heading`) VALUES (NULL,'$heading')");

}


// declare week array
$uge = array("Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag", "Søndag");


?>	




<html>
	<head>
		
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript"></script>
		<script src="js/jqueryscript.js"></script>
		
	</head>

	<body>
		<div id="header">  </div>	
		
		<div id="content">
			
			<div id="opgaver">

				<h1> Opgaver </h1>

				<?php include 'inc/addTask.php'; ?>
				
				<div class='newHeadingContainer'>
					
					<div class='newHeading'>tilføj gruppe </div>
					
					<div class='addHeading'>
						
						<div>
						
							<form id="form5" name="form5" method="post" action="">
									<label> skriv overskrift
										<input type="text" name="heading" id="heading"/>
									</label>
									<p>
										<label>
											<input type="submit" name="submitHeading" id="submitHeading" value="Submit"/>
										</label>
									</p>
							</form>
							
						</div>
	

					</div>
					
				</div>
				<?php 
				// iterate through tasks with no heading specification									
						for($i = 0; $i <$count; $i++) {	
							if ($result_list[$i][4] == 'ingen') {
								include 'inc/task.php';	
							}						
						}	

				// iterate through headings	
					for($j = 0; $j <$countHeadings; $j++) {	?>
						<div class='header'>
							
							<?php echo "<b>" . $result_listHeadings[$j][1] . "</b>";?>
							<div class='headerSlet'>	
										
								<form method='post' action='' name='form7'>
									<button style='inline' type='submit' name='sletHeader' value= <?php echo $result_listHeadings[$j][0]; ?>> slet </button>
								</form>
								
							</div>
							
						</div>
						</br>
			
				<?php	// iterate through tasks									
							for($i = 0; $i <$count; $i++) {		
								if ($result_list[$i][4] == $result_listHeadings[$j][1]) {
									include 'inc/task.php';	
								}		
							}	
					} ?>
				
				<form method='post' action='' name='form3'>
					<label>
						<input type="submit" name="sletalt" id="sletalt" value="slet alt"/>
					</label>
				</form>
		
			</div>
			
			<div id="uge">
				
				<h1> Uge </h1>

				<?php 
				// iterate through array
				foreach($uge as $dag) {
					echo "<div class='dag'>";
						echo "<H2>". $dag . "</H2>";	
						include 'inc/addTask.php';
						for($i = 0; $i <$count; $i++) {
							if ($result_list[$i][3] == $dag) {
								include 'inc/task.php';			
							}
						}
					echo "</div>";
				} ?>
				
			</div>	
			
		</div>
		
		<div id="footer">  
		
		</div>	
		
	</body>
	
</html>