<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include('./includes/public/registration_login.php'); ?>
<?php 
    include('includes/all_functions.php'); 
    $topic = getTopic($_GET['topic']);
?>

<title> <?php echo $_GET['topic'] ?> | Filtred posts </title>

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
			<h2 class="content-title">Article de : <?= $_GET['topic']?></h2>
			<hr>

			<?php 
                // On appel la fonction : 
				$publishedPosts = getPublishedPostsByTopic($topic['id']);
                if($publishedPosts != null) { 
                    printPosts($publishedPosts);
                }
                if(count($publishedPosts) == 0) {
                    echo "<h2 style='text-align:center;'>Aucun article pour ce topic</h2>";
                }
				
			?>
		</div>
		<!-- // content -->

	</div>
	<!-- // container -->

	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->