<?php
    if(isset($_GET['issueid'])&&isset($_GET['instid'])){
        $issue_id = $_GET['issueid'];
        $inst_id = $_GET['instid'];
?>
        <div class="form-group">
            <fieldset>
            <legend>Provide resource</legend>
            <div class="form-group">
                <label>Enter url :</label>
                <br>
                <input class="form-control">
            </div>
            <div class="form-group">
                <label>Enter description :</label>
                <br>
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-default" value="Add your resource">
            </fieldset>
        </div>
<?php
        require('functions/dataBaseConn.php');
        $getResourceDetails = "SELECT * FROM resource WHERE issue_id = $issue_id";
        $resultResourceDetails = $conn->query($getResourceDetails);
        while($resourceDetails = $resultResourceDetails->fetch_assoc()){
?>
        <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                        $resourceDetails['inst_id'];
                        $getInstName = "SELECT * FROM institute where inst_id =".$resourceDetails['inst_id']."";
                        $resultInstName = $conn->query($getInstName);
                        $inst = $resultInstName->fetch_assoc();
                        echo "Reference given by :- ".$inst['inst_name'];
                    ?>
                </div>
                <div class="panel-body">
                    <?php
                        echo $resourceDetails['resource_link'];
                        echo "<br><br>";
                        echo $resourceDetails['resource_desc'];
                        echo "<br><br>";
                    ?>
                </div>
            </div>
        </div>
        </div>
<?php
        }
    }
    else{
        echo "Some error occured!";
    }
?>