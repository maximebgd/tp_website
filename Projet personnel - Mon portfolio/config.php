<?php
//Create session per user:
session_start();


// Initialisation de $_SESSION :
if (!isset($_SESSION['l'])) {
    $_SESSION['l'] = 'fr';
}
if (!isset($_SESSION['home'])) {
    $_SESSION['home'] = array();
    $_SESSION['home']['post'] = 1;
    $_SESSION['home']['work'] = 1;
}
if (!isset($_SESSION['work'])) {
    $_SESSION['work'] = array();
    $_SESSION['work']['work'] = 1;
}
if (!isset($_SESSION['blog'])) {
    $_SESSION['blog'] = array();
    $_SESSION['blog']['post'] = 1;
}
if (!isset($_SESSION['single_work'])) {
    $_SESSION['single_work'] = array();
    $_SESSION['single_work']['name'] = '';
}
// On modifie les valeurs de $_SESSION :
function myWitchPageIsIt() {
    $page = $_SERVER['PHP_SELF'];
    $page = explode('/', $page);
    $page = end($page);
    return $page; // index.php
}
function stringToInt($str) {
    return intval($str);
}


$myPage = myWitchPageIsIt();

if (isset($_GET['work'])) {
    if ($myPage == 'index.php') {
        $_SESSION['home']['work'] = stringToInt($_GET['work']);
    } else if ($myPage == 'works.php') {
        $_SESSION['work']['work'] = stringToInt($_GET['work']);
    }
    header("Location: $myPage");
    exit; // Terminer le script après la redirection
}
if (isset($_GET['post'])) {
    if ($myPage == 'index.php') {
        $_SESSION['home']['post'] = stringToInt($_GET['post']);
    } else if ($myPage == 'blog.php') {
        $_SESSION['blog']['post'] = stringToInt($_GET['post']);
    }
    header("Location: $myPage");
    exit; // Terminer le script après la redirection
}
if (isset($_GET['name'])) {
    if ($myPage == 'single_work.php') {
        $_SESSION['single_work']['name'] = $_GET['name'];
        header("Location: $myPage");
        exit; // Terminer le script après la redirection
    }
}
if (isset($_GET['l'])) {
    $_SESSION['l'] = $_GET['l'];
    header("Location: $myPage");
    exit; // Terminer le script après la redirection
}








define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');


define('DB_NAME', 'myWebSite');
define('DB_USER', 'root');
define('DB_PASS', 'azerty');

// connect to database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//var_dump($conn);

//define some constants:
define('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'http://localhost:2024/');
