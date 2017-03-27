<?php
    session_start();
    require('../functions/func_aj.php');
    $cemail = $_SESSION['$cemail'];
    $sql = historyReportedBogus($cemail);
?>
    <div id="problem">	
	</div>
    <script>
        $url = "issue-display.php?sql=".$sql."";
        loadDoc("<?php echo $url?>","field");
    </script>