$lines = file('example.txt');
		$positionField = $_POST['position'];
		$positions = [];
		
		// Extract the position number from text file.
		foreach($lines as $line) {
			// printf("%02d\n",$line);
			$positions[] = substr($line, 0, 2);
		}
		
		foreach($positions as $position){
					echo "$position <br>";
		}
		
		function Check4DupPositions() {
			foreach($positions as $position) {
				if($position == $positionField){
					echo "There's a duplicate position of that number!!";
				}
				else {
					echo "Oh, you're good to go...";
				}
			}
		}
		
		if(isset($_POST['submit'])) {
			Check4DupPositions();
		}
