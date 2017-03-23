<form>

	<div class="form-group col-xs-6 col-md-3">
	    <select class="form-control" id="state">
            <option disabled selected>State</option>
	        <?php include 'stateList.php'; ?>
	    </select>
	</div>

	<div class="form-group col-xs-6 col-md-3">
	    <select class="form-control" id="district">             
	        <option disabled selected>Districts</option>
	        <?php include 'district_list.php';?>
	    </select>
	</div>

	<div class="col-xs-6 col-md-3">
		<input class="form-control" id="locality" type="text" placeholder="locality (optional)">
	</div>

	<div class="col-xs-6 col-md-3">
	    <input class="form-control" id="pin" type="text" placeholder="pincode (optional)">
	</div>

	<div style="position: relative;top: 50%;">
		<div class="form-group col-xs-6 col-md-9">
		<input class="form-control" name="issueTitle" id="issueTitle" placeholder="What Issue are you facing?">
		</div>
		<div class="form-group col-xs-6 col-md-3">
		<button type="button" class="btn btn-primary" onclick="generateUrl((document.getElementById('state')),(document.getElementById('district')),(document.getElementById('locality')),(document.getElementById('pin')),(document.getElementById('issueTitle')))">Next</button>
		</div>
	</div>

</form>