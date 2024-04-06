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

    // TODO : On ajoute un $_SESSION['redirected'] pour éviter de rediriger à chaque fois

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
        /*if (!isset($_GET['work'])) {
            if (!isset($_SESSION['language'])) {
                $_SESSION['language'] = 'fr';
                header("Location: works.php?work=1&l=" . $_SESSION['language']);
                $_SESSION['rediriger'] = 'works';
            } else if (isset($_SESSION['language'])) {
                header("Location: works.php?work=1&l=" . $_SESSION['language']);
                $_SESSION['rediriger'] = 'works';
            }
        }*/
        $_SESSION['rediriger'] = 'works';
        header("Location: works.php");
    } else if ($myPage == 'blog.php' && $_SESSION['rediriger'] != 'blog') {
        /*if (!isset($_GET['post'])) {
            if (!isset($_SESSION['language'])) {
                $_SESSION['language'] = 'fr';
                header("Location: blog.php?post=1&l=" . $_SESSION['language']);
                $_SESSION['rediriger'] = 'blog';
            } else if (isset($_SESSION['language'])) {
                header("Location: blog.php?post=1&l=" . $_SESSION['language']);
                $_SESSION['rediriger'] = 'blog';
            }
        }*/
        $_SESSION['rediriger'] = 'blog';
        header("Location: blog.php");
    } else if ($myPage == 'about.php' && $_SESSION['rediriger'] != 'about') {
        /*if (!isset($_SESSION['language'])) {
            $_SESSION['language'] = 'fr';
            header("Location: about.php?l=" . $_SESSION['language']);
            $_SESSION['rediriger'] = 'about';
        } else if (isset($_SESSION['language'])) {
            header("Location: about.php?l=" . $_SESSION['language']);
            $_SESSION['rediriger'] = 'about';
        }*/
        $_SESSION['rediriger'] = 'about';
        header("Location: about.php");
    } else if ($myPage == 'login.php' && $_SESSION['rediriger'] != 'login') {
        /*if (!isset($_SESSION['language'])) {
            $_SESSION['language'] = 'fr';
            header("Location: login.php?l=" . $_SESSION['language']);
            $_SESSION['rediriger'] = 'login';
        } else if (isset($_SESSION['language'])) {
            header("Location: login.php?l=" . $_SESSION['language']);
            $_SESSION['rediriger'] = 'login';
        }*/
        $_SESSION['rediriger'] = 'login';
        header("Location: login.php");
    }

    ?> <br> <br> <br> <br> <br> <?php
    var_dump($_SESSION);