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
		<button  id='button1' style='inline' type='submit' name='completed' value= <?php echo $result_list[$i][0]; ?> > gennemført </button>
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
	  	<select style='inline' name="headerSelect" onchange="this.form.submit()">
					<option value="<?php echo $result_list[$i][4] . " " . $result_list[$i][0] ; ?>"><?php echo $result_list[$i][4]; ?></option>	
					<option value="<?php echo "ingen" . " " . $result_list[$i][0] ; ?>"> ingen </option>	
			<?php foreach ($result_listHeadings as $headings){ ?>		
					<option value="<?php echo $headings[1] . " " . $result_list[$i][0] ;  ?>"><?php echo $headings[1]; ?></option>			
			<?php		}		?>
		</select>
		</form>
	</div>	
	
</div>	
			
