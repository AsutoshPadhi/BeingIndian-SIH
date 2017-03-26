<?php
include("..functions/dataBaseConn.php");
include('..functions/issueFeatures.php');
echo "The issues reported bogus  are:";
$sql="select issue.title,issue.id,institute.inst_name  from issue inner join institute inner join issuebogusupvote on issue.issue_id=issuebogusupvote.issue_id and institute.inst_id=issuebogusupvote.inst_id where bogus_count>bogus_threshold";
ReportedBogus($sql);

?>

<?php
include("..functions/dataBaseConn.php");
include('..functions/issueFeatures.php');
echo "The issues marked duplicate  are:";
sql="select issue.title,issueduplicateupvote.issue_id,issueduplicateupvote.inst_id,issueduplicateupvote.similar_to_issue,user.user_email from issueduplicateupvote inner join issue inner join user on issue.issue_id=issueduplicateupvote.issue_id and user.user_id=issue.user_id where issue.duplicate_count>0;
";
ReportedDuplicateByMe($sql);
?>

<?php
nclude("..functions/dataBaseConn.php");
include('..functions/issueFeatures.php');
echo "The issues with solutions are  are:";
$sql="select solution.solution_url,institute.inst_name,issue.title from solution inner join institute INNER JOIN issue on institute.inst_id=solution.inst_id and issue.issue_id=solution.issue_id WHERE issue.solution_count>0; 
";
SolvedByMe($sql);
?>