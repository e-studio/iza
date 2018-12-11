<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../extensions/phpmailer/src/PHPMailer.php';
require '../extensions/phpmailer/src/SMTP.php';


$order = $_GET["order"];
$name = $_GET["name"];   	//quien modifico la orden
$email = $_GET["email"];	//mail de quien modifica
$author = $_GET["author"];   
$authorEmail = $_GET["authorEmail"];
$subject = 'Order '.$order.' Updated';
$message = '';


$toemails = array();

$toemails[] = array(
				'email' => 'ricky_urbina@yahoo.com', // email de administrador de ordenes vas a informar
				'name' =>  'Jason Sawatzky'// Su nombre
			);


		


// Form Processing Messages
//$message_success = '<strong>Received !!!</strong><br>';


if ($name != $author){
			$mail = new PHPMailer();

			$mail->SetFrom( 'noreply@izadm.com' , 'IZA IT Support' );
			$mail->AddReplyTo( 'noreply@izadm.com' , 'IZA IT Support' );
			foreach( $toemails as $toemail ) {
				$mail->AddAddress( $authorEmail , $author );
			    $mail->AddAddress( $toemail['email'] , $toemail['name'] );
			}

			$mail->Subject = $subject;

			$referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';


			$body = '
			<div style="margin-left:150px; padding:50px;width:600px;">
			<img src="http://www.izadm.com/wp-content/uploads/2018/11/LOGO-22.png" align="left" style="width:188px;height:117px;" alt=""/>
			<table width="600" border="0" cellspacing="10" cellpadding="10">
			  <tbody style="font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif; color:#070C7F; text-align:left">
			    <tr style="background-color:#2D44CA">
			      <td style="color:#FFFFFF; text-align:center"><h1>Order Updated</h1></td>
			    </tr>
			    <tr>
			      <td><h2>The order '.$order.' was updated</h2></td>
			    </tr>
			    <tr>
			      <td><h3>Please contact '.$name.' at '.$email.' or go to <strong>"Orders - Order Alerts"</strong> to see detailed changes.</h3></td>
			    </tr>
			    <tr>
			      <td style="font-size:12px; text-align:center"><p>This is an automated message from IZA Order Control Site<br> Please do not reply to this address.</p></td>
			    </tr>
			  </tbody>
			</table>

			</div>'; 


			$mail->MsgHTML( $body );
			$sendEmail = $mail->Send();

			if( $sendEmail == true ):
				//echo '{ "alert": "success", "message": "' . $message_success.'--' .$name. ' -email- '.$email. ' -Author:- '.$author. ' -Author Email- '.$authorEmail. '" }';
				//echo '<script type="text/javascript">window.location.href = "../index.php?action=ordenes";</script> ';
			else:
				//echo '{ "alert": "error", "message": "Email <strong>could not</strong> be sent due to some Unexpected Error. Please Try Again later.<br /><br /><strong>Reason:</strong><br />' . $mail->ErrorInfo . '<br><br> -Nombre- '.$name. ' -email- '.$email. ' -Author:- '.$author. ' -Author Email- '.$authorEmail.'" }';
			endif;

			//echo $message_success;
			echo '<script type="text/javascript">window.location.href = "../index.php?action=ordenes";</script> ';
}
else{
	//echo 'Mismo destinatario';
	echo '<script type="text/javascript">window.location.href = "../index.php?action=ordenes";</script> ';
}
?>