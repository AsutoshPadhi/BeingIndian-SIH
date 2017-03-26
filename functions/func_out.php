<?php

    function historyUpvotedByMe(){
        $sql = "SELECT user_id FROM user WHERE user_email = $email";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $userid = $row['user_id'];
        }
        $sql = "SELECT issue.issue_id FROM issue,issueupvote WHERE issueupvote.user_id = $userid AND issueupvote.issue_id = issue.issue_id";
        return $sql;
    }

    function getInstId($cemail){
        require('dataBaseConn.php');
        $sql = "SELECT inst_id FROM institute WHERE inst_email = '$cemail'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $instid = $row['inst_id'];
        }
        return $instid;
    }

    function historyReportedBogus($cemail){
        $instid = getInstId($cemail);
        $sql = "SELECT * FROM issue, issuebogusupvote WHERE issuebogusupvote.inst_id = $instid AND issuebogusupvote.issue_id = issue.issue_id";
        return $sql;
    }

    function historyReportedDuplicate($cemail){
        require('dataBaseConn.php');
        $instid = getInstId($cemail);
        $sql = "SELECT * FROM issue, issueduplicateupvote WHERE issueduplicateupvote.inst_id = $instid AND issueduplicateupvote.issue_id = issue.issue_id";
        return $sql;
    }

    function historySolutionProvided($cemail){
        require('dataBaseConn.php');
        $instid = getInstId($cemail);
        $sql = "SELECT * FROM issue, solution WHERE solution.inst_id = $instid AND solution.issue_id = issue.issue_id";
        return $sql;
    }

    


?>