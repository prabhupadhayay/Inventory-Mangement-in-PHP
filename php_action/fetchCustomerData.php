<?php 	

require_once 'core.php';

$sql = "SELECT id, customer_name,customer_contact FROM customer";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);