function generateUrl(state,district,locality,pin,issueTitle,area,type)
{
    //alert("ys");
    var url = "getQuery.php?issue="+issueTitle+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin+"&type="+type+"&callFunction=get_query";
    //alert(url);
    loadDoc(url,area);
}

function generateUrlAdd(state,district,locality,pin,issueTitle,description)
{
    var url = "insertIssue.php?issueTitle="+issueTitle+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin+"&description="+description+"&callFunction=get_query";
    loadDoc(url,"field");
}

function getDistrict(state,field)
{
    alert("working");
	var url = "district_list.php?state="+state+"&callFunction=get_query";
    alert(url);
    loadDoc(url,field);
}

function hideSearchBar()
{
    alert("yes");
    $('#searchBar').hide();
}