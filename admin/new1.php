<?php
    require("../connect_db.php");
	$pass_hash=password_hash("nonce",PASSWORD_DEFAULT);
	
	$sql="UPDATE login SET password='".$pass_hash."',username='ieee_admin' WHERE username='admin';";
	$conn->query($sql);
	?>
	