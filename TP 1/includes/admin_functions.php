<?php 

// ==================================================
//  RRRR   EEEEE   QQQ   U   U  EEEEE  TTTTT  EEEEE
//  R   R  E      Q   Q  U   U  E        T    E
//  R   R  EEE    Q   Q  U   U  EEE      T    EEE
//  RRRR   E      Q Q Q  U   U  E        T    E
//  R  R   E      Q  Q   U   U  E        T    E
//  R   R  EEEEE   QQ Q   UUU   EEEEE    T    EEEEE
// ==================================================
// * * * REQUETE

// Fonction pour calculer le nombre total d'utilisateurs inscrits au total
function getNbUsers() {
    global $conn;

    $sql = "SELECT COUNT(*) AS total FROM users"; // requête pour récupérer tous les utilisateurs
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}

// Fonction pour obtenir la liste de tout nos utilisateurs
function getAllUsers() {
    global $conn;

    $sql = 'SELECT * FROM users'; // requête pour récupérer tous les utilisateurs
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $row;
    }
}

// Fonction pour obtenir la liste des noms de tous les rôles
function getAllRole() {
    global $conn;

    $sql = "SELECT name
            FROM roles";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $roles = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $roles;
    }
}

// Fonction qui retourne tout les admin users et leur rôle :
function getAdminUsers() {
    global $conn;

    $sql = "SELECT * 
            FROM users 
            WHERE role='Admin' OR role='Author'"; // requête pour récupérer tous les utilisateurs
    $result = mysqli_query($conn, $sql);

    if($result) {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $users;
    }
}

// Fonction qui retourne tout les admin roles :
function getAdminRoles() {
    global $conn;

    $sql = "SELECT * 
            FROM roles"; // requête pour récupérer tous les utilisateurs
    $result = mysqli_query($conn, $sql);

    if($result) {
        $roles = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $roles;
    }
}

// Fonction pour obtenir un rôle par son ID
function getRolebyID($id) {
    global $conn;

    $sql = "SELECT *
            FROM roles
            WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
}

// Obtenir les informations de l'utilisateur à partir de l'ID
function getUserById($id) { // Fonction définit aussi dans registration_login.php mais c'est pour mieux structurer / séparer le code
    global $conn;

    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1"; // requête pour récupérer l'utilisateur par son ID
    $result = mysqli_query($conn, $sql); // exécution de la requête MySQL
    
    if($result) {
        $user = mysqli_fetch_assoc($result); // conversion du résultat en tableau associatif
        return $user;
    }
    
}



// ================================================================
//  DDD      A     SSS   H   H  BBB     OOO     A    RRRR   DDD
//  D  D    A A   S      H   H  B  B   O   O   A A   R   R  D  D
//  D   D  A   A   SSS   HHHHH  BBBB   O   O  A   A  R   R  D   D
//  D   D  AAAAA      S  H   H  B   B  O   O  AAAAA  RRRR   D   D
//  D  D   A   A      S  H   H  B   B  O   O  A   A  R  R   D  D
//  DDD    A   A  SSSS   H   H  BBBB    OOO   A   A  R   R  DDD
// ================================================================
// * * * DASHBOARD

// Fonction pour calculer le nombre de nouveau utilisateurs inscrits
function getNewUsers() {
    global $conn;

    $sql = "SELECT COUNT(*) AS total FROM users WHERE role = 'Author' AND DATEDIFF(NOW(), created_at) <= 10;"; // requête pour récupérer tous les utilisateurs
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}



// =============================
//  U   U   SSS   EEEEE  RRRR
//  U   U  S      E      R   R
//  U   U   SSS   EEE    R   R
//  U   U      S  E      RRRR
//  U   U      S  E      R  R
//   UUU   SSSS   EEEEE  R   R
// =============================
// * * * USER


// Admin user variables
$admin_id = -1;
$isEditingUser = false;


$username = "";
$password = "";
$password_confirm = "";
$email = "";
$role = "";

// Topics variables
$topic_id = 0;
$isEditingTopic = false;
$topic_name = "";

// Général variables
$errors = array();

