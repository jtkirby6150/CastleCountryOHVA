<?php

include "includes/header.php";
include "../mainincludes/init.php";

include "includes/nav.php";

if(!isset($_SESSION['username'])){
    set_message("You must be logged in to view that page.");
    redirect("../login.php");
    exit();
}

$title =  "";
$date = "";
$description = "";
$image = "";
$time = "";
$loc = "";
$gps = "";
$difficulty = "";
$duration = "";
$dir = "../assets/img/otherevents";

if(isset($_GET['edit'])){
    $id = escape($_GET['edit']);
    $sql = query("SELECT * FROM otherevents WHERE id = '$id'");
    while($row = fetch_array($sql)){
        $title =  $row['title'];
        $date = $row['date'];
        $description = $row['description'];
        $time = $row['time'];
        $loc = $row['location'];
        $gps = $row['gps'];
        $difficulty = $row['difficulty'];
        $duration = $row['duration'];
        $image = $row['image'];
    }

}

if(isset($_POST['addevent'])){
    $title =  escape($_POST['title']);
    $date = escape($_POST['date']);
    $description = escape($_POST['description']);
    $time = escape($_POST['time']);
    $loc = escape($_POST['location']);
    $gps = escape($_POST['gps']);
    $difficulty = escape($_POST['difficulty']);
    $duration = escape($_POST['duration']);



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
            $getimg = query("SELECT * FROM otherevents WHERE id = '$id'");
            while($imgrow = fetch_array($getimg)){
                $image = $imgrow['image'];
            }
        }

    }



    $sql = query("INSERT INTO otherevents (title, date, time, location, gps, difficulty, duration, description, image) VALUES ('$title', '$date', '$time', '$loc', '$gps', '$difficulty', '$duration', '$description', '$image')");
    confirm($sql);
    set_message("You have successfully added a new Event: $title", "success");
    redirect("otherevents.php");
    exit();
}
if(isset($_POST['editevent'])){
    $id = escape($_GET['edit']);
    $title =  escape($_POST['title']);
    $date = escape($_POST['date']);
    $description = escape($_POST['description']);
    $time = escape($_POST['time']);
    $loc = escape($_POST['location']);
    $gps = escape($_POST['gps']);
    $difficulty = escape($_POST['difficulty']);
    $duration = escape($_POST['duration']);

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
            $getimg = query("SELECT * FROM otherevents WHERE id = '$id'");
            while($imgrow = fetch_array($getimg)){
                $image = $imgrow['image'];
            }
        }

    }

    $sql = query("UPDATE otherevents SET title = '$title', date = '$date', time = '$time', location = '$loc', gps = '$gps', difficulty = '$difficulty', duration = '$duration', image = '$image', description = '$description' WHERE id = '$id'");
    confirm($sql);
    set_message("You have successfully updated the event: $title", "success");
    redirect("otherevents.php?edit=$id");
    exit();
}
?>
<div class="container">
    <?php display_message(); ?>

    <form method="post" enctype="multipart/form-data" class="mb-5">
        <h1 style="text-align: center;" class="mt-5 mb-5">Other Events</h1>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <?php
                    if($image){
                        echo "<div class='text-center'><img src='$dir/$image' width='200px' alt=''></div>";
                    }
                    ?>
                    <label for="image">Event Picture</label>
                    <input value="<?php echo $image ?>" class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <input value="<?php echo $title ?>" class="form-control" type="text" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <input value="<?php echo date("Y-m-d", strtotime($date)) ?>" class="form-control" type="date" name="date" placeholder="Date">
                </div>
                <div class="form-group">
                    <input value="<?php echo $time ?>" class="form-control" type="time" name="time" placeholder="Time">
                </div>
                <div class="form-group">
                    <input value="<?php echo $loc ?>" class="form-control" type="text" name="location" placeholder="Location">
                </div>
                <div class="form-group">
                    <input value="<?php echo $gps ?>" class="form-control" type="text" name="gps" placeholder="GPS">
                </div>
                <div class="form-group">
                    <input value="<?php echo $difficulty ?>" class="form-control" type="text" name="difficulty" placeholder="Difficulty">
                </div>
                <div class="form-group">
                    <input value="<?php echo $duration ?>" class="form-control" type="text" name="duration" placeholder="Duration">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group"><textarea id="eventtitledescription" class="form-control" name="description" id="" cols="30" rows="6" placeholder="Description"> <?php echo $description ?> </textarea>
                </div>
            </div>
        </div>
        <?php
        if(isset($_GET['edit'])){
            echo "<div class='form-row'>
                <div class='col text-center'><button name='editevent' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Update Event Info</button></div>
            </div>";
        } else {
            echo "<div class='form-row'>
                <div class='col text-center'><button name='addevent' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Add Event</button></div>
            </div>";
        }
        ?>
    </form>

    <?php
    include "includes/footer.php"; ?>
</div>
