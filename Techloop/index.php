<?php
	$today=intval(date("Ymd"));
	require('connect_database.php');
	$result=mysqli_query($link, "SELECT * FROM sessions");
	$id=array();
	$dates=array();
	while($arr=mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		array_push($id,intval($arr['id']));
		$dateInput = explode('/',$arr['date']);
		$newDate = $dateInput[2].$dateInput[1].$dateInput[0];
		array_push($dates,intval($newDate));
	}
	$n=count($dates);
	for($i=1;$i<$n;$i++)
	{
		$temp=$dates[$i];
		$temp1=$id[$i];
		$j=$i-1;
		while(@($temp<$dates[$j])&&($j>=0)){
			$dates[$j+1]=$dates[$j];
			$id[$j+1]=$id[$j];
			$j--;
		}
		$dates[$j+1]=$temp;
		$id[$j+1]=$temp1;
	}
	for($i=0;@($today>$dates[$i]&&($i<$n)) ;$i++);
	$prev=$i-1;
	$current=$i;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" class="no-js">
<head>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="IEEE-2013">
	<meta name="description" content="Techloop is an initiative launched by IEEE-VIT Students Chapter to promote and encourage Technical Speaking in VIT University.">
	<meta name="keywords" content="Techloop, IEEE, VIT, Vellore, Students, Workshops">
	<title>Techloop | IEEE-VIT</title>
	<link rel="icon" href="img/favicon.png">
	<!-----------------------------Stylesheets---------------------------->
	<link rel="stylesheet" type="text/css" href="css/default-styles.css">
	<link rel="stylesheet" type="text/css" href="bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/site-styles.css">
	<link rel="stylesheet" type="text/css" href="css/index-styles.css">
	<!-------------------------------------------------------------------->
	<script src="js/init.js" type="text/javascript"></script>
    <script type='text/javascript' src='bower_components/query-loader/queryloader2.min.js'></script>
