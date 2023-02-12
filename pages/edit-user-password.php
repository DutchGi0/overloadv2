<?php
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$_SESSION['current_page'] = '| Edit User Password';
include_once './header.php';

?>
<?php
$sql = 'SELECT * FROM user WHERE id= ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) { ?>
    <div class="container">
        <h1 class="text-white uppercase text-center">Edit <span class="title"><?php echo $row['username'] ?>'s</span> password</h1>
        <div class="news-article text-white">
            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" />
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $row['username'] ?>" minlength="5" readonly>
                </div>
                <div class="form-group">
                    <label for="password">Password<span class="text-danger fs-6">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password<span class="text-danger fs-6">*</span></label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button></form>
        </div>
    </div>
    <?php
}

if (isset($_POST['submit'])) {
    $id = htmlspecialchars($_POST['id']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if ($password == $password2) {
        $sql = "UPDATE user SET password = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($passwordHash, $id));
        $message = 'Password updated successfully';
        echo '<script>alert("'.$message.'")</script>';
        echo "<script>window.location.href = './users.php'</script>";
    } else {
        $message = 'Passwords do not match';
        echo '<script>alert("'.$message.'")</script>';
    }
}
include_once './footer.php';
?>
