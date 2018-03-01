<?php

require_once('phpmailer/PHPMailerAutoload.php');



// Form Processing Messages
$message_success = 'We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.';



$mail = new PHPMailer();

// If you intend you use SMTP, add your SMTP Code after this Line

$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'XYZ@gmail.com';  //your gmail user id
$mail->Password = 'PASSWORD';				//your gmail account password
$mail->SMTPAuth = true;


// details coming from form using post method
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(empty($_POST["email"])){
			echo"<script>window.alert('email required');</script>";
			echo"<script>window.open('../index.html','_self');</script>";
		}
		else{

		$name = $_POST["name"];				//client name who is giving filling form.
		$email = $_POST["email"];	//his gmail id.
		$message =$_POST["message"];	//message 
	//	echo"<script>window.alert('$name,$email,$message');</script>";
		$subject = 'Regarding Queries'; //subject of mail

			$mail->SetFrom( $email , $name );
			$mail->AddReplyTo( $email , $name );
			
				$mail->AddAddress( 'HOSPITAL@gmail.com' ,'CHAIRMEN NAME' ); //hospital or to whom mssg to be sent gmail id and name of chairmen
			
			$mail->Subject = $subject;

			$name = isset($name) ? "Name: $name<br><br>" : '';
			$email = isset($email) ? "Email: $email<br><br>" : '';
			$message = isset($message) ? "Message: $message<br><br>" : '';
			$body = "$name $email $message";
			$mail->MsgHTML( $body );
			$sendEmail = $mail->Send();

			if( $sendEmail == true ){
				echo "window.alert('$message_success')";
				echo "window.open('../index.html','_self')";
			}
			else{
				echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '" }';
			}
			
		}
	}
		
?>