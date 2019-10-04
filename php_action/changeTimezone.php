<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
    $userId = $_POST['userId'];
    $timezone=$_POST['timezone'];
    $sql = "UPDATE users SET timezone = '$timezone' WHERE user_id = {$userId}";	
    $connect->query($sql);
    

    
	$valid['success'] = true;
	$valid['messages'] = "Successfully Updated";		
	
	$connect->close();

	echo json_encode($valid);
}

$sql="select * from users";
$result = $connect->query($sql);































// $output = array('data' => array());

// if($result->num_rows > 0) { 

//  // $row = $result->fetch_array();
//  $active = ""; 

//  while($row = $result->fetch_array()) {
//      $userId=row[0];
//     }}
//     echo row[0];
// $utc = "2014-05-29T04:54:30.934Z";
 
// $dt = new DateTime($utc);
 
// echo 'Original: ', $dt->format('r'), PHP_EOL;
 
// $tz = new DateTimeZone('Asia/Kolkata');
 
// $dt->setTimezone($tz);
// echo 'After setting timezone: ', $dt->format('r'), PHP_EOL;