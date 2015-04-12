<?php

$chat = $_REQUEST["q"];
$name = $_REQUEST["r"];
$userLogged = $_REQUEST["s"];

$myfile = fopen("chat_log.txt", "r") or die("Unable to open file!");
$jsonStr = file_get_contents("chat_log.txt", true);
$someArray = json_decode($jsonStr, true);
fclose($myfile);

foreach ($someArray as $x => $x_value) {
		
	if ( ($x_value["person1"] == $userLogged && $x_value["person2"] == $name) || (($x_value["person1"] == $name && $x_value["person2"] == $userLogged))  ) {		
		
		$someArray[$x]['chat'] =  $someArray[$x]['chat'] . $chat;
		break;
	}
}
 
$someJSON = json_encode($someArray);
$myfile = fopen("chat_log.txt", "w") or die("Unable to open file!");

fwrite($myfile, $someJSON);
fclose($myfile);

?>