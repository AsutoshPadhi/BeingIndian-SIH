<<<<<<< HEAD
 
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
                   echo "<div id='para'>". $val. "</div><br> <button id='show'>click me</button>
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



 
=======
  <!DOCTYPE html>
  <html>
  <head>
  </head>

  <body>
  <?php
  echo 
  "<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='myModalLabel'>Modal title</h4>
                                        </div>
                                        <div class='modal-body'>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='button' class='btn btn-primary'>Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>";
                            ?>
                            </body>
                            </html>
>>>>>>> origin/master
