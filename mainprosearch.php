<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html;charset=utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="text/javascript"></script>
	<script src="js/bootstrap.js"></script>
	<link href="style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style> 

</style>
</head>
<body>
		<div class="container">
	<form action="fetch.php" method="post">	
	<div class="container-fluid" style="background-color:#F44336;color:#fff;height:200px;">
		<h2 align="center">ASK QUESTIONS <span style="color:blue">FOR BETTER TOMMOROW</span></h2>
		
		<div class="form-group">
		<div class="input-group">
		<input type="text" name="searchtext" id="searchtext" placeholder="search problem">
		</div>
		</div>
		</div>
		<br />
</form>
<div class="container-fluid" style="height:1000px">
		<div id="result"></div>
		</div>
</div>

<script>
$(document).ready(function(){
	$('#searchtext').keyup(function(){
		var txt=$(this).val();
		if(txt!='')
		{
			//$('#result').html('');
			$.ajax({
					url:"fetch.php";
					method:"POST";
					data:{searchtext:txt},
					dataType:"text",
					success:function(data)
					{
						$('#result').html(data);
					}
			});
		
		}
		else
		{
			$('#result').html('');
			
		}
	});
});
function f1()
{
	$(document).ready(function(){
}
</script>
		</body>
</html>