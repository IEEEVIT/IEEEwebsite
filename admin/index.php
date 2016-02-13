<?php
	session_start();	
	$error='';
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Please enter Username and Password";
		}
		else
		{
            require('../connect_db.php');
			$username=$_POST['username'];
			$password=$_POST['password'];
			$username = $conn->real_escape_string($username);
			$password = $conn->real_escape_string($password);
			echo $username;
			echo $password;
			$result = $conn->query("SELECT * FROM login WHERE username='$username';");
			echo "Am here.";
			$arr = $result->fetch_assoc();
            if($arr) {
                if (password_verify($password, $arr['password'])) {
                    $_SESSION['login_user']=$username;
					
                    header("location: admin_panel.php");
                } else {
                    $error = "Wrong Password! Try Again";
                }
            } else {
                $error = "Invalid Username";
            }
			$conn->close($link);
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body>
	<div class="loginForm">
		<h2>Login</h2>
		<form action="" method="POST">
			<input name="username" type="text" placeholder="Username"></br>
			<input name="password" type="password" placeholder="Password"></br>
			<div class="error"><?php echo $error ?></div>
			<input name="submit" type="submit" value="Login">
		</form>
	</div>
</body>
</html>