<?php
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$_SESSION['current_page'] = '| Create Giveaway';
include_once './header.php';

?>

<div class="container">
    <h1 class="text-white uppercase text-center">Create Giveaway</h1>
    <div class="news-article text-white">
        <form action="" method="post">
            <div class="form-group">
                <label for="giveaway">Giveaway title<span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="giveaway" name="giveaway" placeholder="Giveaway title" required>
            </div>
            <div class="form-group">
                <label for="description">Description<span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
            </div>
            <div class="form-group">
                <label for="link">Link to giveaway<span class="text-danger fs-6">*</span></label>
                <input type="url" class="form-control" id="link" name="link" placeholder="Link to the giveaway" required>
            </div>
            <div class="form-group">
                <label for="datetime">Giveaway end date & time<span class="text-danger fs-6">*</span></label>
                <input type="datetime-local" class="form-control" id="datetime" name="datetime" placeholder="Date Time" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button>
        </form>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $giveaway = htmlspecialchars($_POST['giveaway']);
    $description = htmlspecialchars($_POST['description']);
    $link = htmlspecialchars($_POST['link']);
    $datetime = $_POST['datetime'];
    $date_now = date_create("now")->format('Y-m-d');

//    check if link has https://dyno.gg/giveaways/ in the url
    $validLink = str_starts_with("$link", 'https://dyno.gg/giveaway/');
    if ($validLink) {
        $validLink = substr($link, 25);
        $sql = "INSERT INTO giveaway (user_id, giveaway_title, giveaway_description, giveaway_link, giveaway_end_date, giveaway_start_date, giveaway_active) VALUES ( '$user_id' ,'$giveaway', '$description', '$validLink', '$datetime', '$date_now', '1')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        if ($stmt) {
            echo "<script>alert('Giveaway created successfully!')</script>";
            echo "<script>window.location.href = 'giveaway.php'</script>";
        } else {
            echo "<script>alert('Something went wrong!')</script>";
        }
    } else {
        echo "<script>alert('Link is not a valid Dyno.gg giveaway link!')</script>";
    }
}
include_once './footer.php';
?>
