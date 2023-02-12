<?php
session_start();
$_SESSION['current_page'] = '| Publish News';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
include_once './header.php';

?>

<div class="container">
    <h1 class="text-white uppercase text-center">Images</h1>

    <div class="news-article">
        <a href="upload-image.php" class="btn btn-primary">Upload Image</a>
        <form action="" method="post">
            <div class="form-group">
                <label for="search">Search</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="Search for image name">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="reset" class="btn btn-danger float-end" onclick="BackFunction()">Reset</button>
        </form>
        <br>

        <div class="row image-gallery">
            <?php
            if (isset($_POST['submit'])) {
                $sql = 'SELECT * FROM image WHERE image_name LIKE ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['%' . $_POST['search'] . '%']);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4 shadow-sm">';
                    echo '<img style="aspect-ratio: 2.5/1" src="../assets/images/' . $row['image_name'] . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<code class="text-white">Path: assets/images/'. $row['image_name'] .' </code>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                $sql = 'SELECT * FROM image';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($results as $row) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card mb-4 shadow-sm">';
                    echo '<img style="aspect-ratio: 2.5/1" src="../assets/images/' . $row['image_name'] . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<code class="text-white">Path: https://overloadv2.com/assets/images/'. $row['image_name'] .' </code>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
    </div>
    </div>
    </div>
</div>

<?php
include_once './footer.php';
?>

