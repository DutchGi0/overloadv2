<?php
// TODO: Change the Login to a different address
session_start();
$_SESSION['current_page'] = '| Login';
include_once './header.php';

?>
<div class="container text-white">
    <h1 class="text-center">Login</h1>
    <div class="news-article">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php
$message = '';
if (isset($_POST['submit'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        if (password_verify($password, $result['password'])) {
            $_SESSION['username'] = $result['username'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['user_id'] = $result['id'];
            echo "<script>window.location.href = 'home.php'</script>";
        } else {
            $message = 'Incorrect password or username';
        }
    } else {
        $message = 'Incorrect password or username';
    }
}
echo "<div class='text-white text-center'>$message</div>";
include_once './footer.php';
?>