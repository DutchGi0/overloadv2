<?php
session_start();
$_SESSION['current_page'] = '| Edit User Role & Active state';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
include_once './header.php';

?>
<?php
$sql = 'SELECT * FROM giveaway WHERE id= ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) { ?>
    <div class="container">
        <h1 class="text-white uppercase text-center">Edit <span class="title"><?php echo $row['giveaway_title'] ?>'s</span> Giveaway</h1>
        <div class="news-article text-white">
            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" />
                <div class="form-group">
                    <label for="title">Giveaway name:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['giveaway_title'] ?>" minlength="5" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Giveaway description:</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['giveaway_description'] ?>" minlength="5">
                </div>
                <div class="form-group">
                    <label for="link">Giveaway link id:</label>
                    <div id="linkHelp" class="form-text">The id is after: <span class="fa-bold">https://dyno.gg/giveaway/</span> </div>
                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $row['giveaway_link'] ?>" minlength="5">
                </div>
                <div class="form-group">
                    <label for="start">Giveaway start date:</label>
                    <input type="date" class="form-control" id="start" name="start" value="<?php echo $row['giveaway_start_date'] ?>">
                </div>
                <div class="form-group">
                    <label for="end">Giveaway end date + time:</label>
                    <input type="datetime-local" class="form-control" id="end" name="end" value="<?php echo $row['giveaway_end_date'] ?>">
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
    $title = htmlspecialchars($_POST['title']);
    $role = htmlspecialchars($_POST['active']);
    $description = htmlspecialchars($_POST['description']);
    $link = htmlspecialchars($_POST['link']);
    $start = htmlspecialchars($_POST['start']);
    $end = htmlspecialchars($_POST['end']);

    $sql = 'UPDATE giveaway SET giveaway_title = ?, giveaway_active = ?, giveaway_description = ?, giveaway_link = ?, giveaway_start_date = ?, giveaway_end_date = ? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $role, $description, $link, $start, $end, $id]);
    if ($stmt) {
        echo '<script>alert("Giveaway updated successfully!");</script>';
        echo '<script>window.location.href = "./giveaway.php";</script>';
    } else {
        echo '<script>alert("Something went wrong, please try again!");</script>';
    }



}
include_once './footer.php';
?>
