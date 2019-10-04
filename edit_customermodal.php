<div class="modal fade" id="edit<?php echo $urow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($connect,"select * from `customer` where id='".$urow['id']."'");
		$nrow=mysqli_fetch_array($n);
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 class = "text-success modal-title">Update</h3></center>
		</div>
		<form class="form-inline">
		<div class="modal-body">

        <div class="form-group">
        <label for="customerName" class="col-sm-4 control-label">Customer Name: </label>

        <div class="col-sm-8">
                 <input type="text" value="<?php echo $nrow['customer_name']; ?>" id="ucustomername<?php echo $urow['id']; ?>" class="form-control">

</div>
</div>

<div class="form-group">
<label for="customercontact" class="col-sm-4 control-label">Contact: </label>

<div class="col-sm-4">
            <input type="number" value="<?php echo $nrow['customer_contact']; ?>" id="ucustomercontact<?php echo $urow['id']; ?>" class="form-control"></div>
</div>
</div>
         

		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updatecustomer btn btn-success" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
        </div>

        
		</form>
    </div>
  </div>
</div>