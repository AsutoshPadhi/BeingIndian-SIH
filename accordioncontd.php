 
 <!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
#result
{
    position:fixed;
}
</style>
</head>
<body>
<div id="result">
        <?php
        $servername="localhost";
        $username="root";
        $pass="";
        $dbname="hackathon";
        $conn=new mysqli($servername,$username,$pass,$dbname);
        $sql1="select * from issue where 1";
            $result = $conn->query($sql1);
            if($result->num_rows!=0)
            {
    
            while($row = $result->fetch_assoc())
                {
                   $val=$row['title'];
                   $id=$row['issue_id'];
                   echo "<div id='".$id."'>". $val. "</div><br> <button id='show'>click me</button>
                            <button id='hide'>click me1</button><form action='accordionupvote.php' method='post'><input type='submit' id='upvote1' name='upvote' value='".$id."'><br><br></form>
                            <script>
$(document).ready(function(){
    $('#hide').click(function(){
        $('#para').hide();
    });
    $('#show').click(function(){
        $('#para').show();
    });
});
</script>";
                }
            }

        ?>
</div>



 