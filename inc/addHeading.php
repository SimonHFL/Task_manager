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
	
	
	<?php 
	$taskHeadings = array ();
	$heading = $_POST[heading];
	
	if ($_POST[submitHeading]) {
		$taskHeadings[] = $heading;
		mysqli_query($con,"INSERT INTO `Headings` (`Nummer`,`Heading`) VALUES (NULL,'$heading')");
		
	}
	
	?>
	