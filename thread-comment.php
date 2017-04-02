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
<script src="../functions/ajax.js"></script>

<body >
<?php
require "functions/dataBaseConn.php";
//$instid=$_GET['instid'];
//$issueid=$_GET['issueid'];
$instid=4;
$issueid=3;

?>
<div id="body" >
<div style="border:10px ;margin:15px"class="form-group">

	<label>Add your comment </label>
		<textarea class="form-control" id="comment" name="comment" rows="3" ></textarea>
		<button style="margin:5px" type="submit" class="btn btn-default"  onclick="addComment(getElementById('comment').value,<?php echo $instid.",".$issueid; ?>)">Add</button>
		<?php
		
		
		?>
</div>

<br>
<?php
require "threadpanel.php";
?>

</div>
</body>
</html>