<?php
// TODO: Change the ACP to a different address
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$_SESSION['current_page'] = '| Admin Control Panel';
include_once './header.php';

?>
<div class="container text-white">
    <h1 class="text-center">Admin Control Panel</h1>
    <h4 class="text-center">Welcome <span class="text-warning"><?php echo $_SESSION['username'] ?></span>
        your role is <span class="fw-bold text-info"><?php echo $_SESSION['role'] ?></span></h4>
    <?php if ($_SESSION['username'] == 'Gio' || $_SESSION['username'] == 'K1lla')  { ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Add new User</h5>
                    <p class="card-text">Create a new user to access the ACP</p>
                    <a href="create-user.php" class="btn btn-primary">Create User</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Show User</h5>
                    <p class="card-text">Show all users and edit their roles and active state.</p>
                    <a href="users.php" class="btn btn-primary">Show Users</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">View giveaways</h5>
                    <p>If you create a giveaway, <strong>first</strong> you need to create a giveaway in Discord! </p>
                    <a href="giveaway.php" class="btn btn-primary">Giveaway</a>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
        if ($_SESSION['role'] == 'Web Dev' || $_SESSION['role'] == 'Owner' || $_SESSION['role'] == 'Developer') {
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Write a news article</h5>
                    <p class="card-text">Write a new news article for the website</p>
                    <a href="write-news.php" class="btn btn-primary">Write an article</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Edit a news article</h5>
                    <p class="card-text">Is a news article not good enough, or you want to publish it, you can do it here.</p>
                    <a href="all-news.php" class="btn btn-primary">Edit article</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Create event</h5>
                    <p class="card-text">Create a new event for in game</p>
                    <a href="create-event.php" class="btn btn-primary">Create Event</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Show all events</h5>
                    <p class="card-text">Show all events from the past and the future.</p>
                    <a href="events.php" class="btn btn-primary">Show events</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once './footer.php';
?>
