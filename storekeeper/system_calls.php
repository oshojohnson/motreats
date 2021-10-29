<?php
	function name_exist($name){
		global $db;
		$check=$db->query("SELECT * FROM products WHERE product_name='$name'");
			$count=$check->num_rows;
			if($count>0){
				return true;
			}else{
				return false;
			}
	}
	
?>