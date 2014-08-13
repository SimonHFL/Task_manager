
<h1> Opgaver </h1>

<?php
	// flyt denne del op forrest og opgave vil update rigtig
$con = mysqli_connect("localhost","root","root","taskman_projekt");
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



$dag = 'ingen valgt';

// add task function
include 'inc/addTask.php';
include 'inc/addTaskHandling.php';

// add heading function
?>
<div class='newHeadingContainer'>
<div class='newHeading'>tilføj gruppe
</div>
<div class='addHeading'>
	<?php
	include 'inc/addHeading.php';
	include 'inc/editTaskHandling.php';
	?>
</div>
</div>
<?php 
	
//retreive tasks from DB	
include 'inc/importTasks.php';
	
//retreive headings from DB
		$resultHeadings = mysqli_query($con,"SELECT * FROM Headings");
		$countHeadings= mysqli_num_rows($resultHeadings); 
		$result_listHeadings = array();
		while($row = mysqli_fetch_array($resultHeadings)) {
			$result_listHeadings[] = $row;
		}

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
			
<?php
			echo "</br>";	
			// iterate through tasks									
			for($i = 0; $i <$count; $i++) {		
				if ($result_list[$i][4] == $result_listHeadings[$j][1]) {
					include 'inc/task.php';	
				}		
			}	
		}

// slet alt form
include "inc/sletAlt.php";

?>




