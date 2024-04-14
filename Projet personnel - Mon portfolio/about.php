<?php include('config.php'); ?>
<?php include('includes/all_functions.php'); ?>
<?php include('includes/public/head_section.php'); ?>

<title>About</title>
</head>

<body>

    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
    <!-- // Navbar -->

    <h1 class="page-title">About</h1>

    <div class="content">
        <div class="container">
            <img src="./static/images/profile-2.png">
            <div class="about">
                <?php
                if (isset($_SESSION['l']) && $_SESSION['l'] == 'fr') {
                ?>
                    <h2>Je suis Maxime BEGOUD</h2>
                    <p>Un étudiant en école d'ingénieur à l'INSA Centre-Val de Loire !</p>
                    <p class="email">Contactez moi : maxime.begoud@insa-cvl.fr</p>
                    <a id="cv_btn" href="./static/download/mbegoud_cv_fr.pdf"> Voir mon CV 🇫🇷 </a>
                    <a style="font-size: 135%" href="mailto:maxime.begoud@insa-cvl.fr">📧</a>
                <?php
                } else if (isset($_SESSION['l']) && $_SESSION['l'] == 'en') {
                ?>
                    <h2>I'm Maxime BEGOUD</h2>
                    <p>A student in engineering school at INSA Centre-Val de Loire!</p>
                    <p class="email">Contact me: maxime.begoud@insa-cvl.fr</p>
                    <a id="cv_btn" href="./static/download/mbegoud_cv_fr.pdf"> See my CV 🇺🇸 </a>
                    <a style="font-size: 135%" href="mailto:maxime.begoud@insa-cvl.fr">📧</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
    <!-- // Footer -->