<?php
session_start();
$_SESSION['current_page'] = '| News';
include_once './header.php';

?>
<div class="container">
<?php
$sql = "SELECT * FROM news 
    inner join user on news.user_id = user.id 
    INNER JOIN category ON news.category_id = category.id 
         where news.user_id 
         ORDER BY `news`.`news_publish_date`
         DESC
         LIMIT 10";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $date = date_create($row['news_publish_date']);
    $row['news_publish_date'] = date_format($date, 'M d Y');
    echo "<div class='news-article p-3 text-white rounded'>";
    echo "<p class='title-bar'><span class='title' style='font-size: 1.25rem'>" . $row['news_title'] . "</span>  <span class='float-end'><span class=''> " . $row['category_name'] . "</span> | " . $row['username'] . " | " . $row['news_publish_date'] . "</span></p>";

    echo "<p><img style='width: 150px' src='". $row['news_image']."' /> " . $row['news_tweet_text'] . " ... <a style='text-decoration: none' href='newsarticle.php?id=".$row['news_id']."'>Read more</a></p>";
    echo "</div>";
}
?>
    <div class="text-end text-white">
        <a class="news-article" href="news-archive.php" style="text-decoration: none">News Archive</a>
    </div>
</div>
<?php
include_once './footer.php';
?>
