<?php
include "includes/header.php";
include "../mainincludes/init.php";
include "includes/nav.php";

if(!isset($_SESSION['username'])){
    set_message("You must be logged in to view that page.");
    redirect("../login.php");
    exit();
}


$image = '';
$title = '';
$date = '';
$description = '';
$dir = "../assets/img/news";




if(isset($_GET['updatenewsinfo'])){
    $newsID = escape($_GET['updatenewsinfo']);
    $getInfo = query("SELECT * FROM news WHERE id = '$newsID'");
    while ($infoRow = fetch_array($getInfo)){
        $title = $infoRow['title'];
        $date = $infoRow['date'];
        $description = $infoRow['description'];
        $image = $infoRow['image'];
    }
}


if(isset($_POST['addnews'])){
    $title = escape($_POST['title']);
    $date = escape($_POST['date']);
    $description = escape($_POST['description']);

    if($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $fileDestination = $dir."/".$image;
        $uploadOK = 1;
        $imgFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['image']['tmp_name']);
        if($check !== false){
            $uploadOK = 1;
        } else {
            $uploadOK = 0;
            $errors[] = "File is not an image.";
        }

        if(file_exists($image)){
            $errors[] = "File already exists.";
            $uploadOK = 0;
        }

        if($_FILES['image']['size'] > 5000000){
            $errors[] = "File is too large. 5MB or less are allowed.";
            $uploadOK = 0;
        }

        if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg"){
            $errors[] = "Only JPG, JPEG, and PNG file types are allowed at this time.";
        }

        if($uploadOK == 0){
            $errors = "Sorry your image was not uploaded for the following reason(s):";
            foreach ($errors as $error){
                display_message();
            }
        } else {
            if(move_uploaded_file($_FILES['image']['tmp_name'], $fileDestination)){

            } else {
                set_message("Sorry there was an error uploading your photo.<br>Please ensure it is either a JPG, JPEG, or PNG file that is less than 5MB in size.");
            }
        }

    }

    $addNews = query("INSERT INTO news (title, date, description, image) VALUES ('$title', '$date', '$description', '$image')");
    confirm($addNews);
    set_message("You have successfully added the News: $title", "success");
    global $conn;
    $lastid = mysqli_insert_id($conn);
    redirect("adminnews.php?updatenewsinfo=$lastid");
    exit();


}

if(isset($_POST['updatenews'])){
    $title = escape($_POST['title']);
    $date = escape($_POST['date']);
    $description = escape($_POST['description']);

    if($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $fileDestination = $dir."/".$image;
        $uploadOK = 1;
        $imgFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['image']['tmp_name']);
        if($check !== false){
            $uploadOK = 1;
        } else {
            $uploadOK = 0;
            $errors[] = "File is not an image.";
        }

        if(file_exists($image)){
            $errors[] = "File already exists.";
            $uploadOK = 0;
        }

        if($_FILES['image']['size'] > 5000000){
            $errors[] = "File is too large. 5MB or less are allowed.";
            $uploadOK = 0;
        }

        if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg"){
            $errors[] = "Only JPG, JPEG, and PNG file types are allowed at this time.";
        }

        if($uploadOK == 0){
            $errors = "Sorry your image was not uploaded for the following reason(s):";
            foreach ($errors as $error){
                display_message();
            }
        } else {
            if(move_uploaded_file($_FILES['image']['tmp_name'], $fileDestination)){

            } else {
                set_message("Sorry there was an error uploading your photo.<br>Please ensure it is either a JPG, JPEG, or PNG file that is less than 5MB in size.");
            }
        }

        if(!isset($_FILES['image']['name'])){
            $getimg = query("SELECT * FROM news WHERE id = '$newsID'");
            while($imgrow = fetch_array($getimg)){
                $image = $imgrow['image'];
            }
        }

    }

    $updateNews = query("UPDATE news SET title = '$title', date = '$date', description = '$description', image = '$image' WHERE id = '$newsID'");
    confirm($updateNews);
    set_message("You have successfully added updated the news title: $title", "success");
    redirect("adminnews.php?updatenewsinfo=$newsID");
    exit();
}



?>
    <div class="container">
        <h1 style="text-align: center;margin: 50px;">News</h1>
        <?php display_message(); ?>
        <div style="text-align: center;margin-bottom: 10px;">
            <?php
            if($image){
                echo "<img src='$dir/$image' style='height: 420px;'>";
            }

            ?></div>
        <form method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col" style="text-align: center;">
                    <div class="form-group"><label>Image:&nbsp; &nbsp;</label><input name="image" type="file"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><label>Title:&nbsp;</label><input value="<?php echo $title ?>" name="title" class="form-control" type="text"></div>
                </div>
                <div class="col"><label>Date:&nbsp;</label>
                    <div class="form-group"><input name="date" value="<?php echo $date ?>" class="form-control" type="date"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><label>Description:</label><textarea id="newsdescription" name="description" class="form-control"><?php echo $description ?></textarea></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <?php
                    if(isset($_GET['updatenewsinfo'])){
                        echo "<div style='text-align: center;'><button name='updatenews' class='btn' data-bs-hover-animate='pulse' type='submit' style='color: #f2efea;background: #af6b58;'>Update News</button>";
                    } else {
                        echo "<div style='text-align: center;'><button name='addnews' class='btn' data-bs-hover-animate='pulse' type='submit' style='color: #f2efea;background: #af6b58;'>Add News</button>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </form>
         <?php
include "includes/footer.php"; ?>
    </div>
