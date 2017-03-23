<!Doctype html>
<html>
<head>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="inst_dashboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="..jquery-3.2.0.min.js"></script>
	<script src="ajax.js">

	</script>-->
	<script>
	function loadSearch(url){
		if (window.XMLHttpRequest)
		{
			// code for modern browsers
			xhttp = new XMLHttpRequest();
		}
		else
		{
			// code for IE6, IE5
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
			{
				document.getElementById("problem").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", url, true);
		xhttp.send();
		return true;
	}
	</script>
</head>
<body>



<?php require('problems.php'); ?>
<div class="container">
	<ul class="pagination">
	<li><a href="">&laquo;</a></li>
	<?php
 
 
 
	for($page=1;$page<=$no_of_pages;$page++)
	{
		$url = 'problems.php?page='.$page;
	?>
	<li><a onclick="javascript:loadSearch('problems.php?page=2')"><?php echo $page; ?></a></li>
	<?php

	}


	?>
	<li><a href="">&raquo;</a></li>
	</ul></div>

</body>
</html>
