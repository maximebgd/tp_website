<?php include_once('./includes/all_functions.php'); ?>

<nav>
    <a href="index.php">
        <div class="logo">
            <img src="./static/images/logo.png">
            Maxime BEGOUD 
        </div>
    </a>
    <div class="nav-links">
        <?php 
            printNavbarColor(); 
            if(isset($_SESSION['user'])) {
                ?> <a href="logout.php" id="logout">Logout</a> <?php
            }
        ?>
    </div>
</nav>

