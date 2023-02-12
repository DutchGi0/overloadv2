<?php
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
require_once '../assets/php/dbconfig.php';
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
        echo json_encode([
            'success' => true,
            'message' => 'News updated successfully'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Something went wrong. Please try again.'
        ]);
}

