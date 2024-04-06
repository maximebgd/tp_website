<?php


// Obtenir toutes les publications de la base de données du blog
/*function getAllPosts() {
    global $conn;
    // ... Fonction nécessite la fonction getPostAuthorById
    // Le code de getPostAuthorById est inclus
    // ... À compléter
    return $posts;
}*/

// Obtenir l'auteur/nom d'utilisateur d'une publication


// Fonction pour récupérer les posts d'un utilisateur via son ID
/*function getPostAuthorById($user_id) {
    global $conn;

    $sql = "SELECT username FROM users WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Retourner le nom d'utilisateur
        return mysqli_fetch_assoc($result)['username'];
    }
}*/

// Fonction pour récupérer le nom d'un utilisateur via son ID
function getAuthorById($user_id) {
    global $conn;

    $sql = "SELECT username FROM users WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Retourner le nom d'utilisateur
        return mysqli_fetch_assoc($result)['username'];
    }
}


// Fonction pour récupérer le topic d'un post donné
function getPostTopic($post) { // Fonction définit aussi dans all_function.php mais c'est pour mieux structurer / séparer le code
    global $conn;

    $id = $post['id']; // pour récupérer la valeur de l'id
    $sql = "SELECT name FROM topics as t, post_topic as pt WHERE pt.topic_id = t.id AND pt.post_id = $id"; // requête pour récupérer tous topics
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $topic = mysqli_fetch_assoc($result); // conversion du résultat en tableau associatif
        return $topic; // on retourne le tableau associatif
    }
}


function update_post()
{
    global $conn;

    if (isset($_GET['published'])) {
        $id = $_GET['published'];
        $sql = "UPDATE posts SET published=1 WHERE id=$id";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = "Post published successfully";
        header('location: posts.php'); // on reste sur la MEME page !
        exit(0);
    } else if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM posts WHERE id=$id";
        mysqli_query($conn, $sql);
        $_SESSION['message'] = "Post deleted successfully";
        header('location: posts.php'); // on reste sur la MEME page !
        exit(0);
    }
}




function getWaitingPost_admin()
{
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=0"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    }
}
function getNbWaitingPost_admin()
{
    global $conn;

    $sql = 'SELECT COUNT(*) AS total FROM posts WHERE published = 0;'; // requête pour récupérer tous les posts en attente de validation
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}

function printWaitingPosts_admin($all_puslished_post)
{
    // On affiche les post "en attente" un par un
    foreach ($all_puslished_post as $post) {
        $image = "../static/images/" . $post['image'];
?>

        <!-- Partie HTML -->
        <div class='post' style="margin-left: 0px;">
            <img src=<?= $image ?> class='post_image' alt="">
            <h3 class="category">
                <?php // On veut afficher le topic du post
                $topic = getPostTopic($post); // on récupère le topic du post
                echo $topic['name']; // on affiche le topic
                ?>
            </h3>
            <div class='post_info'>
                <!-- Affichage du titre et de la date de création -->
                <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Titre :</span> <?= $post['title'] ?> </h3>
                <div class='info'>
                    <span> <?= date("F j, Y ", strtotime($post["created_at"])) ?> </span>
                </div>
                <br>
                <!-- Affichage du contenu -->
                <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Contenu :</span> <?= $post['body'] ?></h3>
                <!-- Affichage des boutons "valider" et "supprimer" -->
                <div class="buttons">
                    <a href="posts.php?publish=<?= $post['id'] ?>"> ✅ </a>
                    <a href="posts.php?delete-post=<?= $post['id'] ?>"> ❌ </a>
                </div>
            </div>
            <br> <br> <br>
        </div>
        <!-- Fin partie HTML -->

    <?php

        update_post();
    }
}


// Fonction pour récupérer tous les pots qui sont publiés (published = 1)
function getPublishedPost_admin()
{
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=1"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    }
}

// Fonction pour récupérer le nombre de posts publiés (published = 1)
function getNbPublishedPost_admin()
{
    global $conn;

    $sql = 'SELECT COUNT(*) AS total FROM posts WHERE published = 1;'; // requête pour récupérer tous les posts publiés
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}

// Fonction pour afficher tous les posts publiés et pouvoir les supprimer
function printPublishedPosts_admin($all_puslished_post)
{
    // On affiche les post "en attente" un par un
    foreach ($all_puslished_post as $post) {
        $image = "../static/images/" . $post['image'];
    ?>

        <!-- Partie HTML -->
        <div class='post' style="margin-left: 0px;">
            <img src=<?= $image ?> class='post_image' alt="">
            <h3 class="category">
                <?php // On veut afficher le topic du post
                $topic = getPostTopic($post); // on récupère le topic du post
                ?>
                <a><?php echo $topic['name']; ?></a>
            </h3>
            <div class='post_info'>
                <!-- Affichage du titre et de la date de création -->
                <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Titre :</span> <?= $post['title'] ?> </h3>
                <div class='info'>
                    <span> <?= date("F j, Y ", strtotime($post["created_at"])) ?> </span>
                </div>
                <br>
                <!-- Affichage du contenu -->
                <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Contenu :</span> <?= $post['body'] ?></h3>
                <!-- Affichage des boutons "valider" et "supprimer" -->
                <div class="buttons">
                    <a href="posts.php?delete=<?= $post['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')"> ❌ </a>
                </div>
            </div>
            <br> <br> <br>
        </div>
        <!-- Fin partie HTML -->

<?php

        update_post();
    }
}
