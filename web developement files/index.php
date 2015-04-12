<!DOCTYPE html>

<html>

<head>

	<title>Chat Application</title>
	<link type="text/css" rel = "stylesheet" href="index_style.css" />

</head>

<body>

<div id="wrapper">	

<form name="message" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

User Name:<input name="user_name" id="user_name" type="text" value=""/> <br><br>
Password:<input name="password" id="password"  type="password" value=""/> <br><br>
<input type="submit" value="Sign In" id="sign_in"> 
</form>

</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

$url = "friendList.php?userName=" . $user_name;
}
?>
<p hidden id = "url"><?php echo $url ?></p>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$myfile = fopen("login_details.txt", "r") or die("Unable to open file!");
	$jsonStr = file_get_contents("login_details.txt", true);
	$someArray = json_decode($jsonStr, true);
	
	$flag = false;
	foreach ($someArray as $key => $value) {
		
		if ( $value["userName"] == $user_name &&  $value["password"] == $password) {
			
			$flag = true;
			$myfile1 = fopen("test.txt", "r") or die("Unable to open file!");
			$jsonStr1 = file_get_contents("test.txt", true);
			$someArray1 = json_decode($jsonStr1, true);
			
			$loggedIn = false;
			foreach ($someArray1 as $x => $x_value) {
		
				if ( $x_value['name'] == $user_name && $x_value['login'] == "no") {		
					
					/* $someArray1[$x]['login'] =  "yes"; */
					$url = "friendList.php?userName= " . $user_name;
					echo '<script type="text/javascript">window.open(document.getElementById("url").innerHTML)</script>'; 
					$loggedIn = true;
					
					break;
				}
				if ( $x_value['name'] == $user_name && $x_value['login'] == "yes") {		
							
					echo '<script type="text/javascript">alert("user already logged in");</script>'; break;
				}	
			}
			fclose($myfile1);
			
			if($loggedIn) {
			$someJSON = json_encode($someArray1);
			$myfile1 = fopen("test.txt", "w") or die("Unable to open file!");

			fwrite($myfile1, $someJSON);
			fclose($myfile1); }
		}				
	} 
	
	if(!$flag) echo '<script>alert("Wrong user name or password")</script>';
  
	fclose($myfile);	
}
?>

</body>

</html>