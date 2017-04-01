<?php

 $issueid=$_GET['issueid'];
 $title=$_GET['titleid'];
 include '../functions/dataBaseConn.php';
 require 'share_url.php';
 $url="issue-collapse.php?issueid=$issueid&title=$title";
generateUrl($url);


?>