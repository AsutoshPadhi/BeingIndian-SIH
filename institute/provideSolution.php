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
        if(provideSolution($inst_id,$issue_id,$_GET['url'])){
            echo "You've successfully provided solution to this issue!";
        }
        else{
            echo "Some error occured!";
        }
    }
    else{
?>
        <label for="solutionUrl">Youtube video solution URL</label>
        <br>
        <div class="col-md-6">
        <input class="form-control" id="solutionUrl" name="solutionUrl" type="url" placeholder="Enter solution url">
        </div>
        <button type="submit" onclick="getUrl(getElementById('solutionUrl').value,<?php echo $inst_id.",".$issue_id;?>)" class="btn btn-default">Submit Solution</button></div>
<?php
//var finalUrl= provideSolution.php?url=document.getElementById('solutionUrl').value; loadDoc(finalUrl,'instButtons');
    }
?>
</html>