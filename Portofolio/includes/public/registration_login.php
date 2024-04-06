<?php

// Déclaration des variables
$password = "";
$errors = array();


// CONNEXION DE L'UTILISATEUR avec le bouton "Sign in"
if (isset($_POST['login_btn'])) {
    // On récupère les valeurs des champs du formulaire
    $password = esc($_POST['password']);
    print_r('Password entrée : ', $password);

    // On vérifie que les champs ne sont pas vides, sinon on les ajoute au tableau des erreurs
    if (empty($password)) array_push($errors, "Password required");

    // Si on a aucune erreur
    if (empty($errors)) {
        $password = md5($password); // cryptage du mot de passe
        $sql = "SELECT * FROM user WHERE password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if($result) {
            if (mysqli_num_rows($result) > 0) { // Si l'utilisteur est trouvé dans la BDD
                // On récupère l'ID de l'utilisateur
                $reg_user_id = mysqli_fetch_assoc($result)['id'];

                // On met l'utilisateur connecté dans le tableau de session
                $_SESSION['user'] = getUserById($reg_user_id);

                // Si l'utilisateur est admin, alors on le redirige vers la zone d'administration (= dashboard.php)
                if(isset($_SESSION['user'])) {
                    echo 'Connected as admin';
                    header('location: ' . BASE_URL . 'index.php');
                }
                else {
                    echo 'Connected as nobody';
                }
            }
        }
        else {
            array_push($errors, 'Mot de passe incorrect');
        }
    }
}

// Obtenir les informations de l'utilisateur à partir de l'ID
function getUserById($id) {
    global $conn;

    $sql = "SELECT * FROM user WHERE id=$id LIMIT 1"; // requête pour récupérer l'utilisateur par son ID
    $result = mysqli_query($conn, $sql); // exécution de la requête MySQL
    
    if($result) {
        $user = mysqli_fetch_assoc($result); // conversion du résultat en tableau associatif
        return $user;
    }
    else {
        return null;
    }
}

// Fonction pour nettoyer et échapper une valeur avant de l'utiliser dans une requête SQL
function esc($value) {
    global $conn;
    
    $val = trim($value); // Supprimer les espaces vides autour de la chaîne
    $val = mysqli_real_escape_string($conn, $value); // Échapper la valeur pour prévenir les attaques par injection SQL

    return $val; // on retourne la veulleur nettoyée et échappée
}
