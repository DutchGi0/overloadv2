<?php
session_start();
$_SESSION['current_page'] = '| Giveaway';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
include_once './header.php';

?>
<div class="container">
    <h1 class="text-white uppercase text-center">Giveaways</h1>
    <div class="news-article table-responsive">
        <a href="./create-giveaway.php" class="btn btn-primary">Add Giveaway</a>
        <table id="users" class="table table-striped table-dark ">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Giveaway name</th>
                <th scope="col">Description</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM giveaway ORDER BY id DESC ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $active = $row['giveaway_active'];
                if ($active == 0) {
                    $active = 'Yes';
                    $color = 'text-success';
                } else {
                    $active = 'No';
                    $color = 'text-danger';
                }
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['giveaway_title'] . '</td>';
                echo '<td>' . $row['giveaway_description'] . '</td>';
                echo '<td class="fw-bold '.$color.'">' . $active . '</td>';
                echo '<td colspan="2"><a class="text-white" href="./edit-giveaway.php?id=' . $row['id'] . '" class="btn">Edit<i class="fa-solid fa-pen-to-square text-white"></i></a>
                        <a class="text-white" href="./publish-giveaway.php?id=' . $row['id'] . '" class="btn">Publish<i class="fa-solid fa-pen-to-square text-white"></i></a></td>';
                echo '</tr>';
            }
            if ($result == null) {
                echo '<tr>';
                echo '<td colspan="4" class="text-center">No giveaways found!</td>';
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
