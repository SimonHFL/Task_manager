<div class='newTaskContainer'>
	<div class='newTask'>add task
	</div>
	<div class='addTask'>
	<form id="form1" name="form1" method="post" action="">
			<label> task
				<input type="text" name="opgave" id="opgave"/>
			</label>
			<br/>
			<label> sub-task
				<input type="textfield" name="underopgave" id="opgave"/>
			</label>
			<input type="hidden" name="dag" id="dag" value="<?php if (isset($dag)) {echo $dag;} else {echo 'None';} ?>"/>
			<p>
				<label>
					<input type="submit" name="submit" id="submit" value="Submit"/>
				</label>
			</p>
	</form>
	</div>

</div>

