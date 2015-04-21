<?php
function stmt_get_assoc (&$stmt) {

	$stmt->store_result();
	$meta = $stmt->result_metadata();
	$out = array();
	$names = array();

	while ($column = $meta->fetch_field()) {
   		$bindVarsArray[] = &$results[$column->name];
		$names[] = $column->name;
	}        
	call_user_func_array(array($stmt, 'bind_result'), $bindVarsArray);

	// loop through all result rows
	while ($stmt->fetch()) {

    	for( $i = 0; $i < sizeof($names); $i++ )
    	{
        	$row_tmb[ $names[$i] ] = $bindVarsArray[$i];
    	} 
    	$out[] = $row_tmb;
	}

	return $out;
}
?>