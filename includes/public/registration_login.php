<?php

// Déclaration des variables
$username = "";
$email = "";
$password = "";
$password_confirm = "";
$errors = array();


// CONNEXION DE L'UTILISATEUR avec le bouton "Sign in"
if (isset($_POST['login_btn'])) {
    // On récupère les valeurs des champs du formulaire
    $username = esc($_POST['username']);
    $password = esc($_POST['password']);

    // On vérifie que les champs ne sont pas vides, sinon on les ajoute au tableau des erreurs
    if (empty($username)) array_push($errors, "Username required");
    if (empty($password)) array_push($errors, "Password required");

    // Si on a aucune erreur
    if (empty($errors)) {
        $password = md5($password); // cryptage du mot de passe
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if($result) {
            if (mysqli_num_rows($result) > 0) { // Si l'utilisteur est trouvé dans la BDD
                // On récupère l'ID de l'utilisateur
                $reg_user_id = mysqli_fetch_assoc($result)['id'];

                // On met l'utilisateur connecté dans le tableau de session
                $_SESSION['user'] = getUserById($reg_user_id);

                // Si l'utilisateur est admin, alors on le redirige vers la zone d'administration (= dashboard.php)
                if (in_array($_SESSION['user']['role'], ["Admin"])) {
                    $_SESSION['message'] = "Vous êtes maintenant connecté au dashboard admin";
                    // Rediriger vers la zone d'administration (= dashboard.php)
                    header('location: ' . BASE_URL . '/admin/dashboard.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "Vous êtes maintenant connecté !";
                    // Rediriger vers la zone publique
                    header('location: index.php');
                    exit(0);
                }
            }
        }
        else {
            array_push($errors, 'Wrong credentials');
        }
    }
}

// INSCRIPTION DE L'UTILISATEUR avec le bouton "Register now!" -> "Register"
if(isset($_POST['register_btn'])) {
    // On récupère les valeurs des champs du formulaire
    $username = esc($_POST['username']);
    $email = esc($_POST['email']);
    $password = esc($_POST['password']);
    $password_confirm = esc($_POST['password_confirm']);

    // On vérifie que les champs ne sont pas vides, sinon on les ajoute au tableau des erreurs
    if (empty($username)) array_push($errors, "Username required");
    if (empty($email)) array_push($errors, "Email required");
    if (empty($password)) array_push($errors, "Password required");
    if ($password != $password_confirm) array_push($errors, "Passwords do not match");

    if(empty($errors)) {
        // Check if username or email already exists in the database
        $sql = "SELECT * FROM users WHERE username='$username' AND email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $user = mysqli_fetch_assoc($result);
            if($user) {
                if ($user['username'] === $username) {
                    array_push($errors, "Le Username existe déjà");
                }
                if ($user['email'] === $email) {
                    array_push($errors, "L'email existe déjà");
                }
            }
        }
        else {
            array_push($errors, 'Database error: failed to register');
        }

        // Si on a aucune erreur
        if(empty($errors)) {
            $password = md5($password); // cryptage du mot de passe
            $sql = "INSERT INTO users (username, email, role, password, created_at, updated_at) VALUES('$username', '$email', 'Author', '$password', now(), now())";
            $result = mysqli_query($conn, $sql);

            if($result) {
                $reg_user_id = mysqli_insert_id($conn); // On récupère l'ID de l'utilisateur que l'on vient de créer
                $_SESSION['user'] = getUserById($reg_user_id); // On stocke l'utilisateur connecté dans le tableau de session

                // Si l'utilisateur est admin, alors on le redirige vers la zone d'administration (= dashboard.php)
                if (in_array($_SESSION['user']['role'], ["Admin"])) {
                    $_SESSION['message'] = "Vous êtes maintenant connecté au dashboard admin";
                    // Rediriger vers la zone d'administration (= dashboard.php)
                    header('location: ' . BASE_URL . '/admin/dashboard.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "Vous êtes maintenant connecté !";
                    // Rediriger vers la zone publique
                    header('location: index.php');
                    exit(0);
                }
            } 
            else {
                array_push($errors, 'Database error: failed to register');
            }
        }
    }
}

// Obtenir les informations de l'utilisateur à partir de l'ID
function getUserById($id) {
    global $conn;

    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1"; // requête pour récupérer l'utilisateur par son ID
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
