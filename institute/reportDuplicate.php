<!DOCTYPE html>
<html>
<?php
    session_start();
    require('../functions/func_in.php');
    if(isset($_GET['inst'])&&$_GET['issue']){
        $inst_id = $_GET['inst'];
        $issue_id = $_GET['issue'];
    }
    if(isset($_GET['url'])){
        if(reportDuplicate($inst_id,$issue_id,$_GET['url'])){
            echo "You've reported this issue as duplicate to ".$_GET['url']."";
        }
        else{
            echo "Some error occured!";
        }
    }
    else{
?>
        <label for="solutionUrl">Duplicate Issue ID</label>
        <br>
        <div class="col-md-6">
        <input class="form-control" id="solutionUrl" name="solutionUrl" type="text" placeholder="Enter issue id of similar issue">
        </div>
        <button type="submit" onclick="getUrl2(getElementById('solutionUrl').value,<?php echo $inst_id.",".$issue_id;?>)" class="btn btn-default">Report as Duplicate</button></div>
<?php
//var finalUrl= provideSolution.php?url=document.getElementById('solutionUrl').value; loadDoc(finalUrl,'instButtons');
    }
?>
</html>