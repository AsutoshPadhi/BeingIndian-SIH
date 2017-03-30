<button type="button" class="btn btn btn-primary btn-lg btn-block btn-social" data-toggle="collapse" data-target="#demo<?php echo $i; ?>">
<?php echo "<font style='font-size: 1em;'>#".$row["issue_id"]."</font>".$row["title"]; ?>
</button>
<br>
<div id="demo<?php echo $i; ?>" class="collapse body">
        <a id='code' data-toggle='modal' data-target='#myModal<?php echo $row['issue_id']; ?>' data-id='<?php echo $row['issue_id']; ?>' class='view_data' >CODE</a> :  <?php echo "#".$row["issue_id"]; ?>	
    <br><hr>
    <?php
        
            echo  postedBy($row['issue_id']);
    ?>
    <br><hr>
    <?php
        $id = $row['issue_id'];
        echo "<b id='code'>STATUS :</b>";
    ?>
    <?php 
        $status = status($row['issue_id']);
        switch($status){
            case 0:
                echo "Voting is on";
                break;
            case 1:
                echo "Voting Closed & Solutions are awaited";
                break;
            case 2:
                echo "Solutions are available";
                break;
            case 3:
                echo "Solution approved";
                break;
            case 4:
                echo "Repoted Bogus";
                break;
            case 5:
                echo "Repoted Duplicate";
                break;
        }
    ?>
    <hr>
    <?php
        require('../functions/dataBaseConn.php');
        echo "<div id='instButtons'>";
        if($status == 4){
            $bogusNumber = "SELECT * FROM issuebogusupvote WHERE issue_id = $id";
            $res = $conn->query($bogusNumber);
            $rows = $res->num_rows;
            echo "".$rows." institutes have reported it as bogus";
            echo "<br>Thus, this issue is marked as 'Bogus Issue'";
        }
        else if($status == 5){
            $getDuplicates = "SELECT * FROM issueduplicateupvote WHERE issue_id = $id";
            $res = $conn->query($getDuplicates);
            while($arr= $res->fetch_assoc()){
                $getInstName = "SELECT * FROM institute WHERE inst_id = ".$arr['inst_id']."";
                $res1 = $conn->query($getInstName);
                $arr1 = $res1->fetch_assoc();
                echo "<br>".$arr1['inst_name']."has reported this issue as bogus to ".$arr['similar_to_issue'];
            }
        }
        else{

        if(instStatus($cemail,$id) == 0){
    ?>					
        <input type="button" onclick="loadDoc('provideSolution.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons')" class="btn btn-primary btn-sm btn-sm" value="Provide a Solution">
        <?php
        if($status == 0 || $status == 1){
        ?>
            <input type="button" onclick="loadDoc('reportBogus.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons')" class="btn btn-primary btn-sm btn-sm" value="Report as Bogus">
            <input type="button" onclick="loadDoc('reportDuplicate.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons')" class="btn btn-primary btn-sm btn-sm" value="Report as Duplicate">
        <?php
        }
        ?>
    <?php
        }
        else if(instStatus($cemail,$id) == 1){
            echo "You ";
            $bogusNumber = "SELECT * FROM issuebogusupvote WHERE issue_id = $id";
            $res = $conn->query($bogusNumber);
            $rows = $res->num_rows;
            if($rows > 1){
                echo "and ".($rows-1)." other institutes have reported it as bogus";
            }
            else{
                echo "have reported it as bogus";
            }
        }
        else if(instStatus($cemail,$id) == 2){
            echo "You've reported this issue as duplicate to ";
            $getDuplicate = "SELECT * FROM issueduplicateupvote WHERE inst_id = $inst_id AND issue_id = $id";
            $res = $conn->query($getDuplicate);
            $arr= $res->fetch_assoc();
            echo $arr['similar_to_issue'];
        }
        else{
            $getSoln = "SELECT * FROM solution WHERE inst_id = $inst_id AND issue_id = $id";
            $res = $conn->query($getSoln);
            if($res->num_rows == 1){
                echo "You've already provided solution to this issue";
            }
            else{
                echo "You've already provided ".$res->num_rows." solutions to this issue";
            }
            while($arr = $res->fetch_assoc()){
                $url = $arr['solution_url'];
                echo "<br><br>-<a href='".$url."'>".$url."</a>";
                echo "<br>";
            }
            echo "<br>Provide Another Solution";
        ?>
            <br>
            <input type="button" onclick="loadDoc('provideSolution.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons')" class="btn btn-primary btn-sm btn-sm" value="Provide a Solution">
        <?php
        }
        }
        echo "</div>";
        ?>
</div>
<div class="modal fade" id='myModal<?php echo $id; ?>' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
                <h4 class="modal-title" id="myModalLabel">Issue <? echo "#".$id; ?></h4>
            </div>
            <div class="modal-body">
                <?php 
                    $sql3="Select * from issue where issue_id='$id'";
                    $result3=mysqli_query($con,$sql3);
                    $no_of_results=mysqli_num_rows($result3);
                    $row= mysqli_fetch_array($result3);
                    echo "Code: #".$id;
                    echo "<br><br>Title: ".$row['title'];
                    echo "<br><br>Description:";
                    echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$row['description'];
                ?>
            </div>
        </div>
    </div>
</div>