<?php
//Including Database configuration file.
require_once 'db_connect.php';
//Getting value of "search" variable from "script.js".
?>
<?php		

// if(isset($_POST['query'])&& $_POST['query']!='')

// {
// 	echo "die Successfuly";die;
if(isset($_POST['query1'])){
	$keyword = strval($_POST['query1']);
	$search_param = "{$keyword}%";


	$sql = $connect->prepare("SELECT * FROM product WHERE status=1 AND product_name LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$product_name[] = $row["product_name"];
		// $id[]= $row["id"];
		   $product_id[]=$row['product_id'];
		// $quantity[]= $row['quantity'];
		$rate[]=$row['rate'];
	
		}
		echo json_encode(array("product_name" =>$product_name,"product_id"=>$product_id ));
	}
	$connect->close();
}
// }else {
// 	echo "not";die;
// }
?>