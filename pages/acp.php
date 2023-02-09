<?php
session_start();
if (!$_SESSION['role'] == 'Web Dev' || !$_SESSION['role'] == 'Owner') {
    header('Location: login.php');
}
$_SESSION['current_page'] = '| Admin Control Panel';
include_once './header.php';

?>
<div class="container text-white">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Add new User</h5>
                    <p class="card-text">Create a new user to access the ACP</p>
                    <a href="#" class="btn btn-primary">Create User</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Deactivate User</h5>
                    <p class="card-text">Deactivate users who aren't an <span class="text-primary">Owner</span> or a
                        <span class="text-primary">Web Developer</span> anymore.</p>
                    <a href="#" class="btn btn-primary">Deactivate User</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Write a news article</h5>
                    <p class="card-text">Write a new news article for the website</p>
                    <a href="#" class="btn btn-primary">Write an article</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Edit a news article</h5>
                    <p class="card-text">Is a news article not good enough, or you want to publish it, you can do it here.</p>
                    <a href="#" class="btn btn-primary">Edit article</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Create event</h5>
                    <p class="card-text">Create a new event for in game</p>
                    <a href="#" class="btn btn-primary">Create Event</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Show all events</h5>
                    <p class="card-text">Show all events from the past and the future.</p>
                    <a href="#" class="btn btn-primary">Show events</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once './footer.php';
?>
