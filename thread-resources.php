<?php
    require_once 'functions/dataBaseConn.php';
    if(isset($_GET['issueid'])&&isset($_GET['instid']))
    {
        $issue_id = $_GET['issueid'];
        $inst_id = $_GET['instid'];
?>
        <div class="form-group">
            <fieldset>
            <legend>Provide resource</legend>
            <div class="form-group">
                <label>Enter url :</label>
                <br>
                <input type="url" id="resource-url" class="form-control">
            </div>
            <div class="form-group">
                <label>Enter description :</label>
                <br>
                <textarea class="form-control" id="resource-desc" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-default" value="Add your resource" onclick="loadDoc('resource-display.php?inst_id=<?php echo $inst_id; ?>&issue_id=<?php echo $issue_id; ?>&url='+(document.getElementById('resource-url').value)+'&desc='+(document.getElementById('resource-desc').value),'display-resources')">
            </fieldset>
        </div>

        <div id="display-resources">
        <?php
            include 'resource-display.php'    
        ?>
        </div>

        
<?php
        
    }
    else
    {
        echo "Some error occured!";
    }
?>