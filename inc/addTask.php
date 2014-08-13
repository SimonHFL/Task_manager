<div class='newTaskContainer'>
	<div class='newTask'>tilføj opgave
	</div>
	<div class='addTask'>
	<form id="form1" name="form1" method="post" action="">
			<label> skriv opgave
				<input type="text" name="opgave" id="opgave"/>
			</label>
			<br/>
			<label> skriv underopgaver
				<input type="textfield" name="underopgave" id="opgave"/>
			</label>
			<input type="hidden" name="dag" id="dag" value="<?php echo $dag ?>"/>
			<p>
				<label>
					<input type="submit" name="submit" id="submit" value="Submit"/>
				</label>
			</p>
	</form>
	</div>

</div>

