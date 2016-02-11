<?php
	//'action' of submit for subscribe page leads here
	//This file is responsible to store data with status set to 0 (unconfirmed user), 
	//and then send a confirmation mail to user. Further setting the status bit
	//to 1 (confirmed user) is handled by 'subscribe.php' file
	require 'connect_db.php';
	
	$name=$conn->real_escape_string($_POST['name']);
	$regno=$conn->real_escape_string($_POST['regno']);
	$to_address=$conn->real_escape_string($_POST['email']);
	$phone=$conn->real_escape_string($_POST['phone']);
	
	$sql="CREATE TABLE IF NOT EXISTS `mailinglist` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(30) DEFAULT NULL,
			`regno` varchar(9) DEFAULT NULL,
			`email` varchar(40) DEFAULT NULL,
			`phone` varchar(10) DEFAULT NULL,
			`status` int(11) DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
	$conn->query($sql);
	
	//status bit is defaulted to NULL. only email inserted now. Rest after confirmation is received.
	$sql="INSERT INTO mailinglist(email) VALUES('$to_address');";
	if($conn->query($sql))
	{
		//successfully added in list, with status=0 (unconfirmed)
		
		$confirm_link='<a href="http://localhost/ieee_new_website/subscribe.php?flag=subscribe&regno='.$to_address.'>Confirm</a>';
		$message="<html><body><p> Click confirm to confirm subscription. </p><p>".$confirm_link."</p></body></html>";
		$subject="Subscription Comfirmation";
		
		require 'mail_initiation.php';
		
		$mail->addAddress($to_address);
		$mail->Subject=$subject;
		$mail->Body=$message;
	    if($mail->send())
		{
			//"Email sent, link confirm there to subscribe" html code
			echo "Please confirm subscription.";
		}
		else
		{
			include('error.html');
			echo "Error : ".$mail->ErrorInfo;
		}
	}
	else
	{
		include('error.html');
		echo "Some error";
		exit();
	}
	$conn->close();
?>