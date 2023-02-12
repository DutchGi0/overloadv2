<?php
session_start();
$_SESSION['current_page'] = '| News Article';
include_once './header.php';

?>


<div class="container">
    <?php
    $sql = "SELECT * FROM news 
                inner join user on news.user_id = user.id 
                INNER JOIN category ON news.category_id = category.id
                where news.news_id = ? 
                ORDER BY news.news_id 
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $date = date_create($row['news_publish_date']);
            $row['news_publish_date'] = date_format($date, 'M-d-Y');
            $author = $row['username'];
            $title = $row['news_title'];
            $date = $row['news_publish_date'];
            $category = $row['category_name'];
            $image = $row['news_image'];
            $text = $row['news_body_text'];
            if ($row['news_published'] == 0) {
            echo "<div class='news-article p-3 text-white rounded mb-5'>";
            echo "<p aria-labelledby='News Titel' class='title-bar'><span class='title' style='font-size: 2.5rem'>" . $title . "</span>  <span class='float-end'><span class=''> " . $category . "</span> | " . $author . " | " . $date . "</span></p>";
            echo "<p aria-labelledby='News Message'>" . $text . "</p>";
            echo "</div>";
        } else {
                echo "<script>window.location.href = 'news.php';</script>";
            }
        }
    ?>
    <button onclick="BackFunction()" id="btACP" title="Back to last page">Back</button>
</div>
<?php
include_once './footer.php';
?>

