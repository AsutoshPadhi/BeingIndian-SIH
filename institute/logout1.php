<?php
//echo "Logged out successfully";
header("location:dashboard.php");
session_destroy();
setcookie(PhPSESSID,session_id(),time()-1);
?>