<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <div>
            <form>

                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control" id="state1" onchange="getDistrict((document.getElementById('state1').value),'district1')">
                        <option disabled selected>State</option>
                        <?php include 'stateList.php'; ?>
                    </select>
                </div>

                <div class="form-group col-xs-6 col-md-2">
                    <select class="form-control" id="district1">             
                        <option disabled selected>Districts</option>
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
                onclick="generateUrl((document.getElementById('state1').value),(document.getElementById('district1').value),(document.getElementById('locality').value),(document.getElementById('pin').value),(document.getElementById('issue').value),'field','dashboard')">
            </form>
        </div>
    </body>
</html>
