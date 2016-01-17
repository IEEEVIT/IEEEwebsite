<?php
	//slight server-side verification
	if(!(($_POST['firstname']) && ($_POST['lastname']) && ($_POST['email']) && ($_POST['phone']) && ($_POST['regno']) && ($_POST['message'])))
	{
		//Invalid input html code
		echo "Invalid input";
		exit();
	}
	
	#'action' for the form in actual 'contact us' page goes to this.
	require 'connect_db.php';
	
	$firstname=$conn->real_escape_string($_POST['firstname']);
	$lastname=$conn->real_escape_string($_POST['lastname']);
	$email=$conn->real_escape_string($_POST['email']);
	$phone=$conn->real_escape_string($_POST['phone']);
	$regno=$conn->real_escape_string($_POST['regno']);
	$message=$conn->real_escape_string($_POST['message']);
	
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