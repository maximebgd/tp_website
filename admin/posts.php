<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/admin/head_section.php'); ?>
<title>Admin | Add-Remove Posts</title>
</head>

<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">
				<h1>MyWebSite - Admin</h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])) : ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?> |</span> &nbsp; &nbsp;
				<a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">Logout</a>
			</div>
		<?php endif ?>
	</div>
	<div class="container dashboard">
		<h1> <p style="text-decoration: underline;"> Ajout de post </p>
            <span style="font-size: 80%;">
                <span style="color:red">
                    <?php
                        $nb_waintingPost = getNbWaitingPost();
                        echo $nb_waintingPost;
                    ?>
                </span>
                post.s en attente de confirmation
            </span>
        </h1>
		
        <div class="container">
            <div class="content">
                <?php 
                    $WaitingPosts = getWaitingPost();
                    if($WaitingPosts) { 
                        printWaitingPosts($WaitingPosts); // On affiche les posts "validé"
                    }
                ?>
            </div>
        </div>

		<br><br><br>

		<div class="buttons">
			<a href="dashboard.php">Retour au dashboard</a>
		</div>
        
	</div>

    <div class="container dashboard">
		<h1> <p style="text-decoration: underline;"> Suppression de post en ligne </p>
            <span style="font-size: 80%;">
                <span style="color:red">
                    <?php
                        $nb_waintingPost = getNbPublishedPost();
                        echo $nb_waintingPost;
                    ?>
                </span>
                post.s mis en ligne
            </span>
        </h1>
		
        <div class="container">
            <div class="content">
                <?php 
                    $PuslishedPosts = getPublishedPost();
                    if($PuslishedPosts) { 
                        printPublishedPosts($PuslishedPosts); // On affiche les posts "validé"
                    }
                ?>
            </div>
        </div>

		<br><br><br>

		<div class="buttons">
			<a href="dashboard.php">Retour au dashboard</a>
		</div>

	</div>

</body>

</html>
