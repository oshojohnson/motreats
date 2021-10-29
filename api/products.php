<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	require 'connect.php';
	$id=$_GET['id'];
	if (isset($id) && is_numeric($id)) {
			$get_product=$db->query("SELECT * FROM products WHERE id= '$id'");
			if ($get_product) {
				if(($get_product->num_rows)>0){
					$product=$get_product->fetch_array();
					 print json_encode(["success" => 1, "products" =>$product ]);
				}else{
						print json_encode(["success" => 0, "msg" => "Product Not Available!"]);
				}
		    } else {
		        print json_encode(["success" => 0, "msg" => "Product Not Found!"]);
		    }

	}
	else {
    	print json_encode(["success" => 0, "msg" => "Product Not Found!"]);
	}
	
?>