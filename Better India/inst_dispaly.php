<!Doctype html>

<html>
<head>
</head>
<body>

                                      
<div class="search" style="padding:15px">

	  <div class="form-group input-group" style="border:15px">
			<input type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button"><i class="fa fa-search"></i>
				</button>
			</span>
		</div>
</div>



<?php
include "login.php";
include "function.php";
$email='dipshishetty@gmail.com';
$con=mysqli_connect("localhost","root","");
$select=mysqli_select_db($con,"hackathon");
$location=getlocation($email);
$sql1="Select * from issue where district_id=$location";
$result1=mysqli_query($con,$sql1);
$i=1;
while($row=mysqli_fetch_assoc($result1))
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