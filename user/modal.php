<!Doctype html>
<html>
<head>
<!--<script>
$(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('issue_id');
        $.ajax({
            type : 'post',
            url : 'issue_dispaly.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});
</script>-->

</head>
<body>

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×</button>
				<h4 class="modal-title" id="myModalLabel">Description</h4>
			</div>
			<div class="modal-body">
			 <div class="fetched-data">
			<?php echo "HEllo";?>
			 </div> 
            </div>
				<div class="row">
					<div class="col-md-10">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

