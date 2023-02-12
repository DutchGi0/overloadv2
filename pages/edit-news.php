<?php
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$_SESSION['current_page'] = '| Edit News Article';
include_once './header.php';

?>
<?php
$sql = 'SELECT * FROM news WHERE news_id= ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['id']]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) { ?>
    <div class="container">
        <h1 class="text-white uppercase text-center">Edit News Article</h1>
        <div class="news-article text-white">
            <form action="" method="post" id="upadate-content-form">
                <input type="hidden" name="id" id="id" value="<?php echo $row['news_id']; ?>" />
                <div class="form-group">
                    <label for="newstitle">News title</label>
                    <input type="text" class="form-control" id="newstitle" name="newstitle" required value="<?php echo $row['news_title']?>">
                </div>
                <div class="form-group">
                    <label for="category">Category<span class="text-danger fs-6">*</span></label>
                    <select class="form-select" id="category" name="category" required>
                        <?php
                        switch ($row['category_id']) {
                            case '1':
                                echo '<option value="1" selected>Game Update</option>';
                                echo '<option value="2">Website Update</option>';
                                break;
                            case '2':
                                echo '<option value="1">Game Update</option>';
                                echo '<option value="2" selected>Website Update</option>';;
                                break;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="header">Header text (max 250 chars)<span class="text-danger fs-6">*</span></label>
                    <textarea type="text" class="form-control" name="header" maxlength="250" placeholder="<?php echo $row['news_tweet_text']?>"></textarea>
                </div>
                <div class="form-group">
                    <label for="update">Content<span class="text-danger fs-6">*</span></label>
                    <textarea class="form-control" id="update" name="update" placeholder="<?php echo $row['news_body_text'] ?>"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="publishdate">Publish Date</label>
                    <?php $date = date_create($row['news_publish_date']);
                    $row['news_publish_date'] = date_format($date, 'Y-m-d'); ?>
                    <input type="date" class="form-control" id="publishdate" name="publishdate" value="<?php echo $row['news_publish_date'] ?>">
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
    $sql = 'UPDATE news SET category_id = ?, news_title = ?, news_publish_date = ?, news_tweet_text = ?, news_body_text = ?, news_image = ? WHERE news_id = ?';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        $_POST['category'],
        $_POST['newstitle'],
        $_POST['publishdate'],
        $_POST['header'],
        $_POST['update'],
        $_POST['image'],
        $_POST['id']
    ]);
    if ($result) {
        echo '<div class="alert alert-success" role="alert">
        News article updated successfully!
      </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Something went wrong!
      </div>';
    }
}
include_once './footer.php';
?>
