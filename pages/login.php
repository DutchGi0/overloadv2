<?php
// TODO: Change the Login to a different address
session_start();
$_SESSION['current_page'] = '| Login';
include_once './header.php';

?>
<div class="container text-white">
    <h1 class="text-center">Login</h1>
    <div class="news-article">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>

<?php
$message = '';
if (isset($_POST['submit'])) {

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        if (password_verify($password, $result['password'])) {
            $_SESSION['username'] = $result['username'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['user_id'] = $result['id'];
            echo "<script>window.location.href = 'home.php'</script>";
        } else {
            $message = 'Incorrect password or username';
        }
    } else {
        $message = 'Incorrect password or username';
    }
}
echo "<div class='text-white text-center'>$message</div>";
include_once './footer.php';
?>

<!-- $sql = "SELECT * FROM `giveaway` ORDER BY ABS(giveaway_end_date - CURRENT_TIMESTAMP) LIMIT 1;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($result == 0) {
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $dateStartFromDB = $row['giveaway_start_date'];
                        $dateEndFromDB = $row['giveaway_end_date'];
                        $date_start = DateTimeInterface::ATOM;
                        $date_end = DateTimeInterface::ATOM;
                        $date_start = date('M-d-Y', strtotime($dateStartFromDB));
                        $date_end = date('M-d-Y H:i:s', strtotime($dateEndFromDB));
                        echo "<h2 class='text-center uppercase p-2'><span class='title'>C</span>urrent Giveaway</h2>";
                        echo " <div class='home-item'>";
                        echo "<h3 class='text-center title m-4'>" . $row['giveaway_title'] . "</h3>";
                        echo "<p><strong>Description:</strong> " . $row['giveaway_description'] . "</p>";
                        echo "<p>From: <span class='date'>" . $date_start . "</span> Till <span class='date'>" . $date_end . "</span></p>";
                        echo "<a target='_blank' href='https://dyno.gg/giveaway/" . $row['giveaway_link'] . "' class='btn btn-primary'>View</a>";
                        echo "</div>";
                    }
                }
                }-->