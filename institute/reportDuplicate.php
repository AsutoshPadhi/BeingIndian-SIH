<!--report duplicate option for institute-->
<!DOCTYPE html>
<html>
<?php
//duplicate issues
    session_start();
    require('../functions/func_in.php');
    //require("issue-collapse.php");
    
    if(isset($_GET['inst'])&&$_GET['issue']){
        $inst_id = $_GET['inst'];
        $issue_id = $_GET['issue'];
    }
    if(isset($_GET['url']))//one of which is being passed through get method
	{
        if(reportDuplicate($inst_id,$issue_id,$_GET['url'])){
            echo "You've reported this issue as duplicate to ".$_GET['url']."";
            updateDuplicate($inst_id,$issue_id,$_GET['url']);
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
		<?php
		 include '../functions/dataBaseConn.php';
		$sql="SELECT count(inst_id)as colleges  FROM `issueduplicateupvote` group by issue_id,similar_to_issue having issue_id=$issue_id";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc())
		{
			$var=$row['colleges'];
			echo "<i>".$var."colleges marked problem id ".$issue_id." as duplicate of </i><br>";
		}
		?>
        <input class="form-control" id="solutionUrl" name="solutionUrl" type="text" placeholder="Enter issue id of similar issue">
        </div>
        <button type="submit" onclick="getUrl2(getElementById('solutionUrl').value,<?php echo $inst_id.",".$issue_id;?>)" class="btn btn-default">Report as Duplicate</button></div>
<?php

    }
?>
</html>



