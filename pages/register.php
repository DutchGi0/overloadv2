<?php
// TODO: Change the register to a different address
session_start();
include './header.php';
require_once '../assets/php/dbconfig.php';
$_SESSION['current_page'] = '';
?>
<div class="container text-white">
    <form action="../assets/php/register.php" method="post">
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

include './footer.php';
?>
