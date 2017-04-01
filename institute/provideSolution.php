<!DOCTYPE html>
<html>
<?php
    session_start();
    require('../functions/func_in.php');
    require('../functions/dataBaseConn.php');
    if(isset($_GET['inst'])&&$_GET['issue']){
        $inst_id = $_GET['inst'];
        $issue_id = $_GET['issue'];
    }
    if(isset($_GET['url'])){
        if(provideSolution($inst_id,$issue_id,$_GET['url'])){
            echo "You've successfully provided solution to this issue!";
            $solution = $_GET['url'];
            $issue_id = $_GET['issue'];
            $user_idOfUsersWhoUpvoted = "SELECT * FROM issueupvote WHERE issue_id = '".$issue_id."'";
            $result = $conn->query($user_idOfUsersWhoUpvoted);
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $getUserEmail = "SELECT * FROM user WHERE user_id = '".$row['user_id']."'";
                    $res_getUserEmail = $conn->query($getUserEmail);
                    $user_details = $res_getUserEmail->fetch_assoc();
                    $user_email = $user_details['user_email'];
                    require 'notifyUsers.php';
                }
            }
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