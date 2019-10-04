<?php 	

require_once 'db_connect.php';
if(isset($_POST['produc'])){
$produc = $_POST['produc'];

$sql = "SELECT * from product where produc= '$produc'";
$result = $connect->query($sql);

 
 while  ($row= mysqli_fetch_array($result)){
 echo $row['rate'];
} // if num_rows

$connect->close();
}