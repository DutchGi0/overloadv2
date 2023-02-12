<?php
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$_SESSION['current_page'] = '| Create an event';
include_once './header.php';

?>

<div class="container">
    <h1 class="text-white uppercase text-center">Create an event</h1>
    <div class="news-article text-white">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Event name<span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Event title"required>
            </div>
                <div class="form-group">
                    <label for="start">Event start date<span class="text-danger fs-6">*</span></label>
                    <input type="date" class="form-control" id="Start" name="start" placeholder="Event start" required>
                </div>
                <div class="form-group">
                    <label for="end">Event end date<span class="text-danger fs-6">*</span></label>
                    <input type="date" class="form-control" id="end" name="end" placeholder="Event end" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $start = $_POST['start'];
    $end = $_POST['end'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO event (event_name, event_date_start, event_date_end, user_id) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        $name,
        $start,
        $end,
        $user_id
    ]);
    if ($result) {
        echo '<script>alert("Event created successfully")</script>';
        echo '<script>window.location.href = "events.php"</script>';
    } else {
        echo '<script>alert("Event creation failed")</script>';
    }
}
include_once './footer.php';
?>
