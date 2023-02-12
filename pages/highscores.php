<?php
session_start();
$_SESSION['current_page'] = 'Highscores';
include_once './header.php';

?>
<script>location.href = 'https://overload.everythingrs.com/services/hiscores'</script>
<?php
include_once './footer.php';
?>
