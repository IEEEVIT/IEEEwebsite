<?php
	$today=intval(date("Ymd"));
    require('connect_database.php');
	$result=mysqli_query($link, "SELECT * FROM sessions");
	$id=array();
	$dates=array();
	while($arr=mysqli_fetch_array($result,MYSQLI_ASSOC))
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
		
	function getRating($sessionId){
        require('connect_database.php');
		$result=mysqli_query($link, "SELECT rating FROM sessions WHERE ID='$sessionId'");
		$arr=mysqli_fetch_array($result);
		$rate=$arr['rating'];
		return(floatval($rate));
	}
	function getFollowers($sessionId){
        require('connect_database.php');
		$result=mysqli_query($link, "SELECT followers FROM sessions WHERE ID='$sessionId'");
		$arr=mysqli_fetch_array($result);
		$foll=$arr['followers'];
		return(intval($foll));
	}
	if(isset($_POST['sId']) && isset($_POST['rate'])) {
        require('connect_database.php');
		$getID = $_POST['sId'];
		$result = mysqli_query($link, "SELECT rating, totalratings FROM sessions WHERE id='$getID'");
		$arr = mysqli_fetch_array($result);
		$oldRating = floatval($arr['rating']);
		$currRating = floatval($_POST['rate']);
		$totalratings = intval($arr['totalratings']);	
		$newRating = (($oldRating*$totalratings + $currRating)/($totalratings+1));
		$upd = mysqli_query($link, "UPDATE sessions SET rating='$newRating', totalratings=totalratings+1 WHERE id='$getID'");	
	}
	if(isset($_POST['idd'])) {
        require('connect_database.php');
		$getID = $_REQUEST['idd'];
		$upd = mysqli_query($link, "UPDATE sessions SET followers=followers+1 WHERE id='$getID'");
	}
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
	<link rel="stylesheet" type="text/css" href="css/session-styles.css">
	<!-------------------------------------------------------------------->
	<script src="js/init.js" type="text/javascript"></script>
