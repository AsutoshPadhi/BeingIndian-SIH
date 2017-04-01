<?php

 $issueid=$_GET['issueid'];
 $title=$_GET['titleid'];
 if(isset($_GET['titleid']))
 {
	 echo $title;
 }
 else if()
 {
	 echo "not";
 }
 include '../functions/dataBaseConn.php';
 require 'share_url.php';
 $url="issue-collapse.php?issueid=$issueid&title=$title";
generateUrl($url);


?>