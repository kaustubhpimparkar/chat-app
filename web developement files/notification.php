<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$userLogged = $_GET['q'];
$name = $_GET['r'];

$time = date('r');

$myfile = fopen("chat_log.txt", "r") or die("Unable to open file!");
$jsonStr = file_get_contents("chat_log.txt", true);
$someArray = json_decode($jsonStr, true);

$chat_log;	
foreach ($someArray as $x => $x_value) {
		
	if ( ($x_value["person1"] == $userLogged && $x_value["person2"] == $name) || (($x_value["person1"] == $name && $x_value["person2"] == $userLogged))  ) {	
			
		$chat_log = $x_value["chat"]; break;
	}
}

fclose($myfile);

echo "data:{$chat_log} \n\n";
	
flush();
	?>