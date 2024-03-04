<?php 

// Fonction pour calculer le nombre de nouveau utilisateurs inscrits
function getNewUsers() {
    global $conn;

    $sql = "SELECT COUNT(*) AS total FROM users WHERE role = 'Author' AND DATEDIFF(NOW(), created_at) <= 10;"; // requête pour récupérer tous les utilisateurs
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}

function getPostTopic($post) {
    global $conn;

    $id = $post['id']; // pour récupérer la valeur de l'id
    $sql = "SELECT name FROM topics as t, post_topic as pt WHERE pt.topic_id = t.id AND pt.post_id = $id"; // requête pour récupérer tous topics
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $topic = mysqli_fetch_assoc($result); // conversion du résultat en tableau associatif
        return $topic; // on retourne le tableau associatif
    } 
}

function add_delete_post() {
    global $conn;

    if(isset($_GET['publish'])) {
        $id = $_GET['publish'];
        $sql = "UPDATE posts SET published=1 WHERE id=$id";
        mysqli_query($conn, $sql);
        //header('location: posts.php');
    }
    else if (isset($_GET['delete-post'])) {
        $id = $_GET['delete-post'];
        $sql = "DELETE FROM posts WHERE id=$id";
        mysqli_query($conn, $sql);
        //header('location: posts.php');
    }
    else if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "UPDATE posts SET published=0 WHERE id=$id";
        mysqli_query($conn, $sql);
        //header('location: posts.php');
    }
}


// Fonction pour calculer le nombre de commentaires publiés
// comment ça marche ?


function getWaitingPost() {
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=0"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    } 
}
function getNbWaitingPost() {
    global $conn;

    $sql = 'SELECT COUNT(*) AS total FROM posts WHERE published = 0;'; // requête pour récupérer tous les posts en attente de validation
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}

function printWaitingPosts($all_puslished_post) {
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
    }
}
add_delete_post();




function getPublishedPost() {
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=1"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    } 
}
function getNbPublishedPost() {
    global $conn;

    $sql = 'SELECT COUNT(*) AS total FROM posts WHERE published = 1;'; // requête pour récupérer tous les posts publiés
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    else {
        return false;
    }
}

function printPublishedPosts($all_puslished_post) {
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
                        <a href="posts.php?delete=<?= $post['id'] ?>"> ❌ </a>
                    </div>
                </div>
                <br> <br> <br>
            </div>
            <!-- Fin partie HTML -->

        <?php
    }
}
add_delete_post();