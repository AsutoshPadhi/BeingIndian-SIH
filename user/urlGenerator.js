function generateUrl(state,district,locality,pin,issueTitle)
{
    var url = "getQuery.php?issue="+issueTitle+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin+"&callFunction=get_query";
    loadDoc(url);
}

function generateUrlAdd(state,district,locality,pin,issueTitle,description)
{
    var url = "insertIssue.php?issueTitle="+issueTitle+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin+"&description="+description+"&callFunction=get_query";
    loadDoc(url);
}

function getDistrict(state1)
{
    var url = "district_list.php?state="+state1+"&callFunction=get_query";
    //alert(url);
    loadDoc2(url);
}

function loadDoc(url)               //tab doesn't work after removing this
{   
    if(url == 'add-issue.php')      //to hide the searchBar when user clicks Add an issue in home page
    {
        $('#searchBar').hide();
    }
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

function loadDoc2(url)               //tab doesn't work after removing this
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
            document.getElementById("district").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}
function hideSearchBar()
{
    alert("yes");
    $('#searchBar').hide();
}