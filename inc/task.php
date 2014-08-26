<div class = 'task'>
	
	<div class= 'taskContent'>
		<h3> <?php echo $result_list[$i][1];?></h3>
		<p><?php echo $result_list[$i][2];?> </p>	
	</div>
	
	<div class='edit'>
		<form id="updateTask" name="updateTask" method="post" action="">
				<label> 
					<input type="text" name="opgaveEdit" id="opgave" value="<?php echo $result_list[$i][1]; ?>"/>
				</label>
				<br/>
				<label> 
					<input type="textfield" name="underopgaveEdit" id="opgave" value="<?php echo $result_list[$i][2]; ?>"/>
				</label>
				<input type="hidden" name="taskNummer" id="taskNummer" value="<?php echo $result_list[$i][0];?>"/>
				<p>
					<label>
						<input type="submit" name="submitEdit" id="submitEdit" value="Submit"/>
					</label>
				</p>
		</form>	
	</div>

	<div class="options">
		
		<form method='post' action='' name='form2'>
			
			<button  id='button1' style='inline' type='submit' name='completed' value= <?php echo $result_list[$i][0]; ?> > done </button>
			
			<button style='inline' type='submit' name='slet' value= <?php echo $result_list[$i][0]; ?> > delete </button>
		  	
			<select style='inline' name="dag" onchange="this.form.submit()">
				<option value="<?php echo $result_list[$i][3]; ?>"><?php echo $result_list[$i][3]; ?></option>
				<?php if ($result_list[$i][3] != "None"){echo "<option value='None " . $result_list[$i][0] . "'>None</option>";} ?>
			  	<?php if ($result_list[$i][3] != "Monday"){echo "<option value='Monday " . $result_list[$i][0] . "'>Monday</option>";} ?>
			  	<?php if ($result_list[$i][3] != "Tuesday"){echo "<option value='Tuesday " . $result_list[$i][0] . "'>Tuesday</option>";} ?>
			  	<?php if ($result_list[$i][3] != "Wedensday"){echo "<option value='Wedensday " . $result_list[$i][0] . "'>Wedensday</option>";} ?>
			  	<?php if ($result_list[$i][3] != "Thursday"){echo "<option value='Thursday " . $result_list[$i][0] . "'>Thursday</option>";} ?>
			  	<?php if ($result_list[$i][3] != "Friday"){echo "<option value='Friday " . $result_list[$i][0] . "'>Friday</option>";} ?>
			  	<?php if ($result_list[$i][3] != "Saturday"){echo "<option value='Saturday " . $result_list[$i][0] . "'>Saturday</option>";} ?>
			  	<?php if ($result_list[$i][3] != "Sunday"){echo "<option value='Sunday " . $result_list[$i][0] . "'>Sunday</option>";} ?>
			</select>
		
		  	<select style='inline' name="headerSelect" onchange="this.form.submit()">
				<option value="<?php echo $result_list[$i][4] . " " . $result_list[$i][0] ; ?>"><?php echo $result_list[$i][4]; ?></option>	
					
				<?php if ($result_list[$i][4] != "None"){ 
						echo "<option value= " . "'None " . $result_list[$i][0] . "'> None </option>"; 
				 }
					
				foreach ($result_listHeadings as $headings){
					if ($result_list[$i][4] != $headings[1]){	
					 	echo "<option value= '". $headings[1] . " " . $result_list[$i][0] . "'>" . $headings[1] . "</option>";
					} 		
				}?>
			</select>
			
		</form>
		
	</div>	
	
</div>	
			
