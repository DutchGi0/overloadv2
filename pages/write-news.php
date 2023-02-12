<?php
session_start();
$_SESSION['current_page'] = '| Write News';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
include_once './header.php';

?>

<div class="container">
    <h1 class="text-white uppercase text-center">Write a new news article</h1>
    <div class="news-article text-white">
        <button class="btn text-danger open-button float-end" onclick="openHelp()">Help?</button>
        <div class="news-article form-popup" id="myForm">
            <form action="" class="form-container">
                <h1>How to write a news post?</h1>
                    <ol>
                        <li>Write a title for your news post.</li>
                        <li>Choose a category for your news post.</li>
                        <li>Write a header text for your news post.</li>
                        <li>Write the content of your news post.</li>
                        <ul>
                            <li>For images go to <a style="text-decoration: none" class="text-warning fa-bold" href="images.php">Images</a></li>
                            <li>Once you uploaded or found an images, copy the image path and paste it as the source.</li>
                        </ul>
                        <li>Choose a publishing date for your news post.</li>
                        <li>Click on the submit button to save your news post.</li>
                    </ol>

                <button type="button" class="btn cancel" onclick="closeHelp()">Close</button>
            </form>
        </div>
        <form action="" method="post" enctype="multipart/form-data" id="save-content-form">
            <div class="form-group">
                <label for="name">News title<span class="text-danger fs-6">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="News title" required>
            </div>
            <div class="form-group">
                <label for="category">Category<span class="text-danger fs-6">*</span></label>
                <select class="form-select" id="category" name="category" required>
                    <?php
                    $sql = "SELECT * FROM category";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($results as $row) {
                        $category_id = $row['id'];
                        $category_name = $row['category_name'];

                        echo '<option value="' . $category_id . '">' . $category_name . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="header">Header text (max 250 chars)<span class="text-danger fs-6">*</span></label>
                <textarea class="form-control" id="#tinymce" name="header" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Content<span class="text-danger fs-6">*</span></label>
                <textarea class="form-control" id="tinymce" name="content" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="publishdate">Publish Date</label>
                <input type="date" class="form-control" id="publishdate" name="publishdate" value="<?php
//                get the current day
                $now = new DateTime();
                $today = $now->format('Y-m-d');
                echo $today;
                ?>">
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button>
        </form>
    </div>
</div>

<script>
    function openHelp() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeHelp() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
<?php

if (isset($_POST['submit'])) {
    $category = htmlspecialchars($_POST['category']);
    $name = htmlspecialchars($_POST['name']);
    $header = htmlspecialchars($_POST['header']);
    $content = htmlspecialchars($_POST['content']);
    $user_id = $_SESSION['user_id'];
    $publishdate = $_POST['publishdate'];
    if ($category == 1){
        $image = 'game.png';
    } else {
        $image = 'web.png';
    }

    $sql = 'INSERT INTO news (user_id, category_id, news_title, news_publish_date , news_tweet_text, news_body_text, news_image, news_published) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        $user_id,
        $category,
        $name,
        $publishdate,
        $header,
        $content,
        $image,
        "1"
    ]);


    if ($result) {
        echo '<script>alert("News created successfully")</script>';
        echo '<script>window.location.href = "all-news.php"</script>';
    } else {
        echo '<script>alert("News creation failed")</script>';
    }
}
include_once './footer.php';
?>
