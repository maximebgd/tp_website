<?php

// On déclare les variables :
$title = "";
$content = "";
$id_topic = "";
$image = "";
$errors = array();

if(isset($_POST['add_post'])) {
    global $conn;

    // On récupère les variables :
    $title = esc($_POST['title']);
    $content = esc($_POST['content']);
    if(!isset($_POST['autre'])) {
        $id_topic = esc($_POST['topic']);
        //print("L'id topic est : " . $id_topic); // DEBUG
    }
    $id_topic = esc($_POST['topic']);

    // Vérifier si un fichier a été téléchargé avec succès
    if(isset($_FILES["image"]) && isset($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"]; // récupère le nom de l'image
        //print_r("Nom de l'image : " . $image); // DEBUG
    }
    else if (isset($_FILES["image"]) && $_FILES["image"]["error"] > 0) {
        array_push($errors, "Erreur lors du téléchargement du fichier : " . $_FILES["image"]["error"]);
        //print_r("Attention, il y a une erreur ! "); // DEBUG
    }

    if($id_topic == 'autre') { // Il faut créer un nouveau topic !
        $name_topic = esc($_POST['autre']);
        //print_r("Le nom du topic est : " . $name_topic); // DEBUG

        $sql = "INSERT INTO topic(name_topic) 
                VALUES('$name_topic')";
        $result = mysqli_query($conn, $sql);

        // On récupère l'id du topic que l'on vient de créer
        $id_topic = mysqli_insert_id($conn);
        //print("L'id topic est : " . $id_topic); // DEBUG
    }

    $sql = "INSERT INTO work(title, created_at, id_topic, content, image) 
            VALUES('$title', now(), '$id_topic', '$content', '$image')";
    $result = mysqli_query($conn, $sql);
}


function esc($value) {
    global $conn;
    
    $val = trim($value); // Supprimer les espaces vides autour de la chaîne
    $val = mysqli_real_escape_string($conn, $value); // Échapper la valeur pour prévenir les attaques par injection SQL

    return $val; // on retourne la veulleur nettoyée et échappée
}
