<?php
session_start();
$_SESSION['current_page'] = '| Edit User Role & Active state';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
include_once './header.php';

?>
<?php
    $sql = 'SELECT * FROM user WHERE id= ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $row) { ?>
<div class="container">
    <h1 class="text-white uppercase text-center">Edit <span class="title"><?php echo $row['username'] ?>'s</span> role or active state</h1>
    <div class="news-article text-white">
        <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" />
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $row['username'] ?>" minlength="5" readonly>
            </div>
            <div class="form-group">
                <label for="role">Role<span class="text-danger fs-6">*</span></label>
                <select class="form-select" id="role" name="role" required>
                <?php
                    switch ($row['role']) {
                        case 'Owner':
                            echo '<option value="Owner" selected>Owner</option>';
                            echo '<option value="Developer">Developer</option>';
                            echo '<option value="Web Dev">Web Dev</option>';
                            echo '<option value="Admin">Admin</option>';
                            break;
                        case 'Developer':
                            echo '<option value="Owner">Owner</option>';
                            echo '<option value="Developer" selected>Developer</option>';
                            echo '<option value="Web Dev">Web Dev</option>';
                            echo '<option value="Admin">Admin</option>';
                            break;
                        case 'Web Dev':
                            echo '<option value="Owner">Owner</option>';
                            echo '<option value="Developer">Developer</option>';
                            echo '<option value="Web Dev" selected>Web Dev</option>';
                            echo '<option value="Admin">Admin</option>';
                            break;
                        case 'Admin':
                            echo '<option value="Owner">Owner</option>';
                            echo '<option value="Developer">Developer</option>';
                            echo '<option value="Web Dev">Web Dev</option>';
                            echo '<option value="Admin" selected>Admin</option>';
                            break;
                    }
                ?>
                </select>
            </div>
                <div class="form-group">
                    <label for="active">Active<span class="text-danger fs-6">*</span></label>
                    <select class="form-select" id="active" name="active" required>
                    <?php
                        switch ($row['active']) {
                            case '1':
                                echo '<option value="1" selected>Yes</option>';
                                echo '<option value="0">No</option>';
                                break;
                            case '0':
                                echo '<option value="1">Yes</option>';
                                echo '<option value="0" selected>No</option>';
                                break;
                        }?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button>
        </form>
    </div>
</div>
<?php
    }

if (isset($_POST['submit'])) {
    $id = htmlspecialchars($_POST['id']);
    $active = htmlspecialchars($_POST['active']);
    $role = htmlspecialchars($_POST['role']);
    if ($active == '1') {
        $sql = 'UPDATE user SET active = ?, role = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$active, $role, $id]);

        $message = 'User has been updated!';
        echo '<script>alert("'.$message.'")</script>';
        echo "<script>window.location.href = './users.php'</script>";
    } else {
        $password = '';
        $sql = 'UPDATE user SET password = ?, active = ?, role = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$password, $active, $role, $id]);

        $message = 'User has been updated!';
        echo '<script>alert("'.$message.'")</script>';
        echo "<script>window.location.href = './users.php'</script>";
    }


}
include_once './footer.php';
?>
