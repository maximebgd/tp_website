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
