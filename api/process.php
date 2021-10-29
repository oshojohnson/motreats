<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	$template = file_get_contents("template.php");
	use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	require 'connect.php';
	 require 'Class/Exception.php';
      require 'Class/PHPMailer.php';  
      require 'Class/SMTP.php';
	if(isset($_GET['get_contact'])){
		$get_contact=$db->query("SELECT * FROM contacts");
		if($get_contact){
			$contacts=$get_contact->fetch_array();
			print json_encode(["success" => 1, "contacts" => $contacts]);
		}else{
			print json_encode(["success" => 0, "msg" => "Contact Not Found!"]);
		}
	}
	if(isset($_GET['get_products'])){
		if($_GET['get_products']==1){
			$get_products=$db->query("SELECT * FROM products WHERE priority=1 LIMIT 4");
		}elseif($_GET['get_products']==2){
			$get_products=$db->query("SELECT * FROM products");
		}
		
		if($get_products){
			$products=array();
			while($row=$get_products->fetch_assoc()){
				$products[]=$row;
			}
			print json_encode([ "products" =>$products], true);
		}else{
			print json_encode(["success" => 0, "msg" => "Product Not Found!","products"=>""]);
		}
	}
	if(isset($_GET['get_menus'])){
		if($_GET['get_menus']==1){
			$get_products=$db->query("SELECT * FROM menu WHERE id%2=0");
		}
		elseif($_GET['get_menus']==2){
			$get_products=$db->query("SELECT * FROM menu WHERE id%2!=0");
		}
		if($get_products){
			$products=array();
			while($row=$get_products->fetch_assoc()){
				$products[]=$row;
			}
			print json_encode([ "products" =>$products], true);
		}else{
			print json_encode(["success" => 0, "msg" => "Product Not Found!","products"=>""]);
		}
	}

	$dump_var= file_get_contents('php://input');
	$post_data=array();
	$post_data=json_decode($dump_var,true);
	if(isset($post_data)){
		$name= $post_data['data']['fullname'];
		$phone= $post_data['data']['phone'];
		$num_item= $post_data['data']['itemnum'];
		$email=$post_data['data']['email'];
		$id=$post_data['data']['id'];
			$get_product=$db->query("SELECT * FROM products WHERE id= '$id' LIMIT 1");
			if ($get_product) {
				if(($get_product->num_rows)>0){
					$product=$get_product->fetch_assoc();
				}else{
						print json_encode(["success" => 0, "msg" => "Product Not Available!"]);
				}
		}
		$product_name=$product['product_name'];
		$product_price=$product['product_price'];
		$order_id= mt_rand(100000000,999999999);
		$query=$db->query("INSERT INTO orders(product_id,orderID,total_items,name,phone_number,email) VALUES ('$id','$order_id','$num_item','$name','$phone','$email')");
		if($query){
			$success=1;
			print json_encode(["response"=>$success]);
			try{

          $mail = new PHPMailer(true);
           $mail->setFrom('info@motreats.ng', 'MoTreatsNG');
                       /* Add a recipient. */
            $mail->addAddress($email, $name);

            

           $mail->wordwrap= 50;
           $mail->IsHTML(true);
            /* Set the subject. */
            $mail->Subject = 'Thanks for your patronage';
            
            /* Message Body Content*/
           
            $message ='
                <p>Your order was received. Find below details of your order</p>
                <p>Order ID: <b>'.$order_id.'</b></p>
                <p>Product ID: '.$id.'</p>
                <p>Product Name: '.$product_name.'</p>
                <p>Product Price:'.$product_price.'</p>
                <p>You will be contacted shortly for confirmation of your order and payment</p>
            ';
			$message = str_replace('{{{body}}}', $message, $template);

            /* Set the mail message body. */
            $mail->Body = $message;
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            
            /* Tells PHPMailer to use SMTP. */
            $mail->isSMTP();
            
            /* SMTP server address. */
            $mail->Host = 'mail.motreats.ng';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;
            
            /* Set the encryption system. */
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            
            
            /* SMTP authentication username. */
            $mail->Username = 'info@motreats.ng';
            
            /* SMTP authentication password. */
            $mail->Password = '#GOODteam';
            
            /* Set the SMTP port. */
            $mail->Port = 465;


            /* Finally send the mail. */
            if (!$mail->send())
            {
            echo $mail->ErrorInfo;
            }else{
                $MsgSuccess = '<p class="alert alert-success">Thank you for signing up to MoTreats.</p>';
            }


        }catch(Exception $ex){
            $MsgSuccess= $ex->errorMessage();
        }
		}else{
			$success= "2";
			print json_encode(["response"=>$success]);
		}
	}
?>