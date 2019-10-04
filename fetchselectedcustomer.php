<?php 	

require_once 'php_action/db_connect.php';

$customer_id = $_POST['customer_id'];

$sql = "SELECT * from customer where id= '$customer_id'";
$result = $connect->query($sql);

 
 while  ($row= mysqli_fetch_array($result)){
 echo $row['customer_contact'];
} // if num_rows

$connect->close();

// echo json_encode($row);