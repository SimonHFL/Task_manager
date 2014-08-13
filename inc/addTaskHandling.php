<?php 
$opgave = $_POST[opgave];
$underopgave = $_POST[underopgave];
$dagGlobal = $_POST[dag];

//connect to DB
	$con=mysqli_connect("localhost","root","root","taskman_projekt");

// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

//insert into DB
if ($_POST[submit]) {
	mysqli_query($con,"INSERT INTO `Taskman` (`Nummer`, `Opgave`, `Underopgave`, `Dag`, `Heading` ) VALUES (NULL,'$opgave','$underopgave','$dagGlobal', 'ingen')");
}
?>