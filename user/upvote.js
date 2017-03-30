
function upvoteUser($id)
		{
			
		<?php
			include '../functions/dataBaseConn.php';
			$sql="update issue set upvote_count=upvote_count+1 where issue_id=".$id ."";
			$result=$conn->query($sql);
		?>
		//	echo $row['upvote_count'];
			
		}
		