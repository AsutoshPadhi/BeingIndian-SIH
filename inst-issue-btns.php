<?php
    echo "<div id='instButtons".$row['issue_id']."'>";
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
            <input type="button" onclick="loadDoc('provideSolution.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons<?php echo $row['issue_id']; ?>')" class="btn btn-default btn-sm btn-sm" value="Provide a Solution">
            <?php
                if($status == 0 || $status == 1){
            ?>
                    <input type="button" onclick="loadDoc('reportBogus.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons<?php echo $row['issue_id']; ?>')" class="btn btn-default btn-sm btn-sm" value="Report as Bogus">
                    <input type="button" onclick="loadDoc('reportDuplicate.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons<?php echo $row['issue_id']; ?>')" class="btn btn-default btn-sm btn-sm" value="Report as Duplicate">
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
        ?>
            <br>
            <br>
        <?php
            while($arr = $res->fetch_assoc()){
                $url = $arr['solution_url'];
        ?>
                <a class='' id="video<?php echo $arr['solution_id'];?>" data-toggle='modal' data-target='#solution<?php echo $arr['solution_id'] ;?>'data-theVideo="<?php echo $arr['solution_url'];?>">
                    <?php echo $arr['solution_url'];?>
                </a><hr>            
                <div class='modal fade' id='solution<?php echo $arr['solution_id'];?>' tabindex='-1' role='dialog' aria-labelledby='videoModal' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' id='close' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                <h4 class='modal-title' id='myModalLabel'>Solutions </h4>
                            </div>
                            <div class='modal-body'>
                                <?php
                                    $solnurl = $arr['solution_url'];
                                    $code = substr($solnurl, (strpos($solnurl, "=") + 1), (strlen($solnurl) - 1) );
                                ?>
                                <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $code; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                <!-- /.modal-dialog -->
                </div>
        <?php
            }
            echo "Provide Another Solution";
        ?>
        <br>
        <br>
        <input type="button" onclick="loadDoc('provideSolution.php?inst=<?php echo $inst_id."&issue=".$id; ?>','instButtons<?php echo $row['issue_id']; ?>')" class="btn btn-default btn-sm btn-sm" value="Provide a Solution">
        <br>
<?php
        }
?>
        </div>
<?php
    }
?>
</div>
<?php
    require('issue-desc.php');
?>