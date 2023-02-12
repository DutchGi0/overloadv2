<?php
session_start();
$_SESSION['current_page'] = '| Publish Giveaway';
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
        <h1 class="text-white uppercase text-center">Publish <span class="title"><?php echo $row['giveaway_title'] ?></span></h1>
        <div class="news-article text-white">
            <form action="" method="post"">
            <div class="form-group">
                <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>" />
                <label for="publish">Publish<span class="text-danger fs-6">*</span></label>
                <select class="form-select form-select mb-3" name="publish" aria-label=".form-select example">
                    <?php
                    if ($row['giveaway_active'] == 0) {
                        echo '<option value="0" selected>Published</option>';
                        echo '<option value="1">Unpublished</option>';
                    } else {
                        echo '<option value="0">Published</option>';
                        echo '<option value="1" selected>Unpublished</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button>
        </div>
    </div>
    <?php
}

if (isset($_POST['submit'])) {
    $sql = 'UPDATE giveaway SET giveaway_active =? WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        $_POST['publish'],
        $_POST['id']
    ]);
    if ($result) {
        echo '<script>alert("Giveaway published successfully!");</script>';
        echo "<script>window.location.href = './giveaway.php'</script>";
    } else {
        echo '<script>alert("Couldn\'nt publish the giveaway!");</script>';
    }
}
include_once './footer.php';
?>
