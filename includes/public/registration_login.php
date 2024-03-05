<?php
// Déclaration des variables
$username = "";
$email = "";
$errors = array();

// CONNEXION DE L'UTILISATEUR
if (isset($_POST['login_btn'])) {
    $username = esc($_POST['username']);
    $password = esc($_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username required");
    }
    if (empty($password)) {
        array_push($errors, "Password required");
    }

    if (empty($errors)) {
        $password = md5($password); // cryptage du mot de passe
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if($result) {
            if (mysqli_num_rows($result) > 0) {
                // obtenir l'ID de l'utilisateur créé
                $reg_user_id = mysqli_fetch_assoc($result)['id'];

                // mettre l'utilisateur connecté dans le tableau de session
                $_SESSION['user'] = getUserById($reg_user_id);

                // si l'utilisateur est admin, rediriger vers la zone d'administration
                if (in_array($_SESSION['user']['role'], ["Admin"])) {
                    $_SESSION['message'] = "You are now logged in";
                    // rediriger vers la zone d'administration
                    header('location: ' . BASE_URL . '/admin/dashboard.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "You are now logged in";
                    // rediriger vers la zone publique
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

// INSCRIPTION DE L'UTILISATEUR
if(isset($_POST['register_btn'])) {
    $username = esc($_POST['username']);
    $email = esc($_POST['email']);
    $password = esc($_POST['password']);
    $password_confirm = esc($_POST['password_confirm']);

    if (empty($username)) {
        array_push($errors, "Username required");
    }
    if (empty($email)) {
        array_push($errors, "Email required");
    }
    if (empty($password)) {
        array_push($errors, "Password required");
    }
    if ($password != $password_confirm) {
        array_push($errors, "Passwords do not match");
    }

    if(empty($errors)) {
        // Check if username or email already exists in the database
        $sql = "SELECT * FROM users WHERE username='$username' AND email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $user = mysqli_fetch_assoc($result);
            if($user) {
                if ($user['username'] === $username) {
                    array_push($errors, "Username already exists");
                }
                if ($user['email'] === $email) {
                    array_push($errors, "Email already exists");
                }
            }
        }
        else {
            array_push($errors, 'Database error: failed to register');
        }

        // If there are no errors, register the user in the database
        if(empty($errors)) {
            $password = md5($password); // encrypt the password
            $sql = "INSERT INTO users (username, email, role, password, created_at, updated_at) VALUES('$username', '$email', 'Author', '$password', now(), now())";
            $result = mysqli_query($conn, $sql);

            if($result) {
                $reg_user_id = mysqli_insert_id($conn); // get the ID of the created user
                $_SESSION['user'] = getUserById($reg_user_id); // store the logged-in user in the session array

                if (in_array($_SESSION['user']['role'], ["Admin"])) {
                    $_SESSION['message'] = "You are now logged in";
                    // redirect to the admin dashboard
                    header('location: ' . BASE_URL . '/admin/dashboard.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "You are now logged in";
                    // redirect to the public area
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

    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1"; // requête pour récupérer l'utilisateur et son rôle
    $result = mysqli_query($conn, $sql); // exécution de la requête MySQL
    
    if($result) {
        $user = mysqli_fetch_assoc($result); // conversion du résultat en tableau associatif
        return $user;
    }
    else {
        return null;
    }
}


function esc(String $value) {
    // À compléter ultérieurement
    $val = trim($value); // Supprimer les espaces vides entourant la chaîne
    return $val;
}