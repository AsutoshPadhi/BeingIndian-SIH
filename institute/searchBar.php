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
            <input id="new2" type="text" name="issue3" class="form-control" placeholder="Keywords">
        </div>
        <!-- <input type="submit" onClick="var issue =(document.getElementById('new2').value);
                                        var sql='SELECT * FROM issue WHERE title LIKE \'%'+issue+'%\'';
                                        loadDoc('issue-display.php?sql='+sql,'field')"
                                        class="btn btn-primary col-md-3" value="Search"> -->
        <input type="submit" onClick="var issue =(document.getElementById('new2').value);
                                        loadDoc('getQuery.php?issue='+issue+'&callFunction=get_query','field')"
                                        class="btn btn-primary col-md-3" value="Search">
    </body>

</html>