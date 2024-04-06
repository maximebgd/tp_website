
<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include('./includes/public/add_post.php'); ?>
<title>MyWebSite | Contact </title>

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
			<h1 class="content-title" style="text-align: center;">Contact :</h1>
			<hr>

			<form action="" method="post" enctype="multipart/form-data">
				<?php include(ROOT_PATH . '/includes/public/errors.php') ?>
                
                <input type="text" name="username" id="username" placeholder="Votre username" required>
        

				<input type="text" name="topic" id="topic" placeholder="Sujet du contact" required>
                <input type="text" name="body" id="body" placeholder="Votre message" required>

                <button type="submit" class="btn" name="contact_btn">Envoyer ✅</button>
            </form>
		</div>
		<!-- // content -->


	</div>
	<!-- // container -->


	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->