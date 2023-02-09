
<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["role"]);
session_destroy();
$connection = null;
echo "<script>location.href=\"./home.php\"</script>";