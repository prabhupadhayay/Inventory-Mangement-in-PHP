<?php
	require_once 'php_action/db_connect.php';
	if(isset($_POST['add'])){
		$customername=$_POST['customername'];
        $customercontact=$_POST['customercontact'];
        
 
		$check=mysqli_query($connect,"select * from customer where customer_name='$customername' and customer_contact='$customercontact'");

		$checkrows=mysqli_num_rows($check);


		if($checkrows>0) {
			echo "customer exists";
		 } else {  
		  //insert results from the form input
			$query = "INSERT IGNORE INTO customer(customer_name, customer_contact) VALUES('$customername', '$customercontact')";
	  
			$result = mysqli_query($connect, $query) or die('Error querying database.');
	  
			mysqli_close($connect);
		  }
		  echo "Customer Added";
		  };
		

	
?>






<!-- mysqli_query($connect,"insert into `customer` (customer_name, customer_contact) values ('$customername', '$customercontact')"); -->