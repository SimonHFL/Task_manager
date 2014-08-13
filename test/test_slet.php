

<?php 

	$con = mysqli_connect("localhost","root","root","taskman_projekt");
	$result = mysqli_query($con,"SELECT * FROM Taskman");
	$count= mysqli_num_rows($result); 

	$result_list = array();
	while($row = mysqli_fetch_array($result)) {
		$result_list[] = $row;
	}




	for($i = 0; $i <$count; $i++) {
		
		  	echo "<div class = 'task'>";
				echo "<h3>" . $result_list[$i][1] . "</h3>";
				echo "<p>" . $result_list[$i][2] . "</p>";		
?>		
				<div class="options">
				<form method='post' action='' name='form2'>
				<button style='inline' type='submit' name='slet' value= <?php echo $result_list[$i][0]; ?> > slet </button>
			  	<select style='inline' name="dag" onchange="this.form.submit()">
					<option value="<?php echo $result_list[$i][3]; ?>"><?php echo $result_list[$i][3]; ?></option>
					<?php if ($result_list[$i][3] != "ingen valgt"){echo "<option value='ingen " . $result_list[$i][0] . "'>ingen</option>";} ?>
				  <?php if ($result_list[$i][3] != "mandag"){echo "<option value='Mandag " . $result_list[$i][0] . "'>Mandag</option>";} ?>
				  <?php if ($result_list[$i][3] != "tirsdag"){echo "<option value='Tirsdag " . $result_list[$i][0] . "'>tirsdag</option>";} ?>
				  <?php if ($result_list[$i][3] != "onsdag"){echo "<option value='Onsdag " . $result_list[$i][0] . "'>onsdag</option>";} ?>
				  <?php if ($result_list[$i][3] != "torsdag"){echo "<option value='Torsdag " . $result_list[$i][0] . "'>torsdag</option>";} ?>
				  <?php if ($result_list[$i][3] != "fredag"){echo "<option value='Fredag " . $result_list[$i][0] . "'>fredag</option>";} ?>
				  <?php if ($result_list[$i][3] != "lørdag"){echo "<option value='Lørdag " . $result_list[$i][0] . "'>lørdag</option>";} ?>
				  <?php if ($result_list[$i][3] != "søndag"){echo "<option value='Søndag " . $result_list[$i][0] . "'>søndag</option>";} ?>
				</select>
				</form>
				</div>			
<?php 					
			echo "</div>";			
	}

?>