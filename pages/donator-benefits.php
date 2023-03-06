<?php
session_start();
$_SESSION['current_page'] = '| Donator Benefits';
include_once './header.php';

?>

<div class="container text-white">
    <style>
        .fa-check {
            color: #00ff00;
            font-size: 1.2em;
        }

        .fa-xmark {
            color: #ff0000;
            font-size: 1.2em;
        }
    </style>
    <h1 class="text-center uppercase">Donator Benefits</h1>
    <div class="news-article text-white">
        <table class="table table-dark table-striped text-center" >
            <thead>
                <tr>
                    <th scope="col">Donator Rank <br>Features</th>
                    <th scope="col" style="color: #666666;">Player <br>$0</th>
                    <th scope="col" style="color: #00ffff;">Sapphire <br> $50</th>
                    <th scope="col" style="color: #00ff00;">Emerald <br> $100</th>
                    <th scope="col" style="color: red;">Ruby <br> $250</th>
                    <th scope="col" style="color: #15bbdc;">Diamond <br> $500</th>
                    <th scope="col" style="color: #444444;">Onyx <br> $1.000</th>
                    <th scope="col" style="color: #ffa128;">Zenyte <br> $2.500</th>
                    <th scope="col" style="color: #f1c40f;">Divine <br> $5.000</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Donator Zone ::dz</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Player badge next to name</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Distinguished Discord Rank</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Global ::yell command</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Access to Titles <br>
                        (Donator, Extreme, etc)</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Legendary zone ::lz</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Custom title</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Onyx Zone ::oz</td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-times"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-check"></i></td>
                </tr>
                <tr>
                    <td>Drop Rate Boost! <br>
                    (staks with pets, RoW, etc)</td>
                    <td>0%</td>
                    <td>3%</td>
                    <td>4%</td>
                    <td>5%</td>
                    <td>6%</td>
                    <td>8%</td>
                    <td>10%</td>
                    <td>12%</td>
                </tr>
                <tr>
                    <td>Slayer points cost to <br>
                    Skip Tasks</td>
                    <td>30 Points</td>
                    <td>25 Points</td>
                    <td>25 Points</td>
                    <td>20 Points</td>
                    <td>20 Points</td>
                    <td>15 Points</td>
                    <td>10 Points</td>
                    <td>5 Points</td>
                </tr>
                <tr>
                    <td>Bonus PKP(per/kill)</td>
                    <td>0 PKP</td>
                    <td>+3 PKP</td>
                    <td>+5 PKP</td>
                    <td>+8 PKP</td>
                    <td>+10 PKP</td>
                    <td>+12 PKP</td>
                    <td>+15 PKP</td>
                    <td>+20 PKP</td>
                </tr>
                <tr>
                    <td>Yell Timer <br>
                        (reduced time in seconds)</td>
                    <td><i class="fas fa-times"></i></td>
                    <td>60 SECS</td>
                    <td>30 SECS</td>
                    <td>15 SECS</td>
                    <td>5 SECS</td>
                    <td>Instant</td>
                    <td>Instant</td>
                    <td>Instant</td>
                </tr>
                <tr>
                    <td>Bonus Slayer Points</td>
                    <td>+0</td>
                    <td>+3</td>
                    <td>+4</td>
                    <td>+5</td>
                    <td>+6</td>
                    <td>+8</td>
                    <td>+10</td>
                    <td>+15</td>
                </tr>
                <tr>
                    <td>Slayer Points cost to <br>
                        Block Tasks</td>
                    <td>100 Points</td>
                    <td>80 Points</td>
                    <td>80 Points</td>
                    <td>70 Points</td>
                    <td>70 Points</td>
                    <td>60 Points</td>
                    <td>50 Points</td>
                    <td>40 Points</td>
                </tr>
                <tr>
                    <td>Reduced kills for <br>
                    Godwars Dungeon!</td>
                    <td>20 KC</td>
                    <td>15 KC</td>
                    <td>10 KC</td>
                    <td>8 KC</td>
                    <td>6 KC</td>
                    <td>5 KC</td>
                    <td>3 KC</td>
                    <td>1 KC</td>
                </tr>
                <tr>
                    <td>Increased Trading Post<br>
                    Slots</td>
                    <td>6 Total</td>
                    <td>7 Total</td>
                    <td>8 Total</td>
                    <td>9 Total</td>
                    <td>10 Total</td>
                    <td>11 Total</td>
                    <td>12 Total</td>
                    <td>13 Total</td>
                </tr>
                <tr>
                    <td>Access unique skin colours</td>
                    <td><i class="fas fa-times"></i></td>
                    <td>All</td>
                    <td>All</td>
                    <td>All</td>
                    <td>All</td>
                    <td>All</td>
                    <td>All</td>
                    <td>All</td>
                </tr>
                <tr>
                    <td>Increased Cannonball<br>
                    capacity limit</td>
                    <td>30 Cballs</td>
                    <td>35 Cballs</td>
                    <td>40 Cballs</td>
                    <td>45 Cballs</td>
                    <td>50 Cballs</td>
                    <td>60 Cballs</td>
                    <td>70 Cballs</td>
                    <td>80 Cballs</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">
                        <a href="./store.php" target="_blank" class="btn btn-primary btn-lg btn-block">Donate Now</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php
include_once './footer.php';
?>
