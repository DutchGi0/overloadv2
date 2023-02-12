<?php
session_start();
$_SESSION['current_page'] = '| Home';
require_once '../assets/php/dbconfig.php';
include_once './header.php';
?>
<div class="container">
    <div id="carouselExampleInterval" class="carousel slide my-3" data-bs-ride="carousel">
        <div class="carousel-inner text-center">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="../assets/images/raids3.png" class="rounded" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="../assets/images/home.png" class="rounded" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="../assets/images/dz.png" class="rounded" alt="...">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col text-white p-2 rounded news ms-3">
            <!--            TODO: Animate the countdown clock-->

            <div class="news-article">
                <h2 class="text-center">Overload V2 launch!</h2>
                <div id="countdown">
                    <div class="countdown-item">
                        <h3 id="days"></h3>
                        <p>Days</p>
                    </div>
                    <div class="countdown-item">
                        <h4 id="hours"></h4>
                        <p>Hours</p>
                    </div>
                    <div class="countdown-item">
                        <h5 id="minutes"></h5>
                        <p>Minutes</p>
                    </div>
                    <div class="countdown-item">
                        <p id="seconds"></p>
                        <p>Seconds</p>
                    </div>
                </div>
            </div>

                <?php

                $sql = "SELECT * From giveaway WHERE giveaway_active = 0 ORDER BY giveaway_end_date ASC LIMIT 2";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (count($result) > 0) {
                    echo "<h2 class='text-center uppercase p-2'><span class='title'>C</span>urrent Giveaway</h2>";
                    echo " <div class='home-item'>";
                    foreach ($result as $row) {
                            $dateStartFromDB = $row['giveaway_start_date'];
                            $dateEndFromDB = $row['giveaway_end_date'];
                            $date_start = DateTimeInterface::ATOM;
                            $date_end = DateTimeInterface::ATOM;
                            $date_start = date('M-d-Y', strtotime($dateStartFromDB));
                            $date_end = date('M-d-Y H:i:s', strtotime($dateEndFromDB));

                            echo "<h3 class='text-center title m-4'>" . $row['giveaway_title'] . "</h3>";
                            echo "<h5 class='text-center'><strong>Description:</strong> " . $row['giveaway_description'] . "</h5>";
                            echo "<p class='text-center'>Giveaway is active till <span class='date'>" . $date_end . "</span></p>";
                            echo "<div class='text-center'>";
                            echo "<button class='btn btn-primary m-2'><a class='text-dark fa-bold' style='text-decoration: none' href='https://dyno.gg/giveaway/" . $row['giveaway_link'] . "'>View</a></button>";
                            echo "</div>";
                            echo "<hr>";
                        }
                    echo "</div>";

                }
                ?>
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
            if ($row['news_published'] == 0) {
                $date = date_create($row['news_publish_date']);
                $row['news_publish_date'] = date_format($date, 'M-d-Y');
                echo "<div class='news-article p-3 rounded'>";
                echo "<p class='title-bar'><span class='title' style='font-size: 1.25rem'>" . $row['news_title'] . "</span>  <span class='float-end'>" . $row['username'] . " | " . $row['news_publish_date'] . "</span></p>";
                if ($row['news_image'] != null) {
                    echo "<div class='row'>
                        <div class='col-3'>";
                    echo "<p><img style='width: 150px; height: 150px' src='../assets/images/news/" . $row['news_image'] . "' alt=''/></div> ";
                    echo "<div class='col'>" . $row['news_tweet_text'] . " <a style='text-decoration: none' href='newsarticle.php?id=" . $row['news_id'] . "'>Read more</a></p>";
                    echo "</div></div></div>";
                } else {
                    echo "<p>" . $row['news_tweet_text'] . "  <a style='text-decoration: none' href='newsarticle.php?id=" . $row['news_id'] . "'>Read more</a></p>";
                    echo "</div>";
                }
            }
            }
            ?>
            <span class="float-end home-item"><a class="text-primary" href="news.php" style="text-decoration: none">View all news</a></span>
        </div>
        <div class="col-4 text-white mt-2 ms-3 me-2 rounded">
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

<!--            <div class="home-item shown embed-responsive">-->
<!--                           TODO: Placing the correct youtube trailer-->
<!---->
<!--                <h3 class="mt-3 text-center"">Trailer-->
<!--                <div class="m-3 d-flex justify-content-center">-->
<!--                    <iframe src="https://www.youtube.com/embed/BJhF0L7pfo8"-->
<!--                            title="YouTube video player"-->
<!--                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
<!--                            allowfullscreen></iframe>-->
<!--                </div>-->
<!--            </div>-->


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
                        echo "<p>From: <span class='date'>" . $date_start . "</span> Till <span class='date'>" . $date_end . "</span></p>";
                        echo "</div>";
                    }
                } else {
                    echo "<h3 class='text-center m-4'>No events</h3>";
                }
                ?>
            </div>

            <div class="home-item shown">
                <h3 class="mb-3 text-center"">Join our
                <a class="text-primary" style="text-decoration: none" target='_blank' href="https://discord.com/invite/n8V8tkkp8M">Discord</a></h3>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>

<script>
    let countDownDate = new Date("Feb 28, 2023 00:00:00").getTime();

    const tl = new TimelineMax();

    let x = setInterval(function () {
        const now = new Date().getTime();
        const distance = countDownDate - now;
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("days").innerHTML = "<span class='days'> " + days + "</span> ";
        document.getElementById("hours").innerHTML = "<span class='hours'> " + hours + "</span> ";
        document.getElementById("minutes").innerHTML = "<span class='minutes'> " + minutes + "</span> ";
        document.getElementById("seconds").innerHTML = "<span class='seconds'> " + seconds + "</span> ";
        // change the animation when minute changes
        // TODO: changing the animations
        if (seconds === 0) {
            tl.to('.minutes', 2, {opacity: 0, y: 0}, '-=1')
                .to('.minutes', 3, {opacity: 1, y: 0}, '>.5')
        }
        if (minutes === 0) {
           document.getElementById("minutes").innerHTML = "<span class='minutes text-primary'>0 </span> ";
        }
        if (days === 0) {
            document.getElementById("days").innerHTML = "<span class='minutes text-primary'>0 </span> ";
        }

        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);

</script>
<?php
include_once './footer.php';
?>
