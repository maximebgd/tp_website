<?php include('config.php'); ?>
<?php include 'includes/all_functions.php'; ?>
<?php include('includes/public/head_section.php'); ?>

    <title>Blog Page</title>
</head>

<body>

    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
    <!-- // Navbar -->

    <!-- Blog -->
    <h1 class="page-title">Blog <a class="create" href="new_post.php">Créer un post</a> </h1>
    <div class="content">
        <div class="post-list">

            <?php
                $all_posts = getnPosts('blog', 5);
                printPosts($all_posts);
            ?>
            <p style="text-align: center; margin-top: 40px;"> <?= printnbPageforPost(nbPage(getPosts(), 5));?> </p>
        </div>
    </div>
    <!-- // Blog -->


    
    <!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->


