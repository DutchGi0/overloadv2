<?php
include '../assets/php/dbconfig.php';
include '../assets/php/user.php';
include '../assets/php/category.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overload <?php echo $_SESSION['current_page']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/countdown.css">

    <script src="https://kit.fontawesome.com/e66285cb3c.js" crossorigin="anonymous"></script>


</head>
<body style="background-color: black">
<div class="container d-flex justify-content-center ">
    <a title="Overload" href="./home.php">
        <img class="logo mb-1" src="../assets/images/logo.png" alt="Overload Logo">
    </a>
</div>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark mx-5 mb-4 rounded cnav">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav w-100 justify-content-between">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        News
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./news.php">News</a></li>
                        <li><a class="dropdown-item" href="./news-archive.php">News Archive</a></li>
                    </ul>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="./news.php">News</a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="https://discord.com/invite/n8V8tkkp8M">Discord</a>
                </li>
                <style>
                    .dd-play .dropdown-menu {
                        position: relative;
                        left: -30px;
                    }
                </style>
                <li class="nav-item dropdown dd-play">
                    <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Play Now
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../assets/downloads/Overload.jar">Overload V1</a></li>
                        <li><a class="dropdown-item" href="../assets/downloads/OverloadHD.jar">Overload V2</a></li>
                    </ul>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="../assets/downloads/Overload.jar">Play Now</a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="./highscores.php">Highscores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./vote.php">Vote</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./store.php">Store</a>
                </li>
            </ul>
        </div>
    </div>
</nav>