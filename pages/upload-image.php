<?php
session_start();
$_SESSION['current_page'] = '| Publish News';
if (!$_SESSION['username']) {
    echo '<script>window.location.href = "login.php";</script>';
}
include_once './header.php';

?>
<div class="container">
    <div class="news-article text-white">
        <h2 class="text-white uppercase text-center">Upload Image</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Image<span class="text-danger fs-6">*</span></label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button type="button" class="btn btn-danger float-end" onclick="BackFunction()">Cancel</button>
        </form>
    </div>
</div>
<?php
// upload image to ../../assets/images
if (isset($_POST['submit'])) {
    $target_dir = "../assets/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is an actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = 'INSERT INTO image (image_name) VALUES (?)';
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                $_FILES["image"]["name"]
            ]);

            echo "<script>alert('The file has been uploaded.')</script>";
            echo '<script>window.location.href = "./images.php"</script>';
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
include_once './footer.php';
?>
