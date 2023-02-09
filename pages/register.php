<?php
session_start();
include './header.php';
require_once '../assets/php/dbconfig.php';
$_SESSION['current_page'] = '';
?>
<div class="container text-white">
    <form action="" method="post">
    <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
<?php
if (isset($_POST['submit'])) {
    $message = '';
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $message = 'Username already exists';
    } else {
        if ($password == $password2) {
            $sql = "INSERT INTO user (username, password, role) VALUES (?,?, 'Web Dev')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($username, $passwordHash));
            $message = 'User created';
        } else {
            $message = 'Passwords do not match';
        }
    }
    echo "<div class='text-white text-center'>$message</div>";
}

include './footer.php';
?>
