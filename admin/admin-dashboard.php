<?php
function exportToCSV($sql){
    // output headers so that the file is downloaded rather than displayed
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('issue_id', 'title'));

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'hackathon');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    // $sql = "SELECT issue_id,title FROM issue";
    $result= mysqli_query($db,$sql);
    if(!$result){
        echo mysqli_error($result);
    }
    else{
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            fputcsv($output, $row);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="functions/ajax.js"></script>

        <title>Better India!</title>
        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Social Buttons CSS -->
        <link href="../vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style/styleIndex.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <form method="GET" action="admin-dashboard.php">
            <div class="form-group col-md-3 col-sm-6 col-lg-3" style="margin: 20px 0;">
                <input class="form-control" name="state" placeholder="Enter State">
            </div>
            <div class="form-group col-md-3 col-sm-6 col-lg-3" style="margin: 20px 0;">
                <input class="form-control" name="district" placeholder="Enter District">
            </div>
            <div class="form-group col-md-3 col-sm-8 col-lg-3" style="margin: 20px 0;">
                <input class="form-control" name="college" placeholder="Enter College">
            </div>
            <button type="button" class="btn btn-primary col-md-2 col-sm-3 col-lg-2 col-xs-8" style="margin: 20px 15px;">Download Report</button>
        </form>
    </body>
    <?php
        if(isset($_GET['state'])){
            $state = $_GET['state']; 
        }
        if(isset($_GET['district'])){
            $district = $GET['district'];
        }
        if(isset($_GET['college'])){
            $college = $GET['college'];
        }
    ?>


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</html>