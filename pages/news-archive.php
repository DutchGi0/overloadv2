<?php
session_start();
$_SESSION['current_page'] = '| Home';
require_once '../assets/php/dbconfig.php';
include_once './header.php';
?>

<div class="container">
    <h1 class="text-center text-white"><span class="title">N</span>ews Archive</h1>
    <div class="news-article text-white">
        <table class="table table-dark table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM news 
                    inner join user on news.user_id = user.id 
                    INNER JOIN category ON news.category_id = category.id 
                         where news.user_id 
                         ORDER BY `news`.`news_publish_date`
                         DESC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    $date = date_create($row['news_publish_date']);
                    $row['news_publish_date'] = date_format($date, 'M-d-Y');
                    echo '<tr>';
                    echo '<td>' . $row['news_title'] . '</td>';
                    echo '<td>' . $row['category_name'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['news_publish_date'] . '</td>';
                    echo '<td><a href="newsarticle.php?id=' . $row['news_id'] . '" style="text-decoration: none">Read more</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once './footer.php';
?>
