<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include('./includes/public/registration_login.php'); ?>
<?php include(ROOT_PATH . '/includes/all_functions.php'); ?>
<title>MyWebSite | New </title>

</head>

<body>

	<div class="container">

		<!-- Navbar -->
		<?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
		<!-- // Navbar -->

		<!-- Banner -->
		<?php include(ROOT_PATH . '/includes/public/banner.php'); ?>
		<!-- // Banner -->

		<!-- Messages -->
		<?php include(ROOT_PATH . '/includes/public/messages.php'); ?>
		<!-- // Messages -->

		<!-- content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>


			<?php 
				$recentPost = getRecentPost();
                printPosts($recentPost);
			?>
		</div>
		<!-- // content -->


	</div>
	<!-- // container -->

	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->