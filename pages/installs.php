<?php
session_start();
$_SESSION['current_page'] = '| Install Guide';
include_once './header.php';

?>
<div class="container text-white">
    <h1 class="text-center uppercase"><?php echo getOS() . " - " . getBrowser();?></h1>
    <div class="news-article text-white p-4">
        <div class="d-flex justify-content-center">
            <button class="btn text-white" onclick="openOS('Windows')">Windows<img src="../assets/images/windows-3384007_640-removebg-preview.png" height="35" width="35" /></button>
            <button class="btn text-white" onclick="openOS('Mac')">Mac<img src="../assets/images/apple-3383994_640-removebg-preview.png" height="35" width="35" /></button>
        </div>
        <hr>
        <div id="Windows" class="text-center os">
            <h2 class="text-center"><img src="../assets/images/windows-3384007_640-removebg-preview.png" height="50" width="50" />Windows<img src="../assets/images/windows-3384007_640-removebg-preview.png" height="50" width="50" /></h2>
            <p>Download the </p>
        </div>
        <div id="Mac" class="text-center os" style="display: none">
            <h2 class="text-center"><img src="../assets/images/apple-3383994_640-removebg-preview.png" height="50" width="50" />Mac<img src="../assets/images/apple-3383994_640-removebg-preview.png" height="50" width="50" /></h2>
            <p>Download the </p>
        </div>
    </div>
</div>
<script>function openOS(os) {
        var i;
        var x = document.getElementsByClassName("os");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(os).style.display = "block";
    }
</script>
<?php
include_once './footer.php';
?>
