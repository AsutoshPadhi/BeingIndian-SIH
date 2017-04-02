//fills a html div dynamically with a php page
function loadDoc(url,field) 
{ 
	alert("fii");
    // url - url of php page
    // field - id of div to be filled dynamically
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
			
            document.getElementById(field).innerHTML = this.responseText; 
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}
// used when inst is providing solution
function getUrl(url,instid,issueid){
    var finalUrl = "provideSolution.php?url="+url+"&inst="+instid+"&issue="+issueid;
    var divid = "instButtons"+issueid; 
    loadDoc(finalUrl,divid);
}
// used when inst is reporting duplicate
function getUrl2(url,instid,issueid){
    var finalUrl = "reportDuplicate.php?url="+url+"&inst="+instid+"&issue="+issueid;
    var divid = "instButtons"+issueid; 
    loadDoc(finalUrl,divid);
}
//used when adding comment
function addComment(url,instid,issueid)
{
	var finalUrl="threadpanel.php?url="+url+"&inst="+instid+"&issue="+issueid;
	var divid="commentSection"+issueid;

	loadDoc(finalUrl,divid);
}


