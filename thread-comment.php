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
<script>
function addComment(instid)
{
	var comment=document.getElementById("#comment").value;
	 var connection = new ActiveXObject("ADODB.Connection");
            var connectionstring = "";
            connection.Open(connectionstring);

            /* JavaScript obect to access a SQL query's results */
            var rs = new ActiveXObject("ADODB.Recordset");

            /* TODO: Get the last UID */
            var sql = "INSERT INTO comments(Ime, Prezime) VALUES (ime,prezime)";
            
            rs.Open(sql, connection);

            /* Closing the connections */
            //rs.close;
            connection.close;
	
	

}
$("#commentSection").append('<div id="created_div"></div>');
</script>

<body >
<?php
//$instid=$_GET['instid'];
//$issueid=$_GET['issueid'];
$instid=4;
$issueid=3;
?>
<div id="body" >
<div style="border:10px ;margin:15px"class="form-group">
	<label>Add your comment </label>
		<textarea class="form-control" rows="3" ></textarea>
		<button style="margin:5px" type="submit" class="btn btn-default" id="comment" onclick="javascript:addComment(<?php  echo $instid; ?>)">Add</button>
</div>
<!--Add comment funciton -->
<?php
/*function addComment ($inst)
{
	$sqladd="INSERT INTO replytocomment (comment_id,comment_desc,inst_id) VALUES ()"; 
	
}
*/
?>
<br>

<?php
require "functions/dataBaseConn.php";

$sqlcomment="SELECT * from institute where inst_id=$instid";
$resultcomment=$conn->query($sqlcomment);
$row=$resultcomment->fetch_assoc();
$sqlinst="SELECT * from comments where inst_id=$instid AND issue_id=$issueid";
$resultinst=$conn->query($sqlinst);
$rowinst=$resultinst->fetch_assoc();
?>
<div id="commentSection">
<div style="margin:10px" class="row" >
	<div class="col-lg-14">
		<div class="panel panel-default" >
			<div class="panel-heading panel-title"  >
				<?php 
					echo $row['inst_name'];
				
				?>
			</div>
			<div class="panel-body">
				<p><?php echo $rowinst['comment_desc']; ?></p>
				<br>
				<?php
				$comment=$rowinst['comment_id'];
				$sql="select * from replytocomment where comment_id=$comment";
				$result1=$conn->query($sql);
				//$row1=$result1->fetch_assoc();
				
				if($result1->num_rows>0)
				{
					while($row=$result1->fetch_assoc())
					{?>
						<div style="margin:10px" class="row" >
						<div class="col-lg-14">
							<div class="panel panel-default" >
								<div class="panel-heading panel-title"  >
								<?php
								$id=$row['inst_id'];
								$sql1="SELECT * from institute where inst_id=$id";
								$result2=$conn->query($sql1);
								$arr=$result2->fetch_assoc();

								echo $arr['inst_name'];
								?>
								</div>
								<div class="panel-body">
								<?php
								echo $row['comment_desc'];
								?>
								</div> 
			
							</div>
						</div>
						</div>
							
	<?php
					}
				}
				
				?>
				
			</div>
			
		</div>
		</div>
	</div>
</div>
</div>
</body>
</html>