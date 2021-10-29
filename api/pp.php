<?php
	$template = file_get_contents("template.php");
	use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	require 'db_connection.php';
	 require 'Class/Exception.php';
      require 'Class/PHPMailer.php';  
      require 'Class/SMTP.php';

		$name= "2232";
		$phone= "09022332222";
		$num_item= 2;
		$email="codedlegacy2016@gmail.com";
		$id=1;
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
			echo "1";
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
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            
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
            echo $ex->errorMessage();
        }
		}else{
			echo "2";
		}
?>