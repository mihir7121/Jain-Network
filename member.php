<?php
			if(isset($_POST['member']))
			{
				$name=$_POST['Name'];
				$number=$_POST['Phone'];
				$email=$_POST['Email'];
                $address=$_POST['Address']
				$to = 'sakshii.patil23@gmail.com';
       	 		$from = 'admin@companyaddress.in'; 
        		$subject = 'Enquiry(Contact form)'; 
        		$htmlContent = ' <p><h2>You have  recieved an enquiry.</h2><br>
        		
		          <b>'.$name.' would like to be a member</b><br>
		    	<b>Email id is '.$email.'</b><br>
                <b>Phone number is '.$number.'</b><br>
                <b>Address is '.$address.'</b><br>
		    	<b>THANK YOU!!!</b>		 
				 </p> '; 
              
                    $headers = "From:<".$from.">"; 
                    $semi_rand = md5(time());  
                    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
                    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
                    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
                    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
                    $message .= "--{$mime_boundary}--"; 
                    $returnpath = "-f" . $from; 
                    // Send email 
                    $mail = mail($to, $subject, $message, $headers, $returnpath);  
                    if(!$mail){
                        $_SESSION['formess']="sorry!, some technical Issue Please contact us";
						 echo '<script>location.href="404.html"</script>';		
                    }
                    else
                    {
                       echo '<script>location.href="success.html"</script>';
                    }
                   
				}
				?>