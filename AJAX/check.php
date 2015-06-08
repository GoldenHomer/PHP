<?php
	$lines = file('mgrdb.txt');
		
	foreach($lines as $line) {
		$positions[] = substr($line, 0, 2);
	}
	
	$q = $_REQUEST["q"];

	$alert = "";
	
	echo $positions[39];
	
	if ($q !== "") {
		if(strlen($q) == 2) {
			//foreach($positions as $positon) {
			$length = count($positions);
			for($i = 0; $i < $length; $i++) {
				if($positions[$i] == $q) {
					$alert = "<h2 style='color: red;'>Position number already exists.</h2>";
				}
				else {
					$alert = "<h2 style='color: #00e500;'>Position number is available.</h2>";
				}
			}
		}
	}

	echo $alert === "" ? "" : $alert;
	
	// Notes: $q is of type string, $length is being calculated correctly, each element in $positions array is a string.
	// if ($positions[2] == $q) {echo "true";} else {echo "false";} returns true when I enter 14 in the Position Number text field
	// The last position number to be added from add.php checks out as true, 
	// but add a different number and that one returns true but the previous number returns false!
?>
