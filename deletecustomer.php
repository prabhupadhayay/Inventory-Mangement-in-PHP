<?php require_once 'php_action/db_connect.php' ?>

<?php

	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($connect,"delete from `customer` where id='$id'");
	}
?>