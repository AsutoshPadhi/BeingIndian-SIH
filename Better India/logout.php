

<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: issue.php"); // Redirecting To Home Page
}
?>