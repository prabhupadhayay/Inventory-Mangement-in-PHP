<?php require_once 'php_action/db_connect.php' ?>


<?php
	
	if(isset($_POST['show'])){
		?>
		<table class = "table table-stripped">
			<thead >
				<th>Customer Name</th>
				<th>Customer Contact</th>
                
                <th>Action</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($connect,"select * from `customer`");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['customer_name']; ?></td>
                                    <td><?php echo $urow['customer_contact']; ?></td>
                                   
									<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_customermodal.php'); ?>
									</td>
								</tr>
							<?php
						}
 
					?>
				</tbody>
			</table>
		<?php
	}
 
?>