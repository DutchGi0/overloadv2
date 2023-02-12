<?php
session_start();
$_SESSION['current_page'] = '| Events';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
include_once './header.php';

?>

<div class="container text-white">
    <h1 class="text-center">All Events</h1>
    <div class="news-article">
        <table id="dtVerticalScrollExample" class="table table-dark table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Event Name</th>
                <th scope="col">Created by</th>
                <th scope="col">Event Date Start</th>
                <th scope="col">Event Date End</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM event INNER JOIN user ON event.user_id = user.id ORDER BY event_date_start DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                $dateStart = date_create($row['event_date_start']);
                $dateEnd = date_create($row['event_date_end']);
                $row['event_date_start'] = date_format($dateStart, 'M-d-Y');
                $row['event_date_end'] = date_format($dateEnd, 'M-d-Y');
                echo '<tr>';
                echo '<td>' . $row['event_name'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['event_date_start'] . '</td>';
                echo '<td>' . $row['event_date_end'] . '</td>';
                echo '</tr>';
            }
            if ($results == null) {
                echo '<tr>';
                echo '<td colspan="4" class="text-center">No events found!</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<button onclick="BackFunction()" id="btACP" title="Back to last page">Back</button>
<?php
include_once './footer.php';
?>
