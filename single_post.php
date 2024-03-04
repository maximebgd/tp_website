<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include('./includes/public/registration_login.php'); ?>
<title>MyWebSite | Post </title>

</head>

<body>
    <div class="container">

        <!-- Navbar -->
        <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
        <!-- // Navbar -->

        <!-- Banner -->
        <!-- // Banner -->

        <!-- Messages -->
        <?php include(ROOT_PATH . '/includes/public/messages.php'); ?>
        <!-- // Messages -->

        <!-- content -->
        <div class="content">
            <?php
                include(ROOT_PATH . '/includes/all_functions.php');
                $slug = $_GET['post-slug'];

                $single_post = getSinglePost($slug);
                printSinglePost($single_post);
            ?>          
        </div>
    </div>
    <!-- // content -->


    </div>
    <!-- // container -->


    <!-- Footer -->
    <?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
    <!-- // Footer -->