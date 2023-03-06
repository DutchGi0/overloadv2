<?php
session_start();
$_SESSION['current_page'] = '| Foe Perks';
include_once './header.php';

?>
<div class="container text-white">
    <h1 class="text-center uppercase">Fire of Exchange Perks</h1>
    <div class="news-article text-white">
        <div class="row row-cols-1 row-cols-md-3 g-4 text-center p-3">

                <?php
                $sql = "SELECT * FROM foe_pet";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    echo '<div class="col">';
                    echo '<div class="card h-100">';
                    echo "<img style='height: 150px; width: 200px;' class='card-img-top mx-auto' alt='...' src='../assets/images/foe/" . $row['image'] . "' alt=''/>";
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['pet_name'] . '</h5>';
                    echo '<p class="card-text">' . $row['description'] . '</p>';
                    echo '<small class="text-muted">Costs: ' . $row['points'] . ' points</small>';
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                }
                ?>
           </div>
    </div>
</div>
<?php
include_once './footer.php';
?>
