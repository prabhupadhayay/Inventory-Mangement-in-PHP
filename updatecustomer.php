<?php require_once 'php_action/db_connect.php' ?>

<?php
	
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$customername=$_POST['customername'];
        $customercontact=$_POST['customercontact'];
        
 
		mysqli_query($connect,"update `customer` set customer_name='$customername', customer_contact='$customercontact' where id='$id'");
	}
?>