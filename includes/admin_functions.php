<?php 

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

// Fonction pour récupérer le topic d'un post donné
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

// Fonction pour update la liste des posts/utilisateurs (à appeler à chaque modificaion !)
function update() {
    global $conn;

    if(isset($_GET['publish'])) {
        $id = $_GET['publish'];
        $sql = "UPDATE posts SET published=1 WHERE id=$id";
        mysqli_query($conn, $sql);
        header('location: posts.php'); // on reste sur la MEME page !
    }
    else if (isset($_GET['delete-post'])) {
        $id = $_GET['delete-post'];
        $sql = "DELETE FROM posts WHERE id=$id";
        mysqli_query($conn, $sql);
        header('location: posts.php'); // on reste sur la MEME page !
    }
    else if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "UPDATE posts SET published=0 WHERE id=$id";
        mysqli_query($conn, $sql);
        header('location: posts.php'); // on reste sur la MEME page !
    }
    else if (isset($_GET["delete-user"])) {
        $id = $_GET["delete-user"];
        $sql = "DELETE FROM users WHERE id=$id";
        mysqli_query($conn, $sql);
        header('location: users.php'); // on reste sur la MEME page !
    }
    else if (isset($_GET['admin-user'])) {
        $id = $_GET['admin-user'];
        $sql = "UPDATE users SET role='Admin' WHERE id=$id";
        mysqli_query($conn, $sql);
        header('location: users.php'); // on reste sur la MEME page !
    }
    else if (isset($_GET['author-user'])) {
        $id = $_GET['author-user'];
        $sql = "UPDATE users SET role='Author' WHERE id=$id";
        mysqli_query($conn, $sql);
        header('location: users.php'); // on reste sur la MEME page !
    }
}


// Fonction pour calculer le nombre de commentaires publiés
// comment ça marche ?


function getWaitingPost() {
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=0"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    } 
}
function getNbWaitingPost() {
    global $conn;

    $sql = 'SELECT COUNT(*) AS total FROM posts WHERE published = 0;'; // requête pour récupérer tous les posts en attente de validation
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
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
                    <!-- Affichage du titre et de la date de création -->
                    <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Titre :</span> <?= $post['title'] ?> </h3>
                    <div class='info'>
                        <span> <?= date("F j, Y ", strtotime($post["created_at"])) ?> </span>
                    </div>
                    <br>
                    <!-- Affichage du contenu -->
                    <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Contenu :</span> <?= $post['body'] ?></h3>
                    <!-- Affichage des boutons "valider" et "supprimer" -->
                    <div class="buttons">
                        <a href="posts.php?publish=<?= $post['id'] ?>"> ✅ </a> 
                        <a href="posts.php?delete-post=<?= $post['id'] ?>"> ❌ </a>
                    </div>
                </div>
                <br> <br> <br>
            </div>
            <!-- Fin partie HTML -->

        <?php

        update();
    }
}



// Fonction pour récupérer tous les pots qui sont publiés (published = 1)
function getPublishedPost() {
    global $conn;

    $sql = "SELECT * FROM posts WHERE published=1"; // requête pour récupérer tous les articles "validés"
    $result = mysqli_query($conn, $sql);

    if ($result) { // Si la requête s'est bien déroulée
        $publishedPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $publishedPosts; // on retourne le tableau associatif
    } 
}

// Fonction pour récupérer le nombre de posts publiés (published = 1)
function getNbPublishedPost() {
    global $conn;

    $sql = 'SELECT COUNT(*) AS total FROM posts WHERE published = 1;'; // requête pour récupérer tous les posts publiés
    $result = mysqli_query($conn, $sql);

    if($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
}

// Fonction pour afficher tous les posts publiés et pouvoir les supprimer
function printPublishedPosts($all_puslished_post) {
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
                    <!-- Affichage du titre et de la date de création -->
                    <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Titre :</span> <?= $post['title'] ?> </h3>
                    <div class='info'>
                        <span> <?= date("F j, Y ", strtotime($post["created_at"])) ?> </span>
                    </div>
                    <br>
                    <!-- Affichage du contenu -->
                    <h3> <span style="text-decoration: underline; color : black; font-style: normal;">Contenu :</span> <?= $post['body'] ?></h3>
                    <!-- Affichage des boutons "valider" et "supprimer" -->
                    <div class="buttons">
                        <a href="posts.php?delete=<?= $post['id'] ?>"> ❌ </a>
                    </div>
                </div>
                <br> <br> <br>
            </div>
            <!-- Fin partie HTML -->

        <?php

        update();
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

// Fonction pour afficher la liste de tout nos utilisateurs et pouvoir les modifier
function printAllInfoUsers() {
    $allUser = getAllUsers();

    foreach($allUser as $user) {
        ?>
        <tr>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?php // Admin = affichage rouge, Author = affichage bleu
                $role = $user['role'] ;
                if($role === "Admin") {
                    ?> <p style="color: red;"> <?= $role ?> </p> <?php
                }
                else{
                    ?> <p style="color: blue;"> <?= $role ?> </p> <?php
                }
            ?></td>
            <td style="text-align: center;">
                <a href="posts.php?delete-user=<?= $user['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"> ❌ </a>
            </td>
            <td style="text-align: center;">
                <a href="posts.php?admin-user=<?= $user['id'] ?>" onclick="return confirm('Voulez-vous vraiment mettre admin cet utilisateur ?')"> ✅ </a>
            </td>
            <td style="text-align: center;">
                <a href="posts.php?author-user=<?= $user['id'] ?>" onclick="return confirm('Voulez-vous vraiment mettre author cet utilisateur ?')"> ✅ </a>
            </td>
        <?php 
    }

    update();
}


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

function printRoleMenuDeroulantAmin() {
    $roles = getAllRole();
    ?> <option value="" selected disabled> -- Selectionner un role -- </option> <?php
    foreach ($roles as $role) {
        ?>
            <option value="<?= $role['name'] ?>"> <?= $role['name'] ?> </option>
        <?php
    }
}


// Admin user variables
$admin_id = -1;
$isEditingUser = false;

if(isset($_GET['edit-admin'])) {
    $admin_id = $_GET['edit-admin'];
    editAdmin($admin_id);
}

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



/*function createAdmin($username, $email, $password, $role) {
    global $conn;

    $sql = "INSERT INTO users (username, email, role, password, created_at, updated_at) VALUES('$username', '$email', '$role', '$password', now(), now())";
    $result = mysqli_query($conn, $sql);
}*/

/* Fonction qui : 
* Réception de nouvelles données d'administration à partir d'un formulaire
* Création d'un nouvel utilisateur administrateur
* Retourne tous les utilisateurs de l'administration avec leurs rôles
*/
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


function esc_admin($value) {
    global $conn;
    
    $val = trim($value); // Supprimer les espaces vides autour de la chaîne
    $val = mysqli_real_escape_string($conn, $value); // Échapper la valeur pour prévenir les attaques par injection SQL

    return $val; // on retourne la veulleur nettoyée et échappée
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

/* 
* - Takes admin id as parameter
* - Fetches the admin from database
* - sets admin fields on form for editing
*/
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

/* 
* - Receives admin request from form and updates in database
*/
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







