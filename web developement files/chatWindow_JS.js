function exit() {
window.close();
}

function display(name, userLogged) {

var message_bar = document.getElementById("message");
var msg;

if(message_bar.value) {

	var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	var d = new Date();
	
	var temp = "<br>" + "(" + days[d.getDay()] + " " + (d.getHours()) + ":" + (d.getMinutes()) + ") " + name + ": " + message_bar.value;
	
	document.getElementById("chat_box").innerHTML += temp;
	
	msg = temp;
	
	message_bar.value = "";
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
    xmlhttp.open("GET", "insertChatLog.php?q=" + msg + "&r=" + name + "&s=" + userLogged, true);
    xmlhttp.send();
}
else 
	alert("Message empty!");
			
}

