<!Doctype html>
<html>
<head>
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="thread-comment.css">
</head>
<body >
<div id="body" >
<div style="border:10px ;margin:15px"class="form-group">
	<label>Add your comment </label>
		<textarea class="form-control" rows="3" ></textarea>
		<button style="margin:5px" type="submit" class="btn btn-default">Add</button>
</div>

<br>

<?php
require "functions/dataBaseConn.php";
$instid=$_GET['instid'];
$issueid=$_GET['issueid'];
$sqlcomment="SELECT * from institute where inst_id=$instid";
$resultcomment=$conn->query($sqlcomment);
$row=$result->fetch_assoc();
?>
<div style="margin:10px" class="row" >
	<div class="col-lg-14">
		<div class="panel panel-default" >
			<div class="panel-heading panel-title"  >
				Default Panel
			</div>
			<div class="panel-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
			</div>
			
		</div>
		</div>
	</div>
</div>
</body>
</html>