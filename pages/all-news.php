<?php
session_start();
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
$_SESSION['current_page'] = '| All News';
require_once '../assets/php/dbconfig.php';
include_once './header.php';
?>

    <div class="container">
        <h1 class="text-center text-white">All news</h1>
        <div class="news-article text-white">
            <table class="table table-dark table-striped table-responsive">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Published Date</th>
                    <th scope="col">Published?</th>
                    <th scope="col" class="text-center">Action</th>
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
                        if ($row['news_published'] == 0) {
                            $color = 'text-success';
                            $row['news_published'] = '<i class="fa-solid fa-toggle-on fa-xl"></i>';
                        } else {
                            $color = 'text-danger';
                            $row['news_published'] = '<i class="fa-solid fa-toggle-off fa-xl"></i>';
                        }
                        echo '<tr>';
                        echo '<td>' . $row['news_title'] . '</td>';
                        echo '<td>' . $row['category_name'] . '</td>';
                        echo '<td>' . $row['username'] . '</td>';
                        echo '<td>' . $row['news_publish_date'] . '</td>';
                        echo '<td class="fw-bold '.$color.'">' . $row['news_published'] . '</td>';
                        echo '<td class="text-center"><a style="text-decoration: none" class="text-white" href="edit-news.php?id=' . $row['news_id'] . '" style="text-decoration: none">Edit <i class="fa-solid fa-pen-to-square text-white"></i></a>
                                <a style="text-decoration: none" class="text-white" href="publish-news.php?id=' . $row['news_id'] . '" style="text-decoration: none">Publish <i class="fa-solid fa-toggle-on text-white"></i></a></td>';
                        echo '</tr>';
                }
                if ($result == null) {
                    echo '<tr>';
                    echo '<td colspan="6" class="text-center">No news found!</td>';
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
<?php