</head>
<body>
	<div class="banner">
		<a href="index.php"><img src="img/techloop-logo.png" alt="Techloop Logo" class="logo"></a>
	</div>
	<div class="navbar">
		<i class="fa fa-bars menu"></i>
		<img src="img/small-logo.png" alt="Small Logo" class="small-logo">
		<ul class="navlist">
			<li><a href="index.php">Home</a></li>
			<li><a href="sessions.php" class="active">Sessions</a></li>
			<li><a href="registration.php">Take a Session</a></li>
			<li><a href="about.php">About Us</a></li>
		</ul>
		<div class="searchbar">
			<i class="fa fa-search"></i>
			<input type="text" placeholder="Search" class="search">
		</div>
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
			if($current!=$n){
			echo('
			<div class="col nine">
				<h2>Next Session</h2>
			</div>');
            require('connect_database.php');
			$result=mysqli_query($link, "SELECT * FROM sessions where id='$id[$current]'");
			$arr=mysqli_fetch_array($result, MYSQLI_ASSOC);
			$rating = getRating(intval($arr['id']));
			$followers = getFollowers(intval($arr['id']));
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
							'.$arr["date"].'  &nbsp; '.$arr["time"].'
						</p>
						<p class="description">
							<i class="fa fa-info-circle"></i>
							<span>Description:</span>
							 '.$arr["description"].'
						</p>
					</div>
					<div class="col ten offset-2 review">
						<div class="col six">
							<div class="col six groupR">
								<p class="revD1">
									Rating: <span id="ratingS'.intval($arr["id"]).'">'.$rating.'</span>/5
								</p>
							</div>
							<div class="col six groupR">
								<p class="revD2">
									<span id="followersS'.intval($arr["id"]).'">'.$followers.'</span> Followers
								</p>
							</div>
						</div>
						<div class="col six">
							<div class="col six">
								<div class="rating" id="rS'.intval($arr["id"]).'">
									<i class="fa fa-star-o r1" onclick="rate(1,'.intval($arr["id"]).')"></i>
									<i class="fa fa-star-o r2" onclick="rate(2,'.intval($arr["id"]).')"></i>
									<i class="fa fa-star-o r3" onclick="rate(3,'.intval($arr["id"]).')"></i>
									<i class="fa fa-star-o r4" onclick="rate(4,'.intval($arr["id"]).')"></i>
									<i class="fa fa-star-o r5" onclick="rate(5,'.intval($arr["id"]).')"></i>
									<p>Rate Session</p>
								</div>
							</div>
							<div class="col six">
								<button id="followS'.intval($arr["id"]).'" onclick="follow('.intval($arr["id"]).')">Follow</button>
							</div>	
						</div>
					</div>
				</div>	
			</div>');}
		?>
		<div class="col nine">
			<h2>Previous Sessions</h2>
		</div>
		<?php
            require('connect_database.php');
			for($i=$current-1;$i>=0;$i--) {
				$result=mysqli_query($link, "SELECT * FROM sessions WHERE id='$id[$i]'");
				$arr=mysqli_fetch_array($result, MYSQLI_ASSOC);
				$rating = getRating(intval($arr['id']));
				$followers = getFollowers(intval($arr['id']));
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
								'.$arr["date"].' &nbsp; '.$arr["time"].'
							</p>
							<p class="description">
								<i class="fa fa-info-circle"></i>
								<span>Description:</span>
								 '.$arr["description"].'
							</p>
						</div>
						<div class="col ten offset-2 review">
							<div class="col six">
								<div class="col six groupR">
									<p class="revD1">
										Rating: <span id="ratingS'.intval($arr["id"]).'">'.$rating.'</span>/5
									</p>
								</div>
								<div class="col six groupR">
									<p class="revD2">
										<span id="followersS'.intval($arr["id"]).'">'.$followers.'</span> Followers
									</p>
								</div>
							</div>
							<div class="col six">
								<div class="col six">
									<div class="rating" id="rS'.intval($arr["id"]).'">
										<i class="fa fa-star-o r1" onclick="rate(1,'.intval($arr["id"]).')"></i>
										<i class="fa fa-star-o r2" onclick="rate(2,'.intval($arr["id"]).')"></i>
										<i class="fa fa-star-o r3" onclick="rate(3,'.intval($arr["id"]).')"></i>
										<i class="fa fa-star-o r4" onclick="rate(4,'.intval($arr["id"]).')"></i>
										<i class="fa fa-star-o r5" onclick="rate(5,'.intval($arr["id"]).')"></i>
										<p>Rate Session</p>
									</div>
								</div>
								<div class="col six">
									<button id="followS'.intval($arr["id"]).'" onclick="follow('.intval($arr["id"]).')">Follow</button>
								</div>	
							</div>
						</div>');
						if($arr["content"]) {
                            echo('
                                <div class="downloadDiv">
                                    <a href="'.$arr["content"].'" target="_blank" class="download">
                                        <i class="fa fa-download dwnld" id="link'.intval($arr["id"]).'"><div class="hoverText" id="hover'.intval($arr["id"]).'">Download Session Content</div></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                            ');
                        } else {
                            echo('
                                </div>
                            </div>
                            ');
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
<!------------------------------------------------------------------>
<script>
	<?php
		require('connect_database.php');
		$result=mysqli_query($link, "SELECT id FROM sessions");
		while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $array[] = $row;
        }
		$n=mysqli_num_rows($result);
	?>
	$(document).ready(function () {
		var id;
		<?php
			for($i=0; $i<$n; $i++) {
				echo ('
                    $(".session #link'.$array[$i][0].'").mouseenter(function () {
                        $(".session #hover'.$array[$i][0].'").fadeIn("fast");
                    });
                    $(".session #link'.$array[$i][0].'").mouseleave(function () {
                        $(".session #hover'.$array[$i][0].'").fadeOut("fast");
                    });
					$("#rS'.$array[$i][0].'").mouseenter(function () {
						id = "rS'.$array[$i][0].'";
						starRating();
					});
				');
			}
		?>
		function starRating () {
			var r1 = $("#"+id+">.r1");
			var r2 = $("#"+id+">.r2");
			var r3 = $("#"+id+">.r3");
			var r4 = $("#"+id+">.r4");
			var r5 = $("#"+id+">.r5");
			var p = $("#"+id+">p");
			r1.mouseenter(function () {
				r1.removeClass("fa-star-o").addClass("fa-star");
				p.html("Poor");
			});
			r1.mouseleave(function () {
				r1.removeClass("fa-star").addClass("fa-star-o");
				p.html("Rate Session");
			});
			r2.mouseenter(function () {
				$("#"+id+">.r1, #"+id+">.r2").removeClass("fa-star-o").addClass("fa-star");
				p.html("Fair");
			});
			r2.mouseleave(function () {
				$("#"+id+">.r1, #"+id+">.r2").removeClass("fa-star").addClass("fa-star-o");
				p.html("Rate Session");
			});
			r3.mouseenter(function () {
				$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3").removeClass("fa-star-o").addClass("fa-star");
				p.html("Good");
			});
			r3.mouseleave(function () {
				$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3").removeClass("fa-star").addClass("fa-star-o");
				p.html("Rate Session");
			});
			r4.mouseenter(function () {
				$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4").removeClass("fa-star-o").addClass("fa-star");
				p.html("Very Good");
			});
			r4.mouseleave(function () {
				$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4").removeClass("fa-star").addClass("fa-star-o");
				p.html("Rate Session");
			});
			r5.mouseenter(function () {
				$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").removeClass("fa-star-o").addClass("fa-star");
				p.html("Excellent");
			});
			r5.mouseleave(function () {
				$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").removeClass("fa-star").addClass("fa-star-o");
				p.html("Rate Session");
			});
			r1.click(function () {
				rating1();
				store(1);
			});
			r2.click(function () {
				rating2();
				store(2);
			});
			r3.click(function () {
				rating3();
				store(3);
			});
			r4.click(function () {
				rating4();
				store(4);
			});
			r5.click(function () {
				rating5();
				store(5);
			});
		}

		<?php
			for($i=0; $i<$n; $i++) {
				echo('
					var followS'.$array[$i][0].' = localStorage.getItem("followS'.$array[$i][0].'");
					if(followS'.$array[$i][0].'=="true") {
						$("#followS'.$array[$i][0].'").attr("disabled", "disabled");
						$("#followS'.$array[$i][0].'").html("Followed");
					}
					if(localStorage.ratingS'.$array[$i][0].'!=undefined) {
						id = "rS'.$array[$i][0].'";
						switch (localStorage.ratingS'.$array[$i][0].') {
							case "1":
								rating1();
								break;

							case "2":
								rating2();
								break;

							case "3":
								rating3();
								break;

							case "4":
								rating4();
								break;

							case "5":
								rating5();
								break;
						}
					}
				');
			}
		?>
		function rating1 () {
			$("#"+id+">.r1").removeClass("fa-star-o").addClass("fa-star");
			$("#"+id+">p").html("Thank You");
			$("#"+id+", #"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").unbind().css("cursor","default");
		}
		function rating2 () {
			$("#"+id+">.r1, #"+id+">.r2").removeClass("fa-star-o").addClass("fa-star");
			$("#"+id+">p").html("Thank You");
			$("#"+id+", #"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").unbind().css("cursor","default");
		}
		function rating3 () {
			$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3").removeClass("fa-star-o").addClass("fa-star");
			$("#"+id+">p").html("Thank You");
			$("#"+id+", #"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").unbind().css("cursor","default");
		}
		function rating4() {
			$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4").removeClass("fa-star-o").addClass("fa-star");
			$("#"+id+">p").html("Thank You");
			$("#"+id+", #"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").unbind().css("cursor","default");
		}
		function rating5 () {
			$("#"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").removeClass("fa-star-o").addClass("fa-star");
			$("#"+id+">p").html("Thank You");
			$("#"+id+", #"+id+">.r1, #"+id+">.r2, #"+id+">.r3, #"+id+">.r4, #"+id+">.r5").unbind().css("cursor","default");
		}
		function store (rate) {
			switch(id) {
				<?php
					for($i=0; $i<$n; $i++) {
						echo('
							case "rS'.$array[$i][0].'":
								localStorage.ratingS'.$array[$i][0].' = rate;
								break;
						');
					}
				?>
			}
		}
	});
	function rate (a, b) {
		$.post("sessions.php", {rate: a, sId: b});
	}

	function follow (id) {
		$.post("sessions.php", {idd: id});

		switch(id) {
			<?php
				for($i=0; $i<$n; $i++) {
					echo('
						case '.$array[$i][0].':
							$("#followS'.$array[$i][0].'").attr("disabled", "disabled");
							$("#followS'.$array[$i][0].'").html("Followed");
							localStorage.followS'.$array[$i][0].' = true;
							break;
					');
				}
			?>
		}
	}
</script>
</body>
</html>