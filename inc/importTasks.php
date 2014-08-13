<?php	
$con = mysqli_connect("localhost","root","root","taskman_projekt");
$result = mysqli_query($con,"SELECT * FROM Taskman");
$count= mysqli_num_rows($result); 

$result_list = array();
while($row = mysqli_fetch_array($result)) {
	$result_list[] = $row;
}
?>