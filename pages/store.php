<?php
session_start();
$_SESSION['current_page'] = 'Store';
include_once './header.php';
session_destroy();
?>

<?php
include_once './footer.php';
?>
