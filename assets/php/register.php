<?php
require_once './dbconfig.php';
if (isset($_POST['submit'])) {
    $message = '';
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    $role = htmlspecialchars($_POST['role']);
    if (empty($role)) {
        $role = 'Web Dev';
    }
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $message = 'Username already exists';
        echo '<script>alert("'.$message.'")</script>';
        echo "<script>window.location.href = '../../pages/create-user.php'</script>";
    } else {
        if ($password == $password2) {
            $sql = "INSERT INTO user (username, password, role, active) VALUES (?,?,?,1)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($username, $passwordHash, $role));
            $message = 'User created';
            echo '<script>alert("'.$message.'")</script>';
            echo "<script>window.location.href = '../../pages/acp.php'</script>";
        } else {
            $message = 'Passwords do not match';
            echo '<script>alert("'.$message.'")</script>';
        }
    }
}