<?php
	#'action' for the form in actual 'contact us' page goes to this.
	require 'connect_db.php';
	
	$fisrtname=real_escape_string($_POST['fname']);
	$lastname=real_escape_string($_POST['lname']);
	$email=real_escape_string($_POST['email']);
	$phone=real_escape_string($_POST['phone']);
	$regno=real_escape_string($_POST['regno']);
	$message=real_escape_string($_POST['message']);
	
	$sql="CREATE TABLE IF NOT EXISTS `contactus` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `firstname` varchar(15) DEFAULT NULL,
		  `lastname` varchar(30) DEFAULT NULL,
		  `email` varchar(40) DEFAULT NULL,
		  `phone` varchar(10) DEFAULT NULL,
		  `regno` varchar(9) DEFAULT NULL,
		  `message` text,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
	
	if(!$conn->query($sql))
	{
		//The error report html.
		echo "Some error";
		exit();
	}
	
	$sql="INSERT INTO contactus (firstname,lastname,email,phone,regno,message) VALUES('$firstname','$lastname','$email','$phone','$regno','$message');";
	if($conn->query($sql))
	{
		// The page with 'successfully message sent' html.
	}
	else
	{
		//error report html.
		echo "Some error";
		exit();
	}
	
	$conn->close();
?>