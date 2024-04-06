<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/includes/admin/head_section.php'); ?>
<?php include(ROOT_PATH . '/includes/admin/add_post_admin.php'); ?>
<title>MyWebSite | Add post </title>

</head>

<body>

	<!-- Header -->
	<?php include(ROOT_PATH . '/includes/admin/header.php') ?>
	<!-- // Header -->

	<div class="container content">
		<!-- Menu -->
		<?php include(ROOT_PATH . '/includes/admin/menu.php') ?>
		<!-- // Menu -->

		<!-- Messages -->
		<?php include(ROOT_PATH . '/includes/public/messages.php') ?>
		<!-- // Messages -->

		<!-- content -->
		<div class="action">
			<h1 class="content-title">Nouveau post :</h1>

			<form action="" method="post" enctype="multipart/form-data">
				<?php include(ROOT_PATH . '/includes/public/errors.php') ?>

				<input type="text" name="title" id="title" placeholder="Titre du post" required>

				<input type="file" name="image" id="image" accept="image/*" required>

				<input type="text" name="topic" id="topic" placeholder="Sujet du post" required>
				<input type="text" name="body" id="body" placeholder="Contenu du post" required>

				<button type="submit" class="btn" name="post_btn">Poster ✅</button>
			</form>
		</div>
		<!-- // content -->


	</div>
	<!-- // container -->