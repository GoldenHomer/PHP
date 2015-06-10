<?php
	$lines = file('mgrdb.txt');
		
	foreach($lines as $line) {
		$positions[] = substr($line, 0, 2);
	}
	
	$q = $_REQUEST["q"];

	$alert = "";
	
	if ($q !== "") {
		if(strlen($q) == 2) {
			$alert = "<h2 style='color: #00e500;'>Position number is available.</h2>"; // TANKS KENNY
			foreach($positions as $position) {
				if($q == $position) {
					$alert = "<h2 style='color: red;'>Position number already exists.</h2>";
				}
				//else {
				//	$alert = "<h2 style='color: #00e500;'>Position number is available.</h2>";
				//}
			}
		}
	}
	echo $alert === "" ? "" : $alert;
?>
