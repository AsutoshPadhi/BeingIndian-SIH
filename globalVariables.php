<?php
	#GLOBAL VARIABLES PAGE
	define('BOGUS_THRESHOLD',5); //Number of colleges required to mark the issue as bogus
	define('UPVOTE_THRESHOLD',5); //Number of upvotes required to mark issue as upvoted issue
	define('DUPLICATE_THRESHOLD',5); //Number of colleges required to mark the issue as duplicate
	define('LIKE_THRESHOLD',2); //Number of user required to mark the solution as approved
	define('MAX_CHARACTER_TITLE',100); //Maximum character limit to title while adding an issue
	define('MAX_CHARACTER_DESCRIPTION',1500); //Maximum character limit to description while adding an issue
	define('MIN_STRING_MATCH_PERCENTAGE',0.3); //Cosine similarity matching percentage
?>