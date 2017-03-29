<!DOCTYPE html>
<html>
<?php
    session_start();
    require('../functions/func_in.php');
    if(isset($_GET['inst']) && $_GET['issue']){
        $inst_id = $_GET['inst'];
        $issue_id = $_GET['issue'];
        if(reportBogus($inst_id,$issue_id)){
            echo "You've successfully reported this issue as Bogus";
        }
        else{
            echo "Some error occured";
        }
    }
?>
</html>