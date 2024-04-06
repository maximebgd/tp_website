<?php include 'config.php'; ?>
<?php include 'includes/all_functions.php'; ?>
<?php include 'includes/public/head_section.php'; ?>
<?php include 'includes/public/add_post.php'; ?>

<title>New Post</title>
</head>

<body>

    <div>
        <!-- Navbar -->
        <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
        <!-- // Navbar -->

        <div style="width: 40%; margin: 20px auto;">
            <form method="post" action="" style="margin-top: 120px;"> <!-- // TODO : faire venir sur le post qui vient d'être fait -->
				<h1 style=" text-align: center;">Nouveau post :</h1>

                <input type="text" name="title" id="title" placeholder="Nom du post" required>
                <input type="text" name="user_name" id="user_name" placeholder="Votre nom et/ou prénom et/ou nom d'entreprise" required>

                <!-- Sujet du post avec un menu déroulant -->
                <br>
                <label >Quel travail commenter ? </label>
                <select name="topic" id="topic" required>
                    <?php printMenuDeroulantCreerPost(); ?>
                </select>

                <div id="saisieAutre" style="display: none;">
                    <input type="text" name="autre" id="autre" placeholder="Nouveau sujet">
                </div>

                <br>
                <input type="text" name="content" id="content" placeholder="Contenu du post" required>

                <button type="submit" class="btn" name="add_post">Poster ✅</button>
            </form>
        </div>

    </div>

    <!-- Footer -->
    <?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
    <!-- // Footer -->