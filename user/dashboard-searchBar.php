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
                        <script>
                            var state = document.getElementById('state').value;
                            if (window.XMLHttpRequest)
                            {
                                // code for modern browsers
                                xhttp = new XMLHttpRequest();
                            }
                            else
                            {
                                // code for IE6, IE5
                                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            
                            xhttp.onreadystatechange = function()
                            {
                                if (this.readyState == 4 && this.status == 200)
                                {
                                    document.getElementById("district").innerHTML = this.responseText;
                                }
                            };
                            xhttp.open("GET", "district_list.php?state = "+state, true);
                            xhttp.send();
                        </script>
                        
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
                onclick="generateUrl((document.getElementById('state').value),(document.getElementById('district').value),
                (document.getElementById('locality').value),(document.getElementById('pin').value),
                (document.getElementById('issue').value));return false;">
            </form>
        </div>
    </body>
</html>
