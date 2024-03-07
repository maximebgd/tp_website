<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/admin/head_section.php'); ?>
<title>Admin | Users</title>
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
		<h1> <p style="text-decoration: underline;"> Liste des utilisateurs </p>
            <span style="font-size: 80%;">
                <span style="color:red">
                    <?php
                        $nb_waintingPost = getNbUsers();
                        echo $nb_waintingPost;
                    ?>
                </span>
                utilisateur.s sont inscrit.s
            </span>
        </h1>
		
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Supprimer</th>
                    <th>Mettre Admin</th>
                    <th>Mettre Author</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    printAllInfoUsers();
                ?>
            </tbody>
        </table>

		<br><br><br>

		<div class="buttons">
			<a href="dashboard.php">Retour au dashboard</a>
		</div>
        
	</div>
</body>

</html>
