<?php
//Including Database configuration file.
require_once 'php_action/db_connect.php';
//Getting value of "search" variable from "script.js".
?>
<?php		

// if(isset($_POST['query'])&& $_POST['query']!='')

// {
// 	echo "die Successfuly";die;
if(isset($_POST['query'])){
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";


	$sql = $connect->prepare("SELECT * FROM customer WHERE customer_name LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$customer_name[] = $row["customer_name"];
		// $id[]= $row["id"];
		$customer_contact[]=$row['customer_contact'];
		}
		echo json_encode(array("customer_name" =>$customer_name, "customer_contact" =>$customer_contact, ));
	}
	$connect->close();
}
// }else {
// 	echo "not";die;
// }
?>