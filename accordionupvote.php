
<?php

$hostname="localhost";
$u_name="root";
$pass_name="";
$dbname="hackathon";
$conn=new mysqli($hostname,$u_name,$pass_name,$dbname);
if($conn->connect_error)
{
    die ("Error occured" . $conn->connect_error);
}


$sql1="select * from issue where 1"; 
$result1=mysqli_query($conn,$sql1); //this query is stored in result variable
    while($row=mysqli_fetch_array($result1))//fetch a complete record from a particular table
            {
                $issue_id=$row['issue_id'];
                $upvote_count=$row['upvote_count'];
               // if(isset($_POST['vote']))
                {
                $vote=$_POST['vote'];
               
                       // echo $vote;
                    mysqli_query($conn,"update issue set upvote_count=upvote_count+1 where issue_id='$vote'");
                    die("<p style='color:blue'>Voted successfully......Thankyou!!!!</p>");
                }
                
            }
                $problem=$row['problems'];
                
            
            
?>
