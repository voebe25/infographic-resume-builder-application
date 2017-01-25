// JavaScript Document
document.getElementById("custom_id").onclick = function() {
  if(document.getElementById("custom_id").checked)
   {
	document.getElementById("customize").style.display = "block";
	document.getElementById("wrap").style.display = "none";
	document.getElementById("button").style.display = "none";
	}
	else
	{
		document.getElementById("customize").style.display = "none";
		document.getElementById("wrap").style.display = "block";
		document.getElementById("button").style.display = "block";
		}
 }

