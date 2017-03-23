<?php
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

$sql = "SELECT issue_id,title FROM issue";
$result= mysqli_query($db,$sql);
if(!$result){
    echo mysqli_error($result);
}
else{
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        fputcsv($output, $row);
    }
}
?>