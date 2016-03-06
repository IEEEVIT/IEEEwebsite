<!DOCTYPE HTML>
<html>
<head>
    <title>IEEE VIT | SPAx</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lte IE 8]>
    <script src="assets/js/ie/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="assets/css/main.css"/>
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ie9.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="assets/css/ie8.css"/>
    <![endif]-->
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="index.php">IEEE VIT</a></h1>
    </header>

    <!-- Wrapper -->
    <section id="wrapper">
        <header>
            <div class="inner">
                <h2>Subscribe</h2>
                <p>We need few more details before we subscribe you.</p>
            </div>
        </header>

        <!-- Content -->
        <div class="wrapper">
            <div class="inner">
                <form method="post" action="mailing_list.php">
                    <div class="field">
                        <input type="text" name="name" placeholder="Your Name..." >
                    </div>
                    <div class="field">
                        <input type="text" name="regno" placeholder="Your Registration number..." >
                    </div>
                    <input type="hidden" name="email" value="<?php echo $_POST["maillist"] ?>" >
                    <div class="field">
                        <input type="text" name="phone" placeholder="Your Phone..." >
                    </div>
                    <ul class="actions">
                        <li><input type="submit" name="submit" value="Subscribe!"></li>
                    </ul>
                </form>
            </div>
        </div>
    </section>

</div>

<!-- Scripts -->
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]>
<script src="assets/js/ie/respond.min.js"></script>
<![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>