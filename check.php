<?php
  $lines = file('mgrdb.txt');
  	
  foreach($lines as $line) {
  	$positions[] = substr($line, 0, 2);
  }
  
  $arr_length = count($positions); // Reducing the overhead performance here in the for loop.
  
  $q = $_REQUEST["q"];
  
  for($i = 0; $i < $arr_length; $i++){
  	
  	if($positions[$i] == "02"){
  		echo "There's a duplicate position of that number!!";
  	}
  	else {
  		return;
  	}
  }

?>
