<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/admin/head_section.php'); ?>
<title>Admin | Dashboard</title>
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
		<h1>Bienvenue dans le dashboard</h1>
		<div class="stats">
			<a href="users.php" class="first">
				<span>
					<?php
						$nb_member = getNewUsers();
						echo $nb_member;
					?>
				</span> <br>
				<span>Newly registered users</span>
			</a>
			<a href="posts.php">
				<span>
					<?php 
						$nb_post = getNbPublishedPost();
						echo $nb_post;
					?>
				Published posts</span>
				<br>
				<span>
					<?php 
						$nb_waiting_post = getNbWaitingPost();
						echo $nb_waiting_post;
					?>
				Waiting posts</span>
			</a>
			<a>
				<span>z</span> <br>
				<span>Published comments</span>
			</a>
		</div>

		<br><br><br>

		<div class="buttons">
			<a href="users.php">Add Users</a>
			<a href="posts.php">Add Posts</a>
		</div>
		
	</div>
</body>

</html>
