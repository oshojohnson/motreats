<?php 
	include_once "dbconf.php";
	include "system_calls.php";

		if(isset($_POST["login"])){
			$email= mysqli_real_escape_string($db,$_POST['email']);
			$password= mysqli_real_escape_string($db,$_POST['password']);
			$password=md5($password);
			$check=$db->query("SELECT * FROM managers WHERE email='$email' AND password='$password'");
			$count=$check->num_rows;
			if($count>0){
				$_SESSION['email']=$email;
				echo "1";
			}else{
				echo "2";
			}
		
		}
		if(isset($_POST["product_name"])){
			$product_name= mysqli_real_escape_string($db,$_POST['product_name']);
			$product_price= mysqli_real_escape_string($db,$_POST['product_price']);
			$product_desc= mysqli_real_escape_string($db,$_POST['product_desc']);
			$product_category= mysqli_real_escape_string($db,$_POST['product_category']);
			$count=1;
			if(!name_exist($product_name)){
			if(isset($_FILES['picture_img'])){
				$file_name  = strtolower($_FILES['picture_img']['name']);
				$file_ext = substr($file_name, strrpos($file_name, '.'));
				$prefix = 'motreats_'.$product_name;
				$file_name_new = $prefix.$file_ext;
				$path = '../src/images/product/'.$file_name_new;
				$allowed_image_extension = array(
			        "png",
			        "jpg",
			        "jpeg"
			    );
    		$file_extension = pathinfo($_FILES["picture_img"]["name"], PATHINFO_EXTENSION);
    		if(in_array($file_extension, $allowed_image_extension)){
					if(@move_uploaded_file($_FILES['picture_img']['tmp_name'], $path)) {
						$file_path='https://localhost/motreats/src/images/product/'.$file_name_new;
						$insert=$db->query("INSERT INTO products (product_name,product_desc,product_price,product_category,
						product_directory) VALUES('$product_name','$product_desc','$product_price','$product_category','$file_path')");
						if($insert){
							echo "1";
						}else{
							echo "2";
						}
					}else{
						echo "4";
					}

				}
			 else{
				echo "5";	
			 }
			}else{
				echo "6";
			}
		 }else{
		 	echo "7";
		 }
		
		}
		if(isset($_POST["edit_product_name"])){
			$product_name= mysqli_real_escape_string($db,$_POST['edit_product_name']);
			$product_price= mysqli_real_escape_string($db,$_POST['product_price']);
			$product_desc= mysqli_real_escape_string($db,$_POST['product_desc']);
			$product_category= mysqli_real_escape_string($db,$_POST['product_category']);
			$product_id= $_POST['product_id'];
			$count=1;
			
			if(isset($_FILES['picture_img']) && $_FILES['picture_img']['size'] !=0 ){
				$file_name  = strtolower($_FILES['picture_img']['name']);
				$file_ext = substr($file_name, strrpos($file_name, '.'));
				$prefix = 'motreats_'.$product_name;
				$file_name_new = $prefix.$file_ext;
				$path = '../src/images/product/'.$file_name_new;
				$allowed_image_extension = array(
			        "png",
			        "jpg",
			        "jpeg"
			    );
    		$file_extension = pathinfo($_FILES["picture_img"]["name"], PATHINFO_EXTENSION);
    		if(in_array($file_extension, $allowed_image_extension)){
					if(@move_uploaded_file($_FILES['picture_img']['tmp_name'], $path)) {
						$file_path='https://localhost/motreats/src/images/product/'.$file_name_new;
						$insert=$db->query("UPDATE products SET product_name='$product_name', 
							product_desc='$product_desc',
							product_price='$product_price',
							product_category='$product_category',
						product_directory='$file_path' WHERE id='$product_id'");
						if($insert){
							echo "1";
						}else{
							echo "2";
						}
					}else{
						echo "4";
					}

				}
			 else{
				echo "5";	
			 }
			}else{
				$insert=$db->query("UPDATE products SET product_name='$product_name', 
							product_desc='$product_desc',
							product_price='$product_price',
							product_category='$product_category' WHERE id='$product_id'");
						if($insert){
							echo "1";
						}else{
							echo "2";
						}
			}
		
		
		}
		if(isset($_POST["update_top_item"])){
			$id= $_POST['item_id'];
			$query=$db->query("UPDATE products SET priority=0 WHERE id='$id'");
			if($query){
				echo "1";
			}else{
				echo "2";
			}
		}
		if(isset($_POST['delete_prod'])){
			$id= $_POST['item_id'];
			$query=$db->query("DELETE FROM products WHERE id='$id'");
			if($query){
				echo "1";
			}else{
				echo "2";
			}
		}
		if(isset($_POST['edit_prod'])){
			$id= $_POST['item_id'];
			$result=array();
			$query=$db->query("SELECT * FROM products WHERE id='$id' LIMIT 1");
			if(($query->num_rows)>0){
				$row=$query->fetch_assoc();
				$result["name"]=$row["product_name"];
				$result["price"]=$row["product_price"];
				$result["desc"]=$row["product_desc"];
				$result["cats"]=$row["product_category"];
				$result=json_encode($result);
			echo $result;

			}
			
		}
		if(isset($_POST['update_product_tbl'])){
 			$i=0;
            $query=$db->query("SELECT * FROM products");
            if(($query->num_rows)>0){
               while($row=$query->fetch_assoc()){
                    $i+=1;
                    echo '<tr><td>'.$i.'</td>'.'<td>'.$row["product_name"].'</td><td>'.$row["product_desc"].'</td><td>'.$row["product_price"].'<td>'.$row["product_category"].'</td><td><a href="'.$row["product_directory"].'" target="_blank"><button type="button"  class="btn btn-default btn-sm"><i class="fa fa-eye"></i></button></a><button type="button" onclick=delete_item('.$row["id"].') class="prod_del btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> <button type="button" data-id="'.$row["id"].'" class="prod_edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></td></tr>';
               }
            }
		}
		if(isset($_POST['update_contact'])){
			$address= $_POST['address'];
			$phone1= $_POST['mobile'];
			$phone2= $_POST['mobile2'];
			$email= $_POST['email'];
			$query= $db->query("UPDATE contacts SET address='$address',phone1='$phone1',phone2='$phone2',email='$email' WHERE id=1");
			if($query){
				echo "1";
			}else{
				echo "2";
			}
		}
		if(isset($_POST['new_top_product'])){
			$id=$_POST['id'];
			$query=$db->query("UPDATE products SET priority=1 WHERE id='$id'");
			if($query){
				echo "1";
			}else{
				echo "2";
			}
		}
		if(isset($_POST['get_orders'])){
			$id=$_POST['order_id'];
			$query=$db->query("SELECT * FROM orders WHERE id='$id'");
			if(($query->num_rows)>0){ 
			$row=$query->fetch_assoc();     
               		echo '<tr><td colspan="2"><center><h5>Order ID: #'.$row['id'].' </h5></center></td></tr>
               		<tr>
               			<td>Full Name:</td>
               			<td>'.$row['name'].'</td>
               		</tr>
               		<tr>
               			<td>Email: </td>
               			<td>'.$row['email'].'</td>
               		</tr>
               		<tr>
               			<td>Phone Number: </td>
               			<td>'.$row['phone_number'].'</td>
               		</tr>';
               		echo '<tr>
               			<td colspan="2"><center><h5>Product Details</h5></center> </td>
               		</tr>';
               		$product_id=$row['product_id'];
               		$qry=$db->query("SELECT * FROM products WHERE id='$product_id'");
               		if(($qry->num_rows)>0){ 
					$product=$qry->fetch_assoc();
					echo '<tr>
               				<td>Product Name: </td>
               				<td>'.$product['product_name'].'</td>
               			</tr>
               			<tr>
               				<td>Product Price: </td>
               				<td>'.$product['product_price'].'</td>
               			</tr>';
					}
               		echo '<tr>
               			<td>Order Date: </td>
               			<td>'.$row['date_submited'].'</td>
               		</tr>';
               		if($row['status']==0){
               			echo '<tr>
               					<td>Status: </td>
               					<td><button class="btn btn-warning">Pending</button></td>
               				</tr>
               				<tr>

               					<td><center><button type="button" class="btn btn-default" onclick=confirm_orders('.$row['id'].')>Click to Confirm Orders</button></center></td>
               				</tr>';
               		}else{
               			echo '<tr>
               					<td>Date Approved: </td>
               					<td>'.$row['date_updated'].'</td>
               				</tr>
               				<tr>
               					<td>Status: </td>
               					<td><button class="btn btn-success">Processed</button></td>
               				</tr>';
               		}

            }
        }	
        if(isset($_POST["submit_order"])){
			$id= $_POST['order_id'];
			$query=$db->query("UPDATE orders SET status=1 WHERE id='$id'");
			if($query){
				echo "1";
			}else{
				echo "2";
			}
		}
		if(isset($_POST['changePassword'])){
			$email= mysqli_real_escape_string($db,$_POST['email']);
			$password= mysqli_real_escape_string($db,$_POST['password']);
			$password=md5($password);
			$insert=$db->query("UPDATE managers SET password='$password' WHERE email='$email'");
			if($insert){
				echo "1";
			}else{
				echo "2";
			}
		}
?>