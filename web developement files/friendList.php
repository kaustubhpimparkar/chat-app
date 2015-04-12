<!DOCTYPE html>

<html>


<head>

<?php 
$greetings = "Hello, " . $_GET["userName"];
$userName = $_GET["userName"];
?>

	<title><?php echo "Welcome " . $userName. " !!!" ?></title>
	<link type="text/css" rel = "stylesheet" href="friendList_style.css" />

</head>

<body>

<p id = "txtHint"></p>
<p id="user_name"><?php echo $userName; ?></p>

<div id="wrapper" action="<?php $_PHP_SELF ?>" method="GET" > 

<div id="menu">
<p id="greet"><?php echo $greetings; ?></p>
</div>

<ul id="friend_list"></ul>

</div> 

<script>

var userLogged = document.getElementById("user_name").innerHTML;

/*function changeLoginStatus() {
	
	var person = document.getElementById("user_name").innerHTML;
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
    xmlhttp.open("GET", "loginChange.php?q=" + person, true);
    xmlhttp.send();
	
}*/

if(userLogged == "John") {

var arrJohn = ["Mathew","Kaustubh","Andrew"];
var i;
for (i = 0; i < arrJohn.length; i++) {
    
	document.getElementById("friend_list").innerHTML += '<a href= "chatWindow.php?name=' + arrJohn[i] + '&userLogged=' + userLogged + '" target="_blank" style="text-decoration:none;"><li>' + arrJohn[i] + '</li></a><br>' ;
}

}
else if(userLogged == "Mathew")
{
var arrMathew = ["John","Kaustubh","Andrew"];
var i;
for (i = 0; i < arrMathew.length; i++) {
    
	document.getElementById("friend_list").innerHTML += '<a href= "chatWindow.php?name=' + arrMathew[i] + '&userLogged=' + userLogged + '" target="_blank" style="text-decoration:none;"><li>' + arrMathew[i] + '</li></a><br>' ;
}
}
else if(userLogged == "Andrew")
{
var arrAndrew = ["Mathew","Kaustubh","John"];
var i;
for (i = 0; i < arrAndrew.length; i++) {
    
	document.getElementById("friend_list").innerHTML += '<a href= "chatWindow.php?name=' + arrAndrew[i] + '&userLogged=' + userLogged + '" target="_blank" style="text-decoration:none;"><li>' + arrAndrew[i] + '</li></a><br>' ;
}
}
else
{
var arrKaustubh = ["Mathew","John","Andrew"];
var i;
for (i = 0; i < arrKaustubh.length; i++) {
    
	document.getElementById("friend_list").innerHTML += '<a href= "chatWindow.php?name=' + arrKaustubh[i] + '&userLogged=' + userLogged + '" target="_blank" style="text-decoration:none;"><li>' + arrKaustubh[i] + '</li></a><br>' ;
}
}

</script>

	
</body>

</html>
