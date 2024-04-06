<?php include('config.php'); ?>
<?php include 'includes/all_functions.php'; ?>
<?php include('includes/public/head_section.php'); ?>
<?php include('includes/public/registration_login.php'); ?>

	<title> Login </title>
</head>

<body>

	<div class="container">

		<!-- Navbar -->
		<?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
		<!-- // Navbar -->
        
		<div style="width: 40%; margin: 20px auto;">
			<form method="post" action="login.php" style="margin-top: 100px;">
				<h2>Login au dashboard des administrateurs</h2>

				<?php include(ROOT_PATH . '/includes/public/errors.php'); ?>
				<input type="password" name="password" value="" placeholder="Password">
				<button type="submit" class="btn" name="login_btn">Login</button>
			</form>
		</div>

	</div>
	<!-- // content -->

	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->