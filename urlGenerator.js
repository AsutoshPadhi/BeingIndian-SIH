function generateUrl()
{
		alert("abc");
		var query = document.getElementById("issue").value;	//Change the ids
    var state = document.getElementById("state").value;
    var district = document.getElementById("district").value;
    var locality = document.getElementById("locality").value;
    var pin = document.getElementById("pin").value;

    var url = "ajax.js?query="+query+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin;
		//Git is connected
    loadDoc(url);
}
