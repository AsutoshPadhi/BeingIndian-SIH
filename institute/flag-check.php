<?php
	session_start();
	if(isset($_SESSION['$cemail']))
	{
		$cemail=$_SESSION['$cemail'];
		
        $conn=mysqli_connect("localhost","root","","hackathon");
        $sql="SELECT * FROM institute WHERE inst_email='".$cemail."'";
        $result=mysqli_query($conn,$sql);
	    while($row=mysqli_fetch_array($result))//fetch a complete record from a particular table
		{
				$flag=$row['reset_password'];
				if($flag)
				{
                    $sql = "UPDATE institute set reset_password = '0' WHERE inst_email='".$cemail."'";
                    $result1 = $conn->query($sql);
                    $_SESSION['$cemail']=$cemail;
                    header("Location: change-password.php");
				}
				else
				{
					$_SESSION['$cemail']=$cemail;
					header("Location: dashboard.php");
				}
        }
    }
    else
    {
        header("Location: dashboard.php");
    }
?>
					
					