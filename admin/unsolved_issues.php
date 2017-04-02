    <?php
        function exportToCSV($sql,$filename,$arr){
            // output headers so that the file is downloaded rather than displayed
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename='.$filename.'');

            // create a file pointer connected to the output stream
            $output = fopen('php://output', 'w');

            // output the column headings
            fputcsv($output, $arr);

            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');
            define('DB_DATABASE', 'hackathon');

            $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

            // $sql = "SELECT issue_id,title FROM issue";
            $result= mysqli_query($db,$sql);
            if(!$result){
                echo mysqli_error($result);
            }
            else{
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                    fputcsv($output, $row);
                }
            }
        }

        if(isset($_POST['state'])){
            $state = $_POST['state'];
            if(isset($_POST['district'])){
                $district = $_POST['district'];
                $pending_issues_state_district = "SELECT issue.issue_id,issue.title,user.fname,user.lname,state.state_name,district.district_name,issue.added_on FROM issue,district,state,user WHERE district.district_name = '".$district."' AND district.state_id = state.state_id AND district.district_id = issue.district_id AND issue.user_id = user.user_id AND issue.solution_count = 0 ORDER BY issue.added_on ASC ";
                $filename = "pending_issues_".$state."_".$district.".csv";
                $arr = array("Issue Code","Issue Title","User first name","User last name","State","District","Issue added on");
                exportToCSV($pending_issues_state_district,$filename,$arr);
            }
        }
        else{
    ?>
        <h3>Pending Issues</h3>
        <div>
            <form action="unsolved_issues.php" method="POST">
                <div class="form-group col-xs-5 col-md-5">
                    <select class="form-control" id="state1" name="state" onchange="getDistrict((document.getElementById('state1').value),'district1')">
                            <option value="1" selected>All States</option>
                        <?php include '../user/stateList.php'; ?>
                    </select>
                </div>
                <div class="form-group col-xs-5 col-md-5">
                    <select class="form-control" id="district1" name="district">
                        <option value='1' selected>All Districts</option>
                        <?php include '../user/district_list.php'; ?>
                    </select>
                </div>                
                <input class="search btn btn-primary" type="submit" value="Download Report" >
            </form>
        </div>

    <?php
        }
    ?>
