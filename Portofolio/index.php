<?php include 'config.php'; ?>
<?php include 'includes/all_functions.php'; ?>
<?php include 'includes/public/head_section.php'; ?>

    <title>myWebSite | mbegoud</title>
</head>

<body>

    <div>
        <!-- Navbar -->
        <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
        <!-- // Navbar -->

        <!-- Main -->
        <div class="main">
            <div class="info">
                <?php 
                    if(isset($_SESSION['l']) && $_SESSION['l'] == 'fr') {
                        ?><h1>Bonjour, je suis Maxime BEGOUD, <br> un ingénieur en sécurité informatique.</h1>
                        <p>J'étudie dans l'école d'ingénieur : l'INSA Centre-Val de Loire !</p>
                        <a href="./static/download/mbegoud_cv_fr.pdf"> Voir mon CV 🇫🇷 </a><?php
                    } else if (isset($_SESSION['l']) && $_SESSION['l'] == 'en'){
                        ?><h1>Hello, I'm Maxime BEGOUD, <br> a cybersecurity engineer.</h1>
                        <p>I'm studying in the engineering school : INSA Centre-Val de Loire !</p>
                        <a href="./static/download/mbegoud_cv_en.pdf"> See my CV 🇬🇧 </a><?php
                    }
                ?>
            </div>
            <img src="./static/images/profile-1.png">
        </div>
        <!-- // Main -->

        <!-- Featured Works -->
        <div class="separator" id="work">
            <div class="header">
                <h4>Mes projets</h4> 
                <?php 
                    if(isset($_SESSION['user'])) {
                        ?><a id="new_work" href="new_work.php">Ajouter un projet</a><?php
                    }
                ?>
                <a href="works.php">Tout voir</a>
            </div>
        </div>

        <div class="featured">
            
            <?php
                $all_recent_posts = getFeaturedWorks('home');
                printFeaturedWorks($all_recent_posts);
            ?>

        </div>
        <p style="text-align: center; margin-top: 40px; margin-bottom: 40px;"> <?= printnbPageforFeaturedWorks(nbPage(getWorks(), 2));?> </p>
        <!-- // Featured Works -->

        <!-- Recent Posts -->
        <div class="recent" id="post">
            <div class="header">
                <h4>Post récent</h4> <a id="new_post" href="new_post.php" href="#recent_posts">Créer un post</a>
                <a href="blog.php">Tout voir</a>
            </div>
            <div class="posts">

                <?php
                    $all_recent_posts = getRecentPosts('home');
                    printRecentPosts($all_recent_posts);
                ?>

            </div>
            <p style="text-align: center; margin-top: 50px;"> <?= printnbPageforRecentPosts(nbPage(getPosts(), 2));?> </p>
        </div>
        <!-- // Recent Posts -->
    

    </div>
    
    <!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->