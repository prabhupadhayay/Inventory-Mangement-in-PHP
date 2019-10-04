<?php
require_once 'core.php';
// $_SESSION['userId'];
// $userId=$_POST['userId'];
// echo $userId;
$userId=  $_SESSION['userId'];
$sql="SELECT  timezone FROM users where user_id='$userId'";
$result= $connect->query($sql);
$output= array('data'=> array());
if($result-> num_rows >0){
	while($row = $result->fetch_assoc()) {
	$timezone= $row['timezone'];
}
}
else{
	echo "no";
}
// $conn->close();
// print_r($timezone);

$sql = "SELECT  order_date FROM orders where order_status=1";
$result = $connect->query($sql);



$output = array('data' => array());
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//  echo $row["order_date"]. "<br>";
// 		 date_default_timezone_set("UTC");
// date_default_timezone_get()."<br>"; //UTC
$datetime = $row['order_date'];
 

date_default_timezone_set("UTC");
date_default_timezone_get()."<br>"; //UTC
$datetime1 = $datetime;
$asia_timestamp1 = strtotime($datetime1);
date_default_timezone_set($timezone);
date_default_timezone_get()."<br>"; //UTC
echo "local time: ".$asia_time = date("Y-m-d H:i:s", $asia_timestamp1)."<br>";


// $asia_timestamp1 = strtotime($datetime);
// date_default_timezone_set($timezone);
// date_default_timezone_get()."<br>"; //UTC
// echo "Local time: ".$asia_time = date("Y-m-d H:i:s", $asia_timestamp1);
    }
} else {
    echo "0 results";
}
// print_r($datetime);





$conn->close();



/************ Local To UTC ************/
// date_default_timezone_set("Asia/Kolkata");
// date_default_timezone_get()."<br>"; //UTC
// $datetime = "14:00";
// $asia_timestamp1 = strtotime($datetime);
// date_default_timezone_set("UTC");
// date_default_timezone_get()."<br>"; //UTC
// echo "asia time: ".$asia_time = date("H:i", $asia_timestamp1);

/************UTC To Local**************/


?>