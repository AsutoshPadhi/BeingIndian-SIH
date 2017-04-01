<div class='panel-body'>
    <!-- Button trigger modal -->
    <?php
        $sql1="select * from solution where issue_id=".$row['issue_id']."";
        $result1=mysqli_query($con,$sql1);
        while($row=mysqli_fetch_array($result1))
        {
    ?>
            <a class='' id="video<?php echo $row['solution_id'];?>" data-toggle='modal' data-target='#solution<?php echo $row['solution_id'] ;?>'data-theVideo="<?php echo $row['solution_url'];?>">
                <?php echo $row['solution_url'];?>
            </a><br><hr>
            <!-- Modal -->
            <div class='modal fade' id='solution<?php echo $row['solution_id'];?>' tabindex='-1' role='dialog' aria-labelledby='videoModal' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h4 class='modal-title' id='myModalLabel'>Solutions </h4>
                        </div>
                        <div class='modal-body'>
                        <iframe width="560" height="315" src="<?php echo $row['solution_url']?>" frameborder="0" allowfullscreen></iframe>				<br>
                        <br>
                        <?php
                        if($login)
                        {
                            $userid=getUserId($email);
                            $sql="select * from issueupvote where user_id=$userid and issue_id=".$row['issue_id']."";
                            $result=mysqli_query($con,$sql);
                            if($result==TRUE)
                            {
                            ?>
                        <div id="like">
                            <a onclick='javascript:loadDoc("likecount.php?solutionid=<?php echo $row['solution_id'] ?>&useremail=<?php $email ?>","like")' class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-thumbs-up"></span> 
                            </a>
							<i><?phpNumberOfLikes($rowsolution['solution_id'])?></i>
                        </div>
                        <?php
                            }
                            else
                            {
                                echo "Not upvoted this problem";
                            }
                            
                        }
                        else
                        {
                        ?>
                            <a  class="btn btn-primary btn-sm" data-toggle='modal' data-target='#confirmation' data-dismiss='modal' >
                                <span class="glyphicon glyphicon-thumbs-up"></span> 
								
                            </a>
							<i><?php NumberOfLikes($rowsolution['solution_id'])?></i>
							</div>
                        <?php	
                        }
                        ?>
                        <script>
                            var youtubeFunc ='';
                            var outerDiv = document.getElementById("solution<?php echo $row['solution_id'];?>");
                            var youtubeIframe = outerDiv.getElementsByTagName("iframe")[0].contentWindow;
                            $('#solution<?php echo $row['solution_id'];?>').on('hidden.bs.modal', function (e) {
                            youtubeFunc = 'pauseVideo';
                            youtubeIframe.postMessage('{"event":"command","func":"' + youtubeFunc + '","args":""}', '*');
                            });

                        </script>	
                        </div>
                    <!-- /.modal-content -->
                    </div>
                <!-- /.modal-dialog -->
                </div>
            <!-- /.modal -->
            </div>
    <?php	
        }
    ?>
</div>