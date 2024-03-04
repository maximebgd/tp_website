<?php 
function getPublishedPosts() {
    global $conn;
 
    $sql = "SELECT * FROM posts WHERE published=1"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);
    $all_result = mysqli_fetch_all($result, MYSQLI_ASSOC); // $user contient toutes les lignes

    return $all_result; // On retourne le tableau associatif 
}

function printPublishedPosts($all_published_posts) {
    if(isset($_SESSION['user']['username'])) {
        foreach($all_published_posts as $post) {
            printOnePosts($post);
        }
    }
    else {
        ?>
            <h3 style="text-align: center; color: red"> Il faut vous connecter pour voir les posts ! </h3>
        <?php
    }
}

function printOnePosts($post) {
    $image = "../static/images/" . $post['image'];
    ?>

    <!-- Partie HTML -->
    <div class='post' style="margin-left: 0px;">
        <img src=<?= $image ?> class='post_image' alt="">
        <h3 class="category"> 
            <?php 
                $topic = getPostTopic($post);
                echo $topic['name'];
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


function getPostTopic($post){
    global $conn;

    $id = $post['id']; // pour récupérer la valeur de l'id
    $sql = "SELECT name FROM topics as t, post_topic as pt WHERE pt.topic_id = t.id AND pt.post_id = $id"; // requête pour récupérer tous topics
    $result = mysqli_query($conn, $sql);
    $topic = mysqli_fetch_assoc($result); 

    return $topic;
}

// TODO : on peut faire la requête de slug sur le résultat : $all_result
function getSinglePost($post_slug) {
    global $conn;

    $sql = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1"; // avec published=1 forcément car on a cliqué dessus
    $result = mysqli_query($conn, $sql);
    $final = mysqli_fetch_assoc($result);

    return $final;
}

