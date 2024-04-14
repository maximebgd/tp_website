<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./static/css/style.css">

    <link rel="icon" type="image/png" href="./static/images/logo.png">

    <?php

    $myPage = myWitchPageIsIt();

    if ($myPage == 'index.php' && $_SESSION['rediriger'] != 'index') {
        /*if (!isset($_GET['post']) && !isset($_GET['work'])) {
            if (!isset($_SESSION['language'])) {
                $_SESSION['language'] = 'fr';
                header("Location: index.php?post=1&work=1&l=" . $_SESSION['language']);
                $_SESSION['rediriger'] = 'index';
            } else if (isset($_SESSION['language'])) {
                header("Location: index.php?post=1&work=1&l=" . $_SESSION['language']);
                $_SESSION['rediriger'] = 'index';
            }
        }*/
        $_SESSION['rediriger'] = 'index';
        header('Location : index.php');
    } else if ($myPage == 'works.php' && $_SESSION['rediriger'] != 'works') {
        $_SESSION['rediriger'] = 'works';
        header("Location: works.php");
    } else if ($myPage == 'blog.php' && $_SESSION['rediriger'] != 'blog') {
        $_SESSION['rediriger'] = 'blog';
        header("Location: blog.php");
    } else if ($myPage == 'about.php' && $_SESSION['rediriger'] != 'about') {
        $_SESSION['rediriger'] = 'about';
        header("Location: about.php");
    } else if ($myPage == 'login.php' && $_SESSION['rediriger'] != 'login') {
        $_SESSION['rediriger'] = 'login';
        header("Location: login.php");
    }

    global $conn;
    if (isset($_GET['delete_post'])) {
        $id = $_GET['delete_post'];
        $sql = "DELETE FROM posts WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
        header("Location: blog.php");
    }
    if (isset($_GET['delete_work'])) {
        $id = $_GET['delete_work'];
        $sql = "DELETE FROM work WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
        header("Location: works.php");
    }
    
    /*
    ?> <br> <br> <br> <br> <br> <?php
    var_dump($_SESSION);*/