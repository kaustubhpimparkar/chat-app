<!DOCTYPE html>

<html>

<head>

<?php
$name = $_GET["name"];
$userLogged = $_GET["userLogged"];
?>

	<title><?php echo $userLogged . " -> ". $name ?></title>
	<link type="text/css" rel = "stylesheet" href="chatWindow_style.css" />

</head>

<body>



<p hidden id="from"><?php echo $userLogged ?></p>
<p hidden id="to"><?php echo $name ?></p>

<p><span id="txtHint"></span></p>

<div id="wrapper"> 

<p id="welcome"></p><b></b>
<a href="" onclick="exit()"><p id="exit_chat">Exit Chat</p></a>

<div id="chat_box">
</div>

<br>

<form>
<input id="message" type="text" value="type message">
<button type="button" onclick='var from = document.getElementById("to").innerHTML; var to = document.getElementById("from").innerHTML; display(to, from)'>Send</button>
</form>

</div>

<script>

var from = document.getElementById("from").innerHTML;
var to = document.getElementById("to").innerHTML;

var param = "q=" + from + "&r=" + to;

if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("notification.php?"+param);
    source.onmessage = function(event) {
        document.getElementById("chat_box").innerHTML = event.data;
    };
} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>


<script src="chatWindow_JS.js"></script>

</body>

</html>