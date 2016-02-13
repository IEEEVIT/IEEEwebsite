<?php
	session_start();
	if(!isset($_SESSION['login_user'])) {
		header("location: index.php");
	}
	else if ($_SESSION['login_user']!="ieee_admin") {
        header("location: index.php");
    }
	else if(isset($_POST["message"]))
	{
		require("../connect_db.php");
		require("../mail_initiation.php");
		$check=0;
		$err=array();
		$sql="SELECT * FROM mailinglist;";
		if($result=$conn->query($sql))
		{
			$check=$result->num_rows;
			while($row=$result->fetch_assoc())
			{   
		        $to_address=$row["email"];
				$mail->addAddress($to_address);
				
				$subject="IEEE-VIT Updates.";
				$mail->Subject=$subject;
				
				$mail->Body=$_POST["message"];
				
				if($mail->send())
				{
					$check--;
				}
				else
				{
					$err[]=$row["email"];
					include('error.html');
					echo "Error : ".$mail->ErrorInfo;
				}
			}
			
			if($check==0)
			{
				echo "All mails successfully sent.";
			}
			else
			{
				echo "Mails to following people not sent: ";
				foreach($err as $fail)
				echo $fail.", ";
			}
		}
		else
		{
			include("../error.html");
		}
	}
?>
<html>
	<body>
		<a href="logout.php">Log Out</a>
        <a href="admin_panel.php">Dashboard</a>
        <a href="subscribed_users.php" >Subscribed Users</a>
		<a href="send_mail.php" >Send Mail</a>
		<a href="check_contact_messages.php" >Check Contact Messages</a>
		<br />
		<form action="" method="post">
		Message <input type="text" name="message"></input>
		<input type="submit" value="send"></input>
	</body>
</html>