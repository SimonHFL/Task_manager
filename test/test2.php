<?php


echo "<h1> DUgDDe </h1>";



$result = array("Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag", "Søndag");

foreach($result as $row) {
  	
	  	echo "<div class = 'task'>";
		echo $row;
		echo "<br>";
		echo "</div>";

	
}


?>