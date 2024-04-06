<?php

$errors = array();
$title = "";
$slug = "";
$body = "";
$image = "";

if(isset($_POST["post_btn"])) {
    $title = esc($_POST["title"]);
    $slug = slugTransformText($title);
    $body = esc($_POST["body"]);
    
    // Vérifier si un fichier a été téléchargé avec succès
    if(isset($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"]; // récupère le nom de l'image
        //print_r("Nom de l'image : " . $image); // DEBUG
    }
    else if ($_FILES["image"]["error"] > 0) {
        array_push($errors, "Erreur lors du téléchargement du fichier : " . $_FILES["image"]["error"]);
        //print_r("Attention, il y a une erreur ! "); // DEBUG
    }

    $topic = esc($_POST["topic"]);
    
    // On vérifie que les champs ne sont pas vides
    if(empty($title)) array_push($errors, "Title required");
    if(empty($topic)) array_push($errors, "Topic required");
    if(empty($body)) array_push($errors, "Body required");
    
    // Si on a aucune erreur
    if (empty($errors)) {
        // Insertion dans la table posts
        $sql_insert_post = "INSERT INTO posts (user_id, title, slug, views, image, body, published, created_at, updated_at) VALUES ('{$_SESSION['user']['id']}', '$title', '$slug', 0, '$image', '$body', 1, NOW(), NOW())";
        $result_insert_post = mysqli_query($conn, $sql_insert_post);

        $sql_search_topic = "SELECT * FROM topics WHERE name='$topic'";
        $result_search_topic = mysqli_query($conn, $sql_search_topic);
        $find = mysqli_fetch_array($result_search_topic);

        if(empty($find)) { // C'est un nouveau topic, on doit le créer. Sinon on fait rien
            $slug_topic = slugTransformText($topic);

            // On retrouve le dernier ID de la table topics (car les ID sont pas auto-incrémentés)
            $sql_last_topic_id = "SELECT id FROM topics ORDER BY id DESC LIMIT 1";
            $result_last_topic_id = mysqli_query($conn, $sql_last_topic_id);
            $last_topic_id = mysqli_fetch_assoc($result_last_topic_id)['id'];

            // On incrémente le nouvel ID de 1
            $new_topic_id = $last_topic_id + 1;

            // On insère le nouveau topic
            $sql_insert_topic = "INSERT INTO topics (id, name, slug) VALUES ('$new_topic_id', '$topic', '$slug_topic')";
            $result_insert_topic = mysqli_query($conn, $sql_insert_topic);
            //print_r("Nouveau topic créé ! \n"); // DEBUG
        }

        // Ajout de la relation entre le post et le topic
        // On cherche l'id du post 
        $sql_post_id = "SELECT * FROM posts WHERE slug='$slug'";
        $result_post_id = mysqli_query($conn, $sql_post_id);   
        $result_post_id_array = mysqli_fetch_assoc($result_post_id);
        $post_id = $result_post_id_array["id"];
        //print_r("ID du post : " . $post_id . "\n"); // DEBUG

        // On cherche l'id du topic
        $sql_topic_id = "SELECT * FROM topics WHERE name='$topic'";
        $result_topic_id = mysqli_query($conn, $sql_topic_id);   
        $result_topic_id_array = mysqli_fetch_assoc($result_topic_id);
        $topic_id = $result_topic_id_array["id"];
        //print_r("ID du topic : ". $topic_id . "\n"); // DEBUG

        // On insère la relation
        $sql_last_relation_id = "SELECT id FROM post_topic ORDER BY id DESC LIMIT 1";
        $result_last_relation_id = mysqli_query($conn, $sql_last_relation_id);
        $last_relation_id = mysqli_fetch_assoc($result_last_relation_id)['id'];

        $new_relation_id = $last_relation_id + 1;

        $sql_insert_relation = "INSERT INTO post_topic (id, post_id, topic_id) VALUES ('$new_relation_id', '$post_id', '$topic_id')";
        $result_insert_relation = mysqli_query($conn, $sql_insert_relation);
        
        if($result_insert_relation) {
            $_SESSION['message'] = "Post créé avec succès, il est visible par tout les utilisateurs !";
        }
    }
}

function esc(String $value) {
    // À compléter ultérieurement
    $val = trim($value); // Supprimer les espaces vides entourant la chaîne
    return $val;
}

function slugTransformText($text) {
    $lowercaseText = strtolower($text); // Convertir le texte en minuscules
    $transformedText = str_replace(' ', '-', $lowercaseText); // Remplacer les espaces par des tirets

    return $transformedText; // retourne le 'slug'
}