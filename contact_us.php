<?php
	#'action' for the form in actual 'contact us' page goes to this.
	require 'connect_db.php';
	
	$firstname=($_POST['firstname']);
	$lastname=($_POST['lastname']);
	$email=($_POST['email']);
	$phone=($_POST['phone']);
	$regno=($_POST['regno']);
	$message=($_POST['message']);
	
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
	
	$sql="INSERT INTO contactus(firstname,lastname,email,phone,regno,message) VALUES('$firstname','$lastname','$email','$phone','$regno','$message');";
	if($conn->query($sql))
	{
		// The page with 'successfully message sent' html.
		echo "Successful."; //just for verification, will be removed later, when html code for this responce is ready.
	}
	else
	{
		//error report html.
		echo "Some error";
		exit();
	}
	
	$conn->close();
?>