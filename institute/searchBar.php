<!DOCTYPE html>
<html>
    <head>
        <title>Better India!</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="form-group col-md-8">
            <input id="new2" type="text" name="issue3" class="form-control" placeholder="Search by issue Number or Issue Title">
        </div>
        <input type="submit" onClick="search()" class="btn btn-primary col-md-3" value="Search">
    </body>

    <script type="text/javascript">
        function search()
        {
            var issue =(document.getElementById('new2').value);
            //alert(issue);
            if(isNaN(issue))        //Return false if an input is a number
            {
                loadDoc('getQuery.php?issue='+issue+'&callFunction=get_query','field');
            }
            else if(issue.length == 0)
            {
                loadDoc('getQuery.php?issue='+issue+'&callFunction=get_query','field');
            }
            else
            {
                loadDoc('searchByIssueNumber.php?issueNumber='+issue,'field');
            }
        }
    </script>

</html>