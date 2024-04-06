<?php include 'config.php'; ?>
<?php include 'includes/public/head_section.php'; ?>
<?php include 'includes/all_functions.php'; ?>
<?php include 'includes/public/add_work.php'; ?>

    <title>New Work</title>
</head>

<body>

    <div>
        <!-- Navbar -->
        <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
        <!-- // Navbar -->

        <div style="width: 40%; margin: 20px auto;">
			<form method="post" action="" enctype="multipart/form-data"> // TODO : faire venir sur le post qui vient d'être fait
				<h1 style="text-align: center;">Nouveau work :</h1>

				<input type="text" name="title" id="title" placeholder="Titre du work" required>
                <input type="file" name="image" id="image" accept="image/*" required>
                <br>

                <!-- Sujet du post avec un menu déroulant -->
                <label for="">Le sujet du post  </label>
                <select name="topic" id="topic" onchange="afficherTexteAutre(this)">
                    <?php printMenuDeroulantCreerWork(); ?>
                </select>

                <br>
                <input type="text" name="content" id="content" placeholder="Contenu du post" required>
                

				<button type="submit" class="btn" name="add_post">Poster ✅</button>

			</form>
		</div>

    </div>
    
    <!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->