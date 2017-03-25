<form>

	<div class="form-group col-xs-6 col-md-2">
        <select class="form-control" id="state1" onchange="getDistrict(document.getElementById('state1').value);return false;">
            <option disabled selected>State</option>
            <?php include 'stateList.php'; ?>
        </select>
    </div>

    <div class="form-group col-xs-6 col-md-2">
        <select class="form-control" id="district1">             
            <option disabled selected>Districts</option>
        </select>
    </div>

	<div class="col-xs-6 col-md-3">
		<input class="form-control" name="locality" id="locality" type="text" placeholder="locality (optional)">
	</div>

	<div class="col-xs-6 col-md-3">
	    <input class="form-control" name="pin" id="pin" type="text" placeholder="pincode (optional)">
	</div>

	<div style="position: relative;top: 50%;">
		<div class="form-group col-xs-6 col-md-9">
		<input class="form-control" name="issueTitle" id="issueTitle" placeholder="What Issue are you facing?">
		</div>
		<div class="form-group col-xs-6 col-md-3">
		<button type="button" class="btn btn-primary" onclick="generateUrl((document.getElementById('state').value),(document.getElementById('district').value),(document.getElementById('locality').value),(document.getElementById('pin').value),(document.getElementById('issueTitle').value))">Next</button>
		</div>
	</div>

</form>