	<?php 
	
	$opgave = $_POST[opgaveEdit];
	$underopgave = $_POST[underopgaveEdit];
	$taskNummer = $_POST[taskNummer];


	//connect to DB
		$con=mysqli_connect("localhost","root","root","taskman_projekt");

	// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

	//insert into DB
	if ($_POST[submitEdit]) {
		mysqli_query($con,"UPDATE Taskman SET Opgave='$opgave', Underopgave='$underopgave'
		WHERE Nummer=$taskNummer");	
	}
	
	?>