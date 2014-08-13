<h1> Uge </h1>

<?php 
$uge = array("Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag", "Søndag");

// import tasks into array
include 'inc/importTasks.php';

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
}
	
?>

