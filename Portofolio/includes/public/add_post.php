<?php

// On déclare les variables :
$user_name = '';
$title = '';
$id_topic = '';
$content = '';

if(isset($_POST['add_post'])) {
    global $conn;

    // On récupère les variables :
    $user_name = esc($_POST['user_name']);
    $title = esc($_POST['title']);
    $content = esc($_POST['content']);
    $id_topic = esc($_POST['topic']);

    $sql = "INSERT INTO posts(user_name, title, id_topic, content, created_at) 
            VALUES('$user_name', '$title', '$id_topic', '$content', now())";
    $result = mysqli_query($conn, $sql);

    if($result) {
        
    }
}


function esc($value) {
    global $conn;
    
    $val = trim($value); // Supprimer les espaces vides autour de la chaîne
    $val = mysqli_real_escape_string($conn, $value); // Échapper la valeur pour prévenir les attaques par injection SQL

    return $val; // on retourne la veulleur nettoyée et échappée
}

function getNameTopicbyID($id_topic) {
    global $conn;

    $sql = "SELECT name_topic 
            FROM topic
            WHERE id = '$id_topic'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $topic = mysqli_fetch_assoc($result);
        return $topic['name_topic'];
    }
}