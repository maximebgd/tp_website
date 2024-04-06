<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/admin/post_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/admin/head_section.php'); ?>

<?php
$waiting_post = getWaitingPost_admin();
?>

<title>Admin | Add-Remove Posts</title>
</head>

<body>
    <!-- admin navbar -->
    <?php include(ROOT_PATH . '/includes/admin/header.php') ?>
    <div class="container content">
        <!-- Left side menu -->
        <?php include(ROOT_PATH . '/includes/admin/menu.php') ?>

        <!-- Display records from DB-->
        <div class="table-div">

            <!-- Display notification message -->
            <?php include(ROOT_PATH . '/includes/public/messages.php') ?>

            <?php if (empty($waiting_post)) : ?>
                <h1>No waiting post in the database.</h1>
                <?= count($waiting_post) ?>
            <?php else : ?>
                <table class="table">
                    <thead>
                        <th>N</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Views</th>
                        <th>Publish</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>

                    <tbody>
                        <?php foreach ($waiting_post as $key => $wpost) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php 
                                    $author = getAuthorById($wpost['user_id']);
                                    echo $author; 
                                    ?>
                                </td>
                                <td>
                                    <a href="http://localhost:2024/single_post.php?post-slug=<?= $wpost['slug'] ?>"> <?= $wpost['title'] ?> </a>
                                </td>
                                <td><?php echo $wpost['views']; ?></td>
                                <td> <!-- Publish -->
                                    <a class="fa fa-check btn" style="background: green;" href="posts.php?published=<?php echo $wpost['id'] ?>"> </a>
                                </td>
                                <td> <!-- Edit -->
                                    <a class="fa fa-pencil btn edit" href="create_post.php?edit-post=<?php echo $wpost['id'] ?>"> </a>
                                </td>
                                <td> <!-- Delete -->
                                    <a class="fa fa-trash btn delete" href="posts.php?delete=<?php echo $wpost['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')"> </a>
                                </td>
                            </tr>

                            <?php update_post(); ?>

                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>
        <!-- // Display records from DB -->
    </div>

</body>

<body>
    <div class="container dashboard">
        <h1> <!-- Titre de la page -->
            <p style="text-decoration: underline;"> Suppression de post en ligne </p>
            <span style="font-size: 80%;">
                <span style="color:red">
                    <?php
                    $nb_waintingPost = getNbPublishedPost_admin();
                    echo $nb_waintingPost;
                    ?>
                </span>
                post.s mis en ligne
            </span>
        </h1>

        <div class="container"> <!-- Conteneur pour les posts -->
            <div class="content">
                <?php
                    $PuslishedPosts = getPublishedPost_admin();
                    if ($PuslishedPosts) {
                        printPublishedPosts_admin($PuslishedPosts); // On affiche les posts "validé"
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