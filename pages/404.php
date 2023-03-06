<?php
// TODO: Change the ACP to a different address
session_start();
$_SESSION['current_page'] = '| Page not found';
include_once './header.php';

?>
<div class="container text-white">
    <div class="justify-content-center news-article text-white text-center center ">
        <h1>404</h1>
        <h2>Page not found</h2>
        <p>Sorry, but the page you were trying to view does not exist.</p>
        <a href="home.php" class="btn btn-primary">Go back to the homepage</a>

</div>
<?php
include_once './footer.php';
?>
