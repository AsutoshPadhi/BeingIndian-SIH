function loadDoc() 
{

    var elem = document.getElementById("changeButton");
    if(elem.innerHTML == "Next")
    {
        elem.innerHTML = "Proceed to Add";
    }
    else
    {
        elem.innerHTML = "Next";
    }
    
    var xhttp;
    var query = document.getElementById("issueSearch").value;
    var state = document.getElementById("state").value;
    var district = document.getElementById("district").value;
    
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
            document.getElementById("add").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "getQuery.php?query="+query+"&state="+state+"&district="+district+"&callFunction=get_query", true);
    xhttp.send();

    var btn = document.getElementById("changeButton");
    if(elem.innerHTML == "Proceed to Add")
    {
        $("#changeButton").click(function()
        {
            xhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("side-window").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "add_single_issue.php", true);
            xhttp.send();
        });
    }
    else
    {
        elem.innerHTML = "Next";
    }
}