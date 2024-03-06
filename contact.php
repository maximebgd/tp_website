<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<title>MyWebSite | Home </title>

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
		<div class="content">
			<h1 class="content-title" style="text-align: center;">Contact Administration :</h1>
			<hr>

			<form action="" method="post" enctype="multipart/form-data">
				<?php //include(ROOT_PATH . '/includes/public/errors.php') ?>
                
                <input type="text" name="username" id="username" placeholder="Votre username" required>
                <input type="email" name="email" id="email" placeholder="Email">
                <textarea name="text" id="text" maxlength="500" placeholder="Dites nous votre problème (500 caractères max)" required></textarea>
                
                <button type="submit" class="btn" name="post_btn">Envoyer ✅</button>
            </form>
		</div>
		<!-- // content -->


	</div>
	<!-- // container -->


	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->