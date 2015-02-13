//////////////////////////////////////////////////////////////////////////////
var slogans = new Array();

//////////////////////////////////////////////////////////////////////////////
function loadSlogans() {
	// Создание нового объекта XMLHttpRequest для общения с Web-сервером
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.open("GET","slogans.txt",true);
	
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && (xmlhttp.status == 200 || xmlhttp.status == 0)) {
			slogans = xmlhttp.responseText.split("\n");
			switchSlogans();
		}
	}
	
	xmlhttp.send(null);
}
window.onload = loadSlogans;

//////////////////////////////////////////////////////////////////////////////
function switchSlogans() {
	//
	var sloganField = document.getElementById("sloganField");
	if (sloganField == null || slogans == null) return;
	var rand_index = randomInt(0, slogans.length);
	sloganField.innerHTML = slogans[rand_index];
	//
	setTimeout("switchSlogans()",10000);
}

//////////////////////////////////////////////////////////////////////////////
function randomInt(min, max) {
	return Math.floor(Math.random() * (max - min)) + min;
}