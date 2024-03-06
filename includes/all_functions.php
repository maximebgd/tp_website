<?php
function getPublishedPosts() {
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=1"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    } else { // Si la requête a échoué
        return false; // on retourne false
    }
}

function printPublishedPosts($all_published_posts) {
    if (isset($_SESSION['user']['username'])) {
        ?>
            <div class='post_btn'>
                <a href="create_post.php" class="btn"> Poster un post </a>
                <hr>
            </div>
        <?php

        // On affiche les post "valide" un par un
        foreach ($all_published_posts as $post) {
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
                        <h3> <?= $post['title'] ?> </h3>
                        <div class='info'>
                            <span> <?= date("F j, Y ", strtotime($post["created_at"])) ?> </span>
                            <span class="read_more"> <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>"> Read more... </a></span>
                        </div>
                    </div>
                </div>
                <!-- Fin partie HTML -->

            <?php
        }
        ?>
        
        <div style="clear: both;">
            <br>
            <h2 class="content-title" style="display: block; text-align: left;">Post.s en attente de vérification</h2>
            <hr>
        </div>

        <?php
            printWaitingPosts(getWaitingPost());
    } else {
        ?>
            <h3 style="text-align: center; color: red"> Il faut vous connecter pour voir les posts ! </h3>
        <?php
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

function getSinglePost($post_slug) {
    global $conn;

    $sql = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1"; // avec published=1 forcément car on a cliqué dessus
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $post = mysqli_fetch_assoc($result);
        return $post;
    } 
}

function printSinglePost($post) {
    global $conn;

    ?>
    <div class="content">
        <div class="post-wrapper">
            <div class="full-post-div">
                 <!-- On affiche le titre du post -->
                <h2 class="post-title">
                    <span style="text-decoration: underline"> Titre :</span>
                    <?= $post['title'] ?> 
                </h2>
                
                <!-- On affiche le contenu du post -->
                <h3 class="post-body-div"> <?= $post['body'] ?> </h3> 
            </div>
        </div>  
        
        <!-- On affiche le topic du post à droite -->
        <div class="post-sidebar">
            <div class="card">
                <div class="card-header">
                    <h2> Topics </h2>
                </div>
                <h2>
                    <?php
                        $topic = getPostTopic($post);
                        echo $topic['name'];
                    ?>
                </h2>
            </div>
        </div>
    </div>
    <?php 
}

function getNbWaitingPost() {
    global $conn;

    $user_id = $_SESSION['user']['id']; // récupérer l'id de l'utilisateur connecté
    $sql = "SELECT * FROM posts 
        INNER JOIN users ON posts.user_id = users.id 
        WHERE users.id = $user_id AND posts.published = 0"; // requête pour récupérer le nombre de posts en attente de l'utilisateur

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        return $num;
    }
}

function getWaitingPost() {
    global $conn;

    $user_id = $_SESSION['user']['id']; // récupérer l'id de l'utilisateur connecté
    $sql = "SELECT * FROM posts WHERE published=0 AND user_id=$user_id"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
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
                    <h3> <?= $post['title'] ?> </h3>
                    <div class='info'>
                        <span> <?= date("F j, Y ", strtotime($post["created_at"])) ?> </span>
                        <span class="read_more"> <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>"> Read more... </a></span>
                    </div>
                </div>
            </div>
            <!-- Fin partie HTML -->


        <?php
    }
}


function loadContactPage() {
    // Récupérer l'URL actuelle avec le fragment
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo "". $current_url ."";

    // Vérifier si la clé 'QUERY_STRING' existe dans le tableau $_SERVER
    if (array_key_exists('QUERY_STRING', $_SERVER)) {
        // Si la clé 'QUERY_STRING' existe, afficher la valeur associée
        echo "QUERY_STRING: " . $_SERVER['QUERY_STRING'] . "<br>";
    } else {
        // Si la clé 'QUERY_STRING' n'existe pas, afficher un message
        echo "QUERY_STRING does not exist";
    }
}


