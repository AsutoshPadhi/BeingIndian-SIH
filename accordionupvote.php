
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
$user="simranbhojwani@gmail.com";

$sql1="SELECT * FROM issue inner join user inner join issueupvote  on user.user_id=issue.user_id  and issueupvote.issue_id=issue.issue_id and issue.user_id=user.user_id"; 
$result1=mysqli_query($conn,$sql1); //this query is stored in result variable
    while($row=mysqli_fetch_array($result1))//fetch a complete record from a particular table
            {
                $issue_id=$row['issue_id'];
                $upvote_count=$row['upvote_count'];
                $email=$row['user_email'];
                if(isset($_POST['upvote']))
                {
                        $vote=$_POST['upvote'];
                        
                        //echo "$email";
                            //$user1=explode(",",$email);
                           // print_r($user1) ;
                            //echo "user1[0]";
                            //if(in_array($user,$user1))
                        if($user==$email)
                                {

                                    die("YOU HAVE ALREADY VOTED");
                                }
                             else
                                {
                                    echo $vote;
                                    echo  $email;
                                    mysqli_query($conn,"update issue set upvote_count=upvote_count+1 where issue_id='$vote'");
                                    die("<p style='color:blue'>Voted successfully......Thankyou!!!!</p>");
                                }
                        }
                }
                
            
                //$problem=$row['problems'];
                
            
            
?>
