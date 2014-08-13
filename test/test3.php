<div>
<?php 
$uge = array("Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag", "Søndag");
$con = mysqli_connect("localhost","root","root","taskman_projekt");
$result = mysqli_query($con,"SELECT * FROM Taskman");
$count= mysqli_num_rows($result); 

$result_list = array();
while($row = mysqli_fetch_array($result)) {
	$result_list[] = $row;
}

echo "<h1> Uge </h1>";

foreach($uge as $dag) {
	echo "<H2>". $dag . "</H2>";
	
	for($i = 0; $i <$count; $i++) {
		if ($result_list[$i][3] == $dag) { 
		  	echo "<div class = 'task'>";
			echo $result_list[$i][1];
			echo "<br>";
			echo "</div>";	
		}
	}
}


	
?>

</div>