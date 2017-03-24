<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <div>
            <form>

                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control" id="state">
                        <option disabled selected>State</option>
                        <?php include 'stateList.php'; ?>
                    </select>
                </div>

                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control" id="district">             
                        <option disabled selected>Districts</option>
                        <?php include 'district_list.php'; ?>
                    </select>
                </div>
                <div class="col-xs-6 col-md-2">
                    <input class="form-control" id="locality" type="text" placeholder="locality (optional)">
                </div>
                <div class="col-xs-6 col-md-2">
                    <input class="form-control" id="pin" type="text" placeholder="pincode (optional)">
                </div>
                <div class="search col-xs-10 col-md-3">
                    <input class="form-control" id="issue" type="text" placeholder="Keywords">
                </div>
                <input class="search btn btn-primary" type="submit" value="Search" 
                onclick="loadDoc(search1.php)">
            </form>
        </div>
    </body>
</html>
