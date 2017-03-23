function generateUrl(state,district,locality,pin,issueTitle)
{
	var url = "getQuery.php?issue="+issueTitle+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin+"&callFunction=get_query";
	loadDoc(url);
}

function loadDoc(url)               //tab doesn't work after removing this
{   
    if (window.XMLHttpRequest)
    {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    }
    else
    {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("field").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}