</head>
<body>
    <div id="qLoverlay"></div>
	<div class="banner">
		<a href="index.php"><img src="img/techloop-logo.png" alt="Techloop Logo" class="logo"></a>
	</div>
	<div class="navbar">
		<i class="fa fa-bars menu"></i>
		<img src="img/small-logo.png" alt="Small Logo" class="small-logo">
		<ul class="navlist">
			<li><a href="index.php" class="active">Home</a></li>
			<li><a href="sessions.php">Sessions</a></li>
			<li><a href="registration.php">Take a Session</a></li>
			<li><a href="about.php">About Us</a></li>
		</ul>
		<div class="searchbar">
			<i class="fa fa-search"></i>
			<input type="text" placeholder="Search" class="search">
		</div>
	</div>
	<div class="carousel">
		<div class="image" id="one"><p class="lines">Express Yourself</p></div>
		<div class="image" id="two"><p class="lines">Mesmerize Them</p></div>
		<div class="image" id="three"><p class="lines">Be The One On The Stage</p></div>
		<div class="image" id="four"><p class="lines">Share The Knowledge</p></div>	
	</div>
	<div class="row">
		<div class="col three">
			<div class="takeS">
				<a href="registration.php">
					<img src="img/speakerposter.png" alt="Take a Session Poster">
			 		<h2>Register Now</h2>
				</a>
			</div>
            <div class="subscribe">
                <h2>Subscribe</h2>
                <p>to receive regular updates by email</p>
                <div class = "subscribeInput">
                    <i class = "fa fa-user"></i>
                    <input type = "text" id = "subscriberName" placeholder = "Your Name"/>
                </div>
                <div class = "subscribeInput">
                    <i class = "fa fa-envelope"></i>
                    <input type = "text" id = "subscriberEmail" placeholder = "Your E-Mail ID"/>
                </div>
                <button class = "submitSubscriber"><i class = "fa fa-chevron-right"></i></button>
                <p class = "subscriberFeedback"></p>
            </div>
		</div>
		<?php
			$flag = false;
			if($current!=$n){
				echo('
				<div class="col nine">
					<h2>Next Session</h2>
				</div>');
                require('connect_database.php');
				$result=mysqli_query($link, "SELECT * FROM sessions where id='$id[$current]'");
				$arr=mysqli_fetch_array($result,MYSQLI_ASSOC);
					echo('
				<div class="col nine">
					<div class="session clearfix">
						<div class="col two"><img src="'.$arr['poster'].'" alt="Session Poster"></div>
						<div class="col ten">
							<h2 class="title">'.$arr["Title"].'</h2>
							<p class="speaker">
								<i class="fa fa-user"></i>
								<span>Speaker:</span>
								'.$arr["speaker"].'
							</p>
							<p class="where">
								<i class="fa fa-location-arrow"></i>
								<span>Where:</span>
								'.$arr["venue"].'
							</p>
							<p class="when">
								<i class="fa fa-clock-o"></i>
								<span>When:</span>
								'.$arr["date"].' &nbsp '.$arr["time"].'
							</p>
							<p class="description">
								<i class="fa fa-info-circle"></i>
								<span>Description:</span>
								 '.$arr["description"].'
							</p>
						</div>
					</div>	
				</div>');
				$flag = true;
			}
			echo('
			<div class="col nine">
				<h2>Previous Sessions</h2>
			</div>');
			if($flag) {
				$count = 1;
			} else {
				$count = 2;
			}
			for($i=$current-1; $i>=0; $i--)
			{
				$result=mysqli_query($link, "SELECT * FROM sessions WHERE id='$id[$i]'");
				$arr=mysqli_fetch_array($result,MYSQLI_ASSOC);
				echo('
				<div class="col nine">
					<div class="session clearfix">
						<div class="col two"><img src="'.$arr["poster"].'" alt="Session Poster"></div>
						<div class="col ten">
							<h2 class="title">'.$arr["Title"].'</h2>
							<p class="speaker">
								<i class="fa fa-user"></i>
								<span>Speaker:</span>
								'.$arr["speaker"].'
							</p>
							<p class="where">
								<i class="fa fa-location-arrow"></i>
								<span>Where:</span>
								'.$arr["venue"].'
							</p>
							<p class="when">
								<i class="fa fa-clock-o"></i>
								<span>When:</span>
								'.$arr["date"].' &nbsp '.$arr["time"].'
							</p>
							<p class="description">
								<i class="fa fa-info-circle"></i>
								<span>Description:</span>
								 '.$arr["description"].'
							</p>
						</div>
					</div>	
				</div>');
				$count--;
				if($count==0) {
					break;
				}
			}
		?>
	</div>
	<div class="footer row">
		<div class="col six contactUs">
			<p>Contact Us</p>
			<div class="icons">
				<a href="https://www.facebook.com/Techloop.in" target="_blank" class="fb"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank" class="twit"><i class="fa fa-twitter"></i></a>
				<a href="https://plus.google.com/111989802299294396894/posts" target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a>
			</div>
		</div>
		<div class="col six footerLogo">
			<p class="initiative">An Initiative by</p>
			<a href="http://www.ieeevit.com/" target="_blank" class="ieee-logo"><img src="img/ieee-logo.png" alt="IEEE-Logo"></a>
		</div>
		<div class="col twelve copyright">
			<p>&copy; 2014 Copyright, IEEE VIT</p>
		</div>
	</div>

    <div class="dialog-box-container">
        <div class="dialog-box-shade"></div>
        <div class="dialog-box">
            <h2>Thanks for subscribing!</h2>
            <p>Please confirm your email id with confirmation link sent to your mail. This mail may go to your spam folder because of some technical reasons. If it is in spam folder then report not as spam.</p>
            <div class="close-button">Close</div>
        </div>
    </div>

<!--------------------------Scripts--------------------------------->
<script src="bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="js/site-js.js" type="text/javascript"></script>
<script src="js/index-js.js" type="text/javascript"></script>
<!------------------------------------------------------------------>
</body>
</html>