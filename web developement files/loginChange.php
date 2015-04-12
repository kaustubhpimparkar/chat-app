<?php	
	
	$userName = $_GET["q"];
	
	$myfile1 = fopen("test.txt", "r") or die("Unable to open file!");
	$jsonStr1 = file_get_contents("test.txt", true);
	$someArray1 = json_decode($jsonStr1, true);

	foreach ($someArray1 as $x => $x_value) {
		
		if ( $x_value['name'] == $userName ) {		
					
			$someArray1[$x]['login'] =  "no";
			break;
		}
	}
	
	fclose($myfile1); 
	
	$someJSON = json_encode($someArray1);
	$myfile2 = fopen("test.txt", "w") or die("Unable to open file!");

	fwrite($myfile2, $someJSON);
	fclose($myfile2);
	
?>	