if(isset($_POST['create_admin'])) {
    $username = esc_admin($_POST['username']);
    $email = esc_admin($_POST['email']);
    $password = esc_admin($_POST['password']);
    $password_confirm = esc_admin($_POST['passwordConfirmation']);

    if(isset($_POST['role_id'])) {
        $role_id = esc_admin($_POST['role_id']);
        $role = getRolebyID($role_id)['name'];
    }
    else {
        array_push($errors, "Role required");
    }

    if (empty($username)) array_push($errors, "Username required");
    if (empty($email)) array_push($errors, "Email required");
    if (empty($password)) array_push($errors, "Password required");
    if ($password != $password_confirm) array_push($errors, "Passwords do not match");

    $password = md5($password);

    if(empty($errors)) {
        createAdmin($username, $email, $password, $role);
    }
}

if(isset($_POST['update_admin'])) {
    updateAdmin($_POST);
}

if(isset($_GET['edit-admin'])) {
    $admin_id = $_GET['edit-admin'];
    editAdmin($admin_id);
}

if(isset($_GET['delete-admin'])) {
    $admin_id = $_GET['delete-admin'];
    deleteAdmin($admin_id);
}


// Création d'un nouvel utilisateur via le formulaire de user.php
function createAdmin($username, $email, $password, $role) {
    global $conn;

    $sql = "INSERT INTO users (username, email, role, password, created_at, updated_at) VALUES('$username', '$email', '$role', '$password', now(), now())";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['message'] = "Admin user created successfully";
        //print_r(("Le role est : " . $role));
        header('location: users.php');
        exit(0);
    }
}

// Fonction pour modifier un utilisateur via le formulaire de user.php
function editAdmin($admin_id) {
    global $conn, $username, $isEditingUser, $admin_id, $email;

    //print_r("Dans editAdmin : " . $admin_id . "<br>");

    $isEditingUser = true;

    $sql = "SELECT *
            FROM users
            WHERE id=$admin_id
            LIMIT 1"; // requête pour récupérer l'admin
    $result = mysqli_query($conn, $sql);

    if($result) {
        $admin = mysqli_fetch_assoc($result);
        $username = $admin['username'];
        $email = $admin['email'];
        //print_r("On souhaite modifier : " . $username . " " . $email);
    }
}

// Fonction pour supprimer un utilisateur via le boutton de user.php
function deleteAdmin($admin_id) {
    global $conn;

    $sql = "DELETE FROM users 
            WHERE id=$admin_id"; // requête pour supprimer l'admin
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['message'] = "Admin user deleted successfully";
        header('location: users.php');
        exit(0);
    }

}

// Fonction pour modifier un utilisateur via le formulaire de user.php
function updateAdmin($request_values) {
    global $conn, $errors, $username, $isEditingUser, $admin_id, $email;

    $admin_id = $request_values['admin_id'];

    $username = esc_admin($request_values['username']);
    $email = esc_admin($request_values['email']);
    $password = esc_admin($request_values['password']);
    $password_confirm = esc_admin($request_values['passwordConfirmation']);
    if (empty($username)) array_push($errors, "Username required");
    if (empty($email)) array_push($errors, "Email required");
    if (empty($password)) array_push($errors, "Password required");
    if ($password != $password_confirm) array_push($errors, "Passwords do not match");

    if(isset($request_values['role_id'])) {
        $role_id = esc_admin($request_values['role_id']);
        $role = getRolebyID($role_id)['name'];
    }
    else array_push($errors, "Role required");

    $password = md5($password);

    if(empty($errors)) {
        $sql = "UPDATE users 
                SET username='$username', email='$email', role='$role', password='$password', updated_at=now()
                WHERE id=$admin_id"; // requête pour mettre à jour l'admin
        $result = mysqli_query($conn, $sql);

        if($result) {
            $isEditingUser = false;
            //print_r(("Dans updateAdmin : " . $admin_id));
            //print_r("On souhaite modifier : " . $username . " " . $email . " " . $role);
            $_SESSION['message'] = "Admin user updated successfully";
            header('location: users.php');
            exit(0);
        }
        else {
            array_push($errors, "Something went wrong");
        }
    }
    else { // On met au tout début du tableau d'erreur "La modification à échoué !
        array_unshift($errors, "La modification à échoué !");
    }
}

// Fonction de nettoyage et d'échappement des valeurs 
function esc_admin($value) {
    global $conn;
    
    $val = trim($value); // Supprimer les espaces vides autour de la chaîne
    $val = mysqli_real_escape_string($conn, $value); // Échapper la valeur pour prévenir les attaques par injection SQL

    return $val; // on retourne la veulleur nettoyée et échappée
}







