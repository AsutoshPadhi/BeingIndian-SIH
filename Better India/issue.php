<!Doctype html>

<html>
<head>
</head>
<body>

                                      
<div class="search" style="border:15px;padding:15px">

	  <div class="form-group input-group" style="border:15px">
			<input type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button"><i class="fa fa-search"></i>
				</button>
			</span>
		</div>
</div>



<?php
$con=mysqli_connect("localhost","root","");
$select=mysqli_select_db($con,"hackathon");
$sql="Select * from issue where 1";
$result=mysqli_query($con,$sql);
$i=1;
while($row=mysqli_fetch_assoc($result))
{

?>

<div class="panel-body">
                            <div class="panel-group" id="accordion" style="margin:0px">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row['issue_id'];  ?>"><?php echo $row['title'] ?></a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $row['issue_id'];  ?>" class="panel-collapse collapse ">
                                        <div class="panel-body">
										Discription: <?php echo $row['description']; ?>
										</div>
                                    </div>
                                </div>
							</div>
						</div>
						<?php
						
						}
						?>
</body>
</html>




                        





<?php

?>