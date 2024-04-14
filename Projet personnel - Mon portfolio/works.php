<?php include('config.php'); ?>
<?php include 'includes/all_functions.php'; ?>
<?php include('includes/public/head_section.php'); ?>

    <title>Works Page</title>
</head>

<body>

    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
    <!-- // Navbar -->

    <!-- Works -->
    <h1 class="page-title">
        Works
        <?php 
            if(isset($_SESSION['user'])) {
                ?><a class="create" href="new_work.php">Créer un work</a><?php
            }
        ?>
    </h1>
    <div class="featured">

        <?php
            $all_works = getnWorks('work', 5);
            printWorks($all_works);
        ?>
        <p style="text-align: center; margin-top: 40px;"> <?= printnbPageforWork(nbPage(getWorks(), 5));?> </p>
    </div>
    <!-- // Works -->
    

    <!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->

