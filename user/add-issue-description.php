<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Fill the details and proceed to add.
</div>

<form>

	<div class="form-group col-xs-6 col-md-3">
	    <select class="form-control" name="state" id="state">
            <option disabled selected>State</option>
	        <?php include 'stateList.php'; ?>
	    </select>
	</div>

	<div class="form-group col-xs-6 col-md-3">
	    <select class="form-control" name="district" id="district">             
	        <option disabled selected>Districts</option>
	        <?php include 'district_list.php';?>
	    </select>
	</div>

	<div class="col-xs-6 col-md-3">
		<input class="form-control" name="locality" id="locality" type="text" placeholder="locality (optional)">
	</div>

	<div class="col-xs-6 col-md-3">
	    <input class="form-control" name="pin" id="pin" type="text" placeholder="pincode (optional)">
	</div>

	<div style="position: relative;top: 50%;">
		<div class="form-group col-xs-6 col-md-12">
		<input class="form-control" name="issueTitle" id="issueTitle" placeholder="What Issue are you facing?">
		</div>	
	</div>

	<div class="form-group">
	    <textarea class="form-control" rows="3" placeholder="Elaborate the issue"></textarea>
	</div>

</form> 

<button type="button" class="btn btn-outline btn-primary btn-lg btn-block">Add the Issue</button>
<br><hr>
<div class="alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
You will be notified when the problem is solved.
</div>