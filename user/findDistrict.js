getDistrict(state)
{
	alert("yes");
	//var state = document.getElementById('state').value;
    alert(state);
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
            document.getElementById("district").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "district_list.php?state = "+state, true);
    xhttp.send();
}