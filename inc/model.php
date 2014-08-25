<?php
	
function deleteFromWhere($table, $column, $value){
	global $con;
	$sql = "DELETE FROM $table WHERE $column=$value";
	mysqli_query($con,$sql);
}	

function deleteAll($table){
	global $con;
	$sql = "DELETE FROM $table";
	mysqli_query($con,$sql);
}
	
function autoIncrementTable($table){
	global $con;
	$sql = "ALTER TABLE $table AUTO_INCREMENT = 1";
	mysqli_query($con,$sql);
}
	
function updateWhere($table, $updateColumn, $updateValue, $whereColumn, $whereValue){
	global $con;
	$sql = "UPDATE $table SET $updateColumn='$updateValue'
			WHERE $whereColumn='$whereValue'";
	mysqli_query($con,$sql);
}

function update2Where($table, $updateColumn1, $updateValue1, $updateColumn2, $updateValue2, $whereColumn, $whereValue){
	global $con;
	
	$sql = "UPDATE $table SET $updateColumn1='$updateValue1', $updateColumn2='$updateValue2' 
			WHERE $whereColumn='$whereValue'";
	
	$call = mysqli_query($con,$sql);
	
	// echo if errors
	if (!$call){
		return $con->error;
	}
	
}
	
function insertInto($table, $columnString, $valueString){
	global $con;
	$sql = "INSERT INTO $table ($columnString) VALUES ($valueString)";
	$call = mysqli_query($con,$sql);

	// echo if errors
	if (!$call){
		return $con->error;
	}
}	

function selectFrom($column, $table){
	global $con;
	$sql = "SELECT $column FROM $table";
	$call = mysqli_query($con,$sql);
	// echo if errors
	if (!$call){
		return $con->error;
	}
	// return data
	return $call;
}		
	
	
	
?>