<?php
	if(isset($_POST['txtName']) == null
		|| isset($_POST['message']) == null
	
	)
	{
		echo "Mail sending failure! <br/><br/><a href='http://#'>Go back</a> ";
	}
	else{
	
		//----------------------Email Sending Code Starts Here----------------------------
			
		$mailfrom = "vikasyadav2k@gmail.com";
		$mailto = "yoyovikasdon3@gmail.com";
		$subject = " Enquiry from ".isset($_POST['txtName']);
		$body  = "";
		$body = $body . '<pre><font size="3"><table cellspacing="5" cellpadding="5">					
			<tr><td valign="top"><b>Name</b></td><td>'. isset($_POST['txtName']) .'</td></tr>
			<tr><td valign="top"><b>Email</b></td><td>'. isset($_POST['txtEmail']) .'</td></tr>
			<tr><td valign="top"><b>Subject</b></td><td>'. isset($_POST['subject']) .'</td></tr>
			<tr><td valign="top"><b>Message</b></td><td><pre>'. isset($_POST['message']) .'</pre></td></tr></table>
			
			

		Disclaimer:
		*****************************************************************************
		This email (including any attachments) is intended for the sole use of
		the intended recipient/s and may contain material that is CONFIDENTIAL
		INFORMATION. Any review or reliance by others or copying or distribution
		or forwarding of any or all of the contents in this message is STRICTLY
		PROHIBITED. If you are not the intended recipient, please contact the
		sender by email and delete all copies; your cooperation in this regard
		is appreciated.
		*****************************************************************************		
		</font></pre>';
		
		//error_reporting(E_ALL);
		//error_reporting(E_STRICT);
		//I have enabled SSL in PHP > PHP Extensions > php_openssl
		// must enable the surity fin your gamil account as allow access from other apps
		//date_default_timezone_set('America/Toronto');
		require_once('phpmailer521/class.phpmailer.php');
		
		
		// fix the mail id from which the mails to be send
		//$mailfrom = $_POST['email'];
		
		//$body             = file_get_contents('contents.html');
		//$body             = preg_replace('/[\]/','',$body);
		
		$mail             = new PHPMailer();	
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	
												   // 2 = messages only
		$mail->SMTPAuth   = false;                  // enable SMTP authentication
		$mail->SMTPSecure = false;                 // sets the prefix to the servier
		$mail->SMTPAutoTLS = true;
		
	
		$mail->Host       = "localhost";    // sets the SMTP server
		$mail->Port       = 25;                   // set the SMTP port for the server
		$mail->Username   = "vikasyadav2k@gmail.com";  // username
		$mail->Password   = "studyiitisdream";   // GMAIL password	
		$mail->SetFrom($mailfrom, 'Vikas Yadav');	// you name to be displayed as sender in you account
		$mail->EnableSsl = true;
		$mail->Subject    = $subject;	
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->MsgHTML($body);	
		$mail->AddAddress($mailto);
		//$mail->AddCC("juhi@cosmifie.com");
		//$mail->AddBCC("hemant.bije@gmail.com");
		$mail->AddCC("vikasyadav2k@gmail.com");

		//$mail->AddCC("info@markcomputers.com");
		//$mail->AddReplyTo("name@yourdomain.com","First Last");	
		//$mail->AddAttachment("images/phpmailer.gif");      // attachment

		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
			$err="Mailer Error: " . $mail->ErrorInfo;
			$tourl = $_SERVER['HTTP_REFERER'];
			header("location:$tourl?msg=".$err);
		} 
		else {
		 // echo "Message sent successfully! <br/><br/><a href='http://www.amarintl.net/newsite/Home.html'>Go back</a> ";
		    //echo '<script language="javascript">';
			//echo 'alert("Message Successfully Sent")';
			//echo '</script>';
			
			echo '<script>
			alert("Message Successfully Sent");
			window.location.href="contact.php";
			</script>';

			//$tourl = $_SERVER['HTTP_REFERER'];
			//header("location:$tourl?msg=success");
			
		}
		

	}
	//------------------------Email Sending Code Ends Here-------------------------------------
?>