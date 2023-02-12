<?php
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$_SESSION['current_page'] = '| Create User';
include_once './header.php';

?>

<div class="container">
    <h1 class="text-white uppercase text-center">Create a new user</h1>
    <div class="news-article text-white">
        <form action="../assets/php/register.php" method="post">
            <div class="form-group">
                <label for="username">Username<span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" minlength="5" required>
            </div>
            <div class="form-group">
                <label for="role">Role<span class="text-danger fs-6">*</span></label>
                <select class="form-select" id="role" name="role" required>
                    <option value="Owner">Owner</option>
                    <option value="Developer">Developer</option>
                    <option value="Web Dev">Web Dev</option>
                    <option value="Admin">Admin</option>
                </select>
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
                <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button>
        </form>
    </div>
</div>

<?php
include_once './footer.php';
?>
