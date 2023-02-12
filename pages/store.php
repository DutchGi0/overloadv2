<?php
session_start();
$_SESSION['current_page'] = 'Store';
include_once './header.php';
session_destroy();
?>
<script>location.href = 'https://overload.everythingrs.com/services/store'</script>
<?php
include_once './footer.php';
?>
