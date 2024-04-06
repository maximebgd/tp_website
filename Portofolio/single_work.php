<?php include('config.php'); ?>
<?php include 'includes/all_functions.php'; ?>
<?php include('includes/public/head_section.php'); ?>

<title>Single Work Page</title>
</head>

<body>

    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
    <!-- // Navbar -->

    <?php 
        $work = getWorkbyName();
        printSingleWork($work);
    ?>


    <!-- Footer -->
    <?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
    <!-- // Footer -->