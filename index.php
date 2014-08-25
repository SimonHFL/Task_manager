<?php
include 'inc/controller.php';
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