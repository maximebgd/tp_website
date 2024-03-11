<?php

// =======================================================
//    A    L      L           PPPP    OOO    SSS   TTTTT
//   A A   L      L           P   P  O   O  S        T
//  A   A  L      L           P   P  O   O   SSS     T
//  AAAAA  L      L           PPPP   O   O      S    T
//  A   A  L      L           P      O   O      S    T
//  A   A  LLLLL  LLLLL       P       OOO   SSSS     T
// =======================================================
// * * * ALL POST

// Fonction pour récupérer tous les posts "validés" (pushlished=1)
function getPublishedPosts() {
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=1"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    } else { // Si la requête a échoué
        return null; // on retourne false
    }
}


// Fonction pour afficher tous les posts passé en paramètre + les posts en attente de vérification (il faut être log pour voir les posts)
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


// Fonction pour récupérer le topic d'un post
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





// ==========================================================================
//   SSS   III  N   N   GGG   L      EEEEE       PPPP    OOO    SSS   TTTTT
//  S       I   NN  N  G   G  L      E           P   P  O   O  S        T
//   SSS    I   N N N  G      L      EEE         P   P  O   O   SSS     T
//      S   I   N  NN  G  GG  L      E           PPPP   O   O      S    T
//      S   I   N   N  G   G  L      E           P      O   O      S    T
//  SSSS   III  N   N   GGGG  LLLLL  EEEEE       P       OOO   SSSS     T
// ==========================================================================
// * * * SINGLE POST


// Fonction pour récupérer un seul post par son slug
function getPost($slug) {
    global $conn;

    $sql = "SELECT * FROM posts WHERE slug='$slug' LIMIT 1"; // avec published=1 forcément car on a cliqué dessus
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $post = mysqli_fetch_assoc($result); // on récupère les lignes 
        return $post;
    } 
}

function getAllTopics() {
    global $conn;

    $sql = "SELECT * FROM topics"; // requête pour récupérer tous les topics
    $result = mysqli_query($conn, $sql);

    if($result) {
        $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $topics;
    }
}





// ===============================================================================
//  W   W    A    III  TTTTT  III  N   N   GGG        PPPP    OOO    SSS   TTTTT
//  W   W   A A    I     T     I   NN  N  G   G       P   P  O   O  S        T
//  W   W  A   A   I     T     I   N N N  G           P   P  O   O   SSS     T
//  W W W  AAAAA   I     T     I   N  NN  G  GG       PPPP   O   O      S    T
//  W W W  A   A   I     T     I   N   N  G   G       P      O   O      S    T
//   W W   A   A  III    T    III  N   N   GGGG       P       OOO   SSSS     T
// ===============================================================================
// * * * WAITING POST


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


function getRecentPost() {
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=1 ORDER BY created_at DESC LIMIT 6"; // query to get the last 6 posts
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $posts;
    }
}

function printPosts($all_posts) {
    if (isset($_SESSION['user']['username'])) {
        // On affiche les post "valide" un par un
        foreach ($all_posts as $post) {
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
    } else {
        ?>
            <h3 style="text-align: center; color: red"> Il faut vous connecter pour voir les posts ! </h3>
        <?php
    }
}