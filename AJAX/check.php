<?php
  function console( $data ) {

		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

		echo $output;
	}
	
	console("Working check.php!");
	
  $lines = file('mgrdb.txt');
  	
  foreach($lines as $line) {
  	$positions[] = substr($line, 0, 2);
  }
  
  $q = $_REQUEST["q"];
  
  $alert = "";
  
  if ($q !== "") {
		foreach($positions as $positon) {
			if($positon == $q){
				$alert = $position;
				echo "There's a duplicate position of that number!!";
			}
			else {
				$alert .= ", $position";
				echo "The position number is available.";
			}
		}
	}

	echo $alert === "" ? "Nothing available" : $alert;

?>
