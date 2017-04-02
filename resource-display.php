<?php
            
    if(isset($_GET['desc']))
    {
        require_once 'functions/dataBaseConn.php';
        $inst_id = $_GET['inst_id'];
        $issue_id = $_GET['issue_id'];
        $resource_url = $_GET['url'];
        $resource_desc = $_GET['desc'];

        #to get the last issue_id
        $get_last_resource_id = "SELECT resource_id FROM resource";
        $result = $conn->query($get_last_resource_id);
        $resource_id = $result->num_rows + 1;

        #insert the resource into the database
        $insert_resource_sql = "INSERT INTO resource(resource_id,inst_id,issue_id,resource_desc,resource_link,like_count) VALUES('$resource_id','$inst_id','$issue_id','$resource_desc','$resource_url','0')";
        $insert_resource_result = $conn->query($insert_resource_sql);
    }

    $getResourceDetails = "SELECT * FROM resource WHERE issue_id = $issue_id";
    $resultResourceDetails = $conn->query($getResourceDetails);
    while($resourceDetails = $resultResourceDetails->fetch_assoc())
    {
        ?>
        <div class="row" id="display-resources">
        <div class="col-lg-12">
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
                    <a href="<?php echo $resource_url; ?>"><?php echo $resourceDetails['resource_link']; ?></a>
                    <?php
                    echo "<br><br>";
                    echo $resourceDetails['resource_desc'];
                    echo "<br><br>";
                    if(isset($inst_id))
                    {
                        $find_like_details_sql = "SELECT * FROM resource_like WHERE resource_id = ".$resourceDetails['resource_id']." and inst_id = $inst_id";
                        $find_like_details_res = $conn->query($find_like_details_sql);
                        if($find_like_details_res->num_rows > 0)
                        {
                            echo "You have already liked this resource";
                        }
                        else
                        {
                            ?><div id="like">
                                <a class="btn btn-primary btn-sm" onclick='javascript:loadDoc("insert-like-resource.php?resource_id=<?php echo $resourceDetails['resource_id'] ?>&inst_id=<?php echo $inst_id ?>","like")'>
                                    <span class="glyphicon glyphicon-thumbs-up"></span> 
                                </a>
                            </div><?php
                        }
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>
    <?php
    }
?>