<?php
session_start();
$_SESSION['current_page'] = 'Vote';
include_once './header.php';

?>
<script>location.href = 'https://overload.everythingrs.com/services/vote'</script>
<?php
include_once './footer.php';
?>
