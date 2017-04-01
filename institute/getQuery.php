<!-- Hello World-->
<head>
	<link rel="stylesheet" href="problemdescription.css">
</head>
<?php
	session_start();
	require_once('../globalVariables.php');
	$callFunction = $_REQUEST['callFunction'];			//Receives 

    if($callFunction == "get_query")
       get_query();

	function get_query()
	{
		include '../functions/dataBaseConn.php';
		require_once 'CosineSimilarity.php';
		include('../functions/func_in.php');
		if(isset($_SESSION['$email']))
		{
			$instlogin = false;
			$login=true;
			$email = $_SESSION['$email'];
		}
		else if(isset($_SESSION['$cemail'])){
			$cemail = $_SESSION['$cemail'];
			$inst_id = $_SESSION['$inst_id'];
			$instlogin = true;
			$login = false;
		}	
		else
		{
			$login=false;
			$instlogin = false;
		}

		$str = $_GET['issue'];
		
		$get_district_id = "SELECT *FROM institute WHERE inst_email = '".$cemail."'";
		$result = $conn->query($get_district_id);
		$row = $result->fetch_assoc();
		$district_id = $row['district_id'];

		// if (strpos($str, '#') !== false) 
		// {
		//     echo 'true';
		// }
		// if(str.includes("#"))
  //       {
  //           alert("number ahe");
  //           if( str.charAt( 0 ) === '#' )
  //           {
  //               str = str.substring(1);
  //               alert(str);
  //           }
            
  //       }

		$sql = "SELECT *FROM issue WHERE district_id = $district_id AND upvote_count > ".UPVOTE_THRESHOLD;
		$result = $conn->query($sql);

		$cs = new CosineSimilarity();
		
		#Pagenation
		$results_per_page=1;
		$no_of_results=mysqli_num_rows($result);
		//dtermine the number of pages in a page
		$no_of_pages= ceil($no_of_results/$results_per_page);

		//determine the number of results in one page
		$results_per_page=5;
		while($row= mysqli_fetch_array($result))
		{
			$row=$row['issue_id'].''.$row['title'].''.'<br>';
		}

		//dtermine the number of pages in a page
		$no_of_pages= ceil($no_of_results/$results_per_page);

		//determine the number of results in one page

		if(!isset($_GET['page']))
		{
			$page=1;
		}
		else
		{
			$page=$_GET['page'];
		}

		$start_limit=($page-1)*$results_per_page;

		if($page>1)
		{
			$pre=$page-1;
			//$next=$page+1;
		}
		else
		{
			$pre=1;

		}
		if($page<$no_of_pages)
		{
			$next=$page+1;
		//$next=$page+1;
		}
		else
		{
			$next=$no_of_pages;

		}


		$sql2= $sql." LIMIT ".$start_limit.','.$results_per_page;
		$result=mysqli_query($conn,$sql2);

		$query_word_count =  array_count_values(str_word_count($str, 1));
		
		if(($result->num_rows>0) && $str!="")
		{
			$i=0;
			$flag = 0;

			while($i<$result->num_rows)
			{
				$row = $result->fetch_assoc();
				$issue_word_count =  array_count_values(str_word_count($row['title'], 1));
				
				$percentage = $cs->similarity($query_word_count,$issue_word_count);
				
				if($percentage>0.3)
				{
					$flag=1;

					require '../issue-collapse.php';
				
				}
				
				$i++;
			}

			if($flag == 0)
			{
				?>
					<br><br><br>
					<div class="alert alert-danger alert-dismissable">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <p>No results.</p>
		            </div>
				<?php
			}
		}
		else if($str=="")
		{
			$sql = "SELECT *FROM issue WHERE district_id = $district_id AND upvote_count > ".UPVOTE_THRESHOLD;
			//echo $district_id;
			$result = $conn->query($sql);
			$i=0;
			while($i<$result->num_rows)
			{
				$row = $result->fetch_assoc();
				require '../issue-collapse.php';
				$i++;
			}
		}
		else
		{
			echo "No results";
		}
		
		if($no_of_pages > 1){
		?>
		<div class="container">
			<ul class="pagination">
				<?php echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=1\",\"field\")' class='button'>FIRST</a></li>"; ?>
				<?php echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$pre."\",\"field\")' class='button'><<</a></li>"; ?>

				<?php
					for($page=1;$page<=$no_of_pages;$page++)
					{	
						$url = "issue-display.php?sql=".$sql."&page=".$page."";
						echo "<li><a onclick='javascript:loadDoc(\"".$url."\",\"field\")'>".$page."</a></li>";
					}
					echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$next."\",\"field\")' class='button'>>></a></li>";
					echo "<li><a onclick='javascript:loadDoc(\"issue-display.php?sql=".$sql."&page=".$no_of_pages."\",\"field\")' class='button'>LAST</a></li>";
				?>
			</ul>
		</div>
		<?php
		}
	}
?>