//This function makes an ajax call
function generateUrl(state,district,locality,pin,issueTitle,area,type)
{
    //alert("ys");
    var url = "getQuery.php?issue="+issueTitle+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin+"&type="+type+"&callFunction=get_query";
    //alert(url);
    if(issueTitle.length==0)
    {
        loadDoc(url,area);
    }
    else if(issueTitle.length < 50)  //hardcoded
    {
        alert("Issue Title is expected to be of minimum 50 characters");
    }
    else
    {
        loadDoc(url,area);
    }
}

function generateUrlAdd(state,district,locality,pin,issueTitle,description)
{
    var url = "insertIssue.php?issueTitle="+issueTitle+"&state="+state+"&district="+district+"&locality="+locality+"&pin="+pin+"&description="+description+"&callFunction=get_query";
    loadDoc(url,"field");
}

function getDistrict(state,field)
{
    var url = "district_list.php?state="+state+"&callFunction=get_query";
    loadDoc(url,field);
}
//Hides searchBar when any tab other than dashboard is clicked
function hideSearchBar()
{
    alert("yes");
    $('#searchBar').hide();
}