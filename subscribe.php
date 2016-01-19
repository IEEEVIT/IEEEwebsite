<?php
	if(($_REQUEST['flag']&&$_REQUEST['regno']))
	{
		if($_REQUEST['flag']=="subscribe")
		{
			require 'connect_db.php';
			$regno=$_REQUEST['regno'];
			$sql="UPDATE mailinglist SET status='1' WHERE regno='$regno';";
			if($conn->query($sql))
			{
				//successfully confirmed html code
				echo "Successfully confirmed subscription";
			}
			else
			{
				echo "Some error: ".$conn->error;
				exit();
			}
			$conn->close();
		}
		else if($_REQUEST['flag']=="unsubscribe")
		{
			require 'connect_db.php';
			$regno=$_REQUEST['regno'];
			$sql="DELETE from mailinglist WHERE regno='$regno';";
			if($conn->query($sql))
			{
				//succesfully unsubbed html code
				echo "Successfully unsubscribed.";
			}
			else
			{
				echo "Some error.";
				exit();
			}
			$conn->close();
		}
	}
	else
	{
		//wrong link entered code of html.
		echo "Error with link. PLease recheck.";
		exit();
	}
?>