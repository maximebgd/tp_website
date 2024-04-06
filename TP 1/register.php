<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include('./includes/public/registration_login.php'); ?>
<title>MyWebSite | Register </title>

</head>

<body>
	<div class="container">

		<!-- Navbar -->
		<?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
		<!-- // Navbar -->

		<!-- Banner -->

		<!-- // Banner -->

		<!-- Messages -->
		<?php include(ROOT_PATH . '/includes/public/messages.php'); ?>
		<!-- // Messages -->

		<!-- content -->
		<div class="register_div" style="width: 40%; margin: 20px auto;">
            <form action="" method="post">
                
                <h2>Register on MyWesSite</h2>
                <?php include(ROOT_PATH . '/includes/public/errors.php') ?>
                
                <input type="text" name="username" id="username" placeholder="Username">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <input type="password" name="password_confirm" id="password_confirm" placeholder="Password confirmation">
                <button type="submit" class="btn" name="register_btn">Register</button>
            
                <h3>Already a member ? <a href="login.php">Sign in</a></h3>
            </form>
        </div>
		<!-- // content -->


	</div>
	<!-- // container -->


	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->