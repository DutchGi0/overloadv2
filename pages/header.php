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
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous" defer></script>
</head>
<body style="background-color: black">
<div class="container d-flex justify-content-center my-3">
    <a title="Overload" href="./home.php">
        <img class="logo" src="../assets/images/logo.png" alt="Overload Logo">
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
                <li class="nav-item">
                    <a class="nav-link" href="../assets/downloads/OverloadHD-1.1-all.jar">Play Now</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./highscores.php">Highscores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./vote.php">Vote</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./store.php">Store</a>
                </li>
<!--                --><?php
//                if (isset($_SESSION['user'])) {
//                    echo '<li class="nav-item dropdown">';
//                    echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
//                        Account
//                    </a>';
//                    echo '<ul class="dropdown-menu">';
//                        echo '<li><a class="dropdown-item" href="#">ACP</a></li>';
//                        echo '<li><a class="dropdown-item" href="#">Logout</a></li>';
//                    echo '</ul>';
//                echo '</li>';;
//                    }
//                ?>

            </ul>
        </div>
    </div>
</nav>