<?php
session_start();
require_once '../assets/php/dbconfig.php';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$user_id = $_SESSION['user_id'];

$category = $_REQUEST['category'];
if ($category == 1){
    $image = 'game.png';
} else {
    $image = 'web.png';
}
$sql = 'INSERT INTO news (user_id, category_id, news_title, news_publish_date , news_tweet_text, news_body_text, news_image, news_published) 
VALUES (:user_id, :category_id, :news_title, :news_publish_date, :news_tweet_text, :news_body_text, :news_image , :news_published)';
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([
    ':user_id' => $user_id,
    ':category_id' => $_REQUEST['category'],
    ':news_title' => htmlspecialchars($_REQUEST['name']),
    ':news_publish_date' => $_REQUEST['publishdate'],
    ':news_tweet_text' => htmlspecialchars($_REQUEST['header']),
    ':news_body_text' => $_REQUEST['content'],
    ':news_image' => $image,
    ':news_published' => "1"

]);


if ($result) {
    echo '<script>alert("News created successfully")</script>';
    echo '<script>window.location.href = "all-news.php"</script>';
    $pdo = null;
} else {
    echo '<script>alert("News creation failed")</script>';
}
