<?php		 
    //Include database connection
    if(isset($_POST['rowid']))
    {
        $id = $_POST['rowid']; //escape string
        // Run the Query
        // Fetch Records
        // Echo the data you want to show in modal
        echo $id;

        $sql="Select * from issue where issue_id='$id '";
        $result=mysqli_query($con,$sql);
        $no_of_results=mysqli_num_rows($result);
        
        while($row= mysqli_fetch_array($result))
        {
            echo $id;
            echo $row['issue_id'];
        }
    }
    else{
        echo "NO";
    }	

?>