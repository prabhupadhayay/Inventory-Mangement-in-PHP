<?php 	

require_once 'php_action/db_connect.php';
if(isset($_POST['customer_id'])){
$customer_id = $_POST['customer_id'];

$sql = "SELECT * from customer where customer_name= '$customer_id'";
$result = $connect->query($sql);

 
 while  ($row= mysqli_fetch_array($result)){
 echo $row['customer_contact'];
} // if num_rows

$connect->close();
}