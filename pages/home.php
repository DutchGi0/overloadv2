<?php
session_start();
$_SESSION['current_page'] = '| Home';
require_once '../assets/php/dbconfig.php';
include_once './header.php';
?>
<div class="container">
    <div id="carouselExampleInterval" class="carousel slide my-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="7500">
                <img src="https://via.placeholder.com/1620x175?text=Carousel+1" class="" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="7500">
                <img src="https://via.placeholder.com/1620x175?text=Carousel+2" class="" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="7500">
                <img src="https://via.placeholder.com/1620x175?text=Carousel+3" class="" alt="...">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col text-white p-2 rounded news ms-3">
            <div class="text-center news-article">
                <h2>Overload v2 launch!</h2>
                <p>Release Date</p>
                <p id="counter"></p>
            </div>
            <h2 class="text-center mb-4">Recent news</h2>
            <?php
            $sql = "SELECT * FROM news 
                inner join user on news.user_id = user.id 
                INNER JOIN category ON news.category_id = category.id
                where news.user_id 
                ORDER BY `news`.`news_publish_date` 
                DESC LIMIT 5";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $date = date_create($row['news_publish_date']);
                $row['news_publish_date'] = date_format($date, 'M-d-Y');
                echo "<div class='news-article p-3 rounded'>";
                echo "<p class='title-bar'><span class='title' style='font-size: 1.25rem'>" . $row['news_title'] . "</span>  <span class='float-end'><span class=''> " . $row['category_name'] . "</span> | " . $row['username'] . " | " . $row['news_publish_date'] . "</span></p>";
                if ($row['news_image'] != null) {
                    echo "<div class='row'>
                        <div class='col-3'>";
                    echo "<p><img style='width: 150px' src='" . $row['news_image'] . "' alt=''/></div> ";
                    echo "<div class='col'>" . $row['news_tweet_text'] . " ... <a style='text-decoration: none' href='newsarticle.php?id=" . $row['news_id'] . "'>Read more</a></p>";
                    echo "</div></div></div>";
                } else {
                    echo "<p>" . $row['news_tweet_text'] . " ... <a style='text-decoration: none' href='newsarticle.php?id=" . $row['news_id'] . "'>Read more</a></p>";
                    echo "</div>";
                }
            }
            ?>
            <span class="float-end home-item"><a class="text-primary" href="news.php" style="text-decoration: none">View all news</a></span>
        </div>
        <div class="col-4 text-white ms-5 me-2 rounded">
            <?php if (isset($_SESSION['role'])) { ?>
                <div class="home-item">
                    <h3 class="text-center uppercase m-4">Welcome <span
                                class="text-primary"><?php echo $_SESSION['username'] ?></span></h3>
                    <div class="login d-flex justify-content-center gap-4 mb-3">
                        <a href="acp.php" class="btn btn-secondary">Admin Panel</a>
                        <a href="logout.php" class="btn btn-secondary">Logout</a>
                    </div>
                </div>
            <?php } ?>

            <div class="home-item shown embed-responsive">
                <h3 class="mt-3 text-center"">Trailer
                <div class="m-3 d-flex justify-content-center">
                    <iframe  src="https://www.youtube.com/embed/BJhF0L7pfo8"
                             title="YouTube video player"
                             allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                             allowfullscreen></iframe>
                </div>
            </div>


            <div class='home-item'>
                <?php
                $sql = "SELECT * From event WHERE event_date_end >= CURDATE() ORDER BY event_date_start ASC LIMIT 2";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo "<h2 class='text-center uppercase p-2'><span class='title'>C</span>urrent events</h2>";
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $dateStartFromDB = $row['event_date_start'];
                        $dateEndFromDB = $row['event_date_end'];
                        $date_start = DateTimeInterface::ATOM;
                        $date_end = DateTimeInterface::ATOM;
                        $date_start = date('M-d-Y', strtotime($dateStartFromDB));
                        $date_end = date('M-d-Y', strtotime($dateEndFromDB));
                        echo "<h3 class='text-center title m-4'>" . $row['event_name'] . "</h3>";
                        echo "<div class='login text-center mb-3'>";
                        echo "<p>From: <span class='date'>". $date_start . "</span> Till <span class='date'>" . $date_end."</span></p>";
                        echo "</div>";
                    }
                } else {
                    echo "<h3 class='text-center m-4'>No events</h3>";
                }
                ?>
            </div>

            <div class="home-item shown">
                <h3 class="mb-3 text-center"">Join our
                    <a class="text-primary" style="text-decoration: none" href="https://discord.com/invite/n8V8tkkp8M">Discord</a></h3>
                <div class="m3- d-flex justify-content-center">
                    <iframe class="embed-responsive-item"
                            src="https://discord.com/widget?id=1031687907506933840&theme=dark" width="309" height="426"
                            allowtransparency="true"
                            sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                </div>
            </div>
        </div>

    </div>
</div>

<script>

    const countDownDate = new Date("02-28-2025").getTime();
    // Update the count down every 1 second
    const x = setInterval(function () {
        const now = new Date().getTime();
        // Find the distance between now an the count down date
        const distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="counter"11
        document.getElementById("counter").innerHTML = days + " Day(s) : " + hours + "h " +
            minutes + "m " + seconds + "s ";
        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("counter").innerHTML = "Overload V2 launched! &#128513;";
        }
    }, 1000);
</script>
<?php
include_once './footer.php';
?>
