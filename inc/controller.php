<?php
include 'model.php';
include 'mySQLconnect.php';	

// handling of requests

	// handling of submit 'completed' request
	if ($_POST[completed])
		{	
			$table = 'Taskman';
			$column = 'Nummer';
			$value = $_POST[completed];
			// delete task from table
			deleteFromWhere($table,$column,$value);
			// re-auto increment table
			autoIncrementTable($table);
		}

	// handling of submit 'slet' request
	if ($_POST[slet])
		{	
			$table = 'Taskman';
			$column = 'Nummer';
			$value = $_POST[slet];
			// delete task from table
			deleteFromWhere($table,$column,$value);
			// re-auto increment table
			autoIncrementTable($table);
		}

	// handling of submit 'dag' form
	if ($_POST[dag])
		{
			$table = 'Taskman';
			$updateColumn = 'Dag';
			$whereColumn = 'Nummer';
			
			$variabel  = $_POST[dag];
			$pieces = explode(" ", $variabel);
			$updateValue = $pieces[0]; // piece1
			$whereValue = $pieces[1]; // piece2

			updateWhere($table, $updateColumn, $updateValue, $whereColumn, $whereValue);			
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

			$table = 'Taskman';
			$updateColumn = 'Heading';
			$whereColumn = 'Nummer';
			$updateValue = $header;
			$whereValue = $nr;

			updateWhere($table, $updateColumn, $updateValue, $whereColumn, $whereValue);
		}

	// handling sletHeader
	if ($_POST[sletHeader])
		{	
			$table = 'Headings';
			$column= 'Nummer';
			$value = $_POST[sletHeader];
			// delete heading
			deleteFromWhere($table, $column, $value);		
			// re-auto increment table
			autoIncrementTable($table);		
		}

	// handling slet alt
	if ($_POST[sletalt]) 
	{
		$table = 'Taskman';
		deleteAll($table);
		// re-auto increment table
		autoIncrementTable($table);	
	}

	// add task handling
	if ($_POST[submit]) {
		$opgave = $_POST[opgave];
		$underopgave = $_POST[underopgave];
		$dagGlobal = $_POST[dag];
		
		$table = 'Taskman';
		$columnString = '`Nummer`, `Opgave`, `Underopgave`, `Dag`, `Heading`';
		$valueString = "NULL, '" . $opgave . "', '" .$underopgave . "', '" .$dagGlobal . "', 'ingen'";
		insertInto($table, $columnString, $valueString);
	}

	// edit task handling
	if ($_POST[submitEdit]) {		
		$table = 'Taskman';
		$updateColumn1 = 'Opgave';
		$updateValue1 = $_POST[opgaveEdit];
		$updateColumn2 = 'Underopgave';
		$updateValue2 = $_POST[underopgaveEdit];
		$whereColumn = 'Nummer';
		$whereValue = $_POST[taskNummer];
		echo update2Where($table, $updateColumn1, $updateValue1, $updateColumn2, $updateValue2, $whereColumn, $whereValue);
	}
	
	// handling of submit heading
	if ($_POST[submitHeading]) {
		$table = 'Headings';
		$columnString = '`Nummer`,`Heading`';
		$valueString = "NULL, '" . $_POST[heading] ."'";
		insertInto($table, $columnString, $valueString);
	}
	

	
// import data to view

	//retreive tasks from DB	
	$table = 'Taskman';
	$column = '*';
	$result=selectFrom($column, $table);
	$count= mysqli_num_rows($result); 
	$result_list = array();
	while($row = mysqli_fetch_array($result)) {
		$result_list[] = $row;
	}	

	//retreive headings from DB
	$table = 'Headings';
	$column = '*';
	$resultHeadings=selectFrom($column, $table);
	$countHeadings= mysqli_num_rows($resultHeadings); 
	$result_listHeadings = array();
	while($row = mysqli_fetch_array($resultHeadings)) {
		$result_listHeadings[] = $row;
	}
	
// declare week array
$uge = array("Mandag", "Tirsdag", "Onsdag", "Torsdag", "Fredag", "Lørdag", "Søndag");

mysqli_close($con);
	
?>