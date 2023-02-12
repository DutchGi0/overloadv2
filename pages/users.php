<?php
session_start();
$_SESSION['current_page'] = '| Users';
include_once './header.php';

?>
<div class="container">
    <h1 class="text-white uppercase text-center">Users</h1>
    <div class="news-article table-responsive">
        <table id="users" class="table table-striped table-dark ">
            <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Active</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM user";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $row) {
                $active = $row['active'];
                if ($active == 1) {
                   $active = 'Yes';
                   $color = 'text-success';
                } else {
                    $active = 'No';
                    $color = 'text-danger';
                }

                if ($row['role'] == 'Web Dev') {
                    $colorRole = 'text-primary';
                } elseif ($row['role'] == 'Developer') {
                    $colorRole = 'text-warning';
                } elseif ($row['role'] == 'Admin') {
                    $colorRole = 'text-info';
                } elseif ($row['role'] == 'Owner') {
                    $colorRole = 'text-danger';
                } else {
                    $colorRole = 'text-white';
                }
                echo '<tr>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td class="'.$colorRole.'">' . $row['role'] . '</td>';
                echo '<td class="fw-bold '.$color.'">' . $active . '</td>';
                echo '<td colspan="2"><a href="./edit-user.php?id=' . $row['id'] . '" class="btn text-white"><i class="fa-solid fa-pen-to-square text-white"></i>Role</a>
                        <a href="./edit-user-password.php?id=' . $row['id'] . '" class="btn text-white "><i class="fa-solid fa-lock text-white"></i>Password</a></td>';
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
