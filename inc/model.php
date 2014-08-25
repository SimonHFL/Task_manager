<?php

/**
* delete from table where column is as specified
* @param    string		$table		name of tabel
* @param    string 		$column		name of colum
* @param    string 		$value		value of column
*/
	function deleteFromWhere($table, $column, $value){
		global $con;
		$sql = "DELETE FROM $table WHERE $column=$value";
		mysqli_query($con,$sql);
	}	

/**
* delete all from table
* @param    string		$table		name of tabel
*/
	function deleteAll($table){
		global $con;
		$sql = "DELETE FROM $table";
		mysqli_query($con,$sql);
	}

/**
* auto increment table
* @param    string		$table		name of tabel
*/
	function autoIncrementTable($table){
		global $con;
		$sql = "ALTER TABLE $table AUTO_INCREMENT = 1";
		mysqli_query($con,$sql);
	}
	
/**
* update single column in table where row meets where clause
* @param    string		$table			name of tabel
* @param    string 		$updateColumn	name of colum to update
* @param    string 		$updateValue	value to be inserted
* @param    string 		$whereColumn	name of column in where clause
* @param    string 		$whereValue		value of column	in where caluse	
*/	
	function updateWhere($table, $updateColumn, $updateValue, $whereColumn, $whereValue){
		global $con;
		$sql = "UPDATE $table SET $updateColumn='$updateValue'
				WHERE $whereColumn='$whereValue'";
		mysqli_query($con,$sql);
	}

/**
* update 2 columns in table where row meets where clause
* @param    string		$table			name of tabel
* @param    string 		$updateColumn1	name of colum to update
* @param    string 		$updateValue1	value to be inserted
* @param    string 		$updateColumn2	name of colum to update
* @param    string 		$updateValue2	value to be inserted
* @param    string 		$whereColumn	name of column in where clause
* @param    string 		$whereValue		value of column	in where caluse	
*/	
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

/**
* delete from table where column is as specified
* @param    string		$table			name of tabel
* @param    string 		$columnString	string of column(s) to be updated
* @param    string 		$valueString	string of value(s) to be inserted
*/		
	function insertInto($table, $columnString, $valueString){
		global $con;
		$sql = "INSERT INTO $table ($columnString) VALUES ($valueString)";
		$call = mysqli_query($con,$sql);

		// echo if errors
		if (!$call){
			return $con->error;
		}
	}	

/**
* import specified columns or all columns from table
* @param    string		$column		name(s) of columns to import. Or * for all
* @param    string 		$table		name of table
* @return   object					imported data
*/
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