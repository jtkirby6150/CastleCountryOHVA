<?php
include "includes/header.php";
include "../mainincludes/init.php";
include "includes/nav.php";
if(!isset($_SESSION['username'])){
    set_message("You must be logged in to view that page.");
    redirect("../login.php");
    exit();
}

$title = "";
$date = "";
$location = "";
$gps = "";
$difficulty = "";
$duration = "";
$img1 = "";
$img2 = "";
$img3 = "";
$img4 = "";
$img5 = "";
$img6 = "";
$img7 = "";
$img8 = "";
$img9 = "";
$img10 = "";
$img11 = "";
$img12 = "";
$img13 = "";
$img14 = "";
$img15 = "";
$description = "";

$dir = "../assets/archives";



if(isset($_GET['archive'])){
    $id = escape($_GET['archive']);

    $getEvent = query("SELECT * FROM events WHERE id = '$id'");
    while($eventRow = fetch_array($getEvent)){
        $title = $eventRow['title'];
        $date = $eventRow['date'];
        $location = $eventRow['location'];
        $gps = $eventRow['gps'];
        $difficulty = $eventRow['difficulty'];
        $duration = $eventRow['duration'];


    }

}

if(isset($_GET['updatearchive'])){
    $archiveid = escape($_GET['archive']);

    $getEvent = query("SELECT * FROM archives WHERE id = '$id'");
    while($archiveRow = fetch_array($getEvent)){
        $title = $archiveRow['title'];
        $date = $archiveRow['date'];
        $location = $archiveRow['location'];
        $gps = $archiveRow['gps'];
        $difficulty = $archiveRow['difficulty'];
        $duration = $archiveRow['duration'];
        $description = $archiveRow['description'];
        $img1 = $archiveRow['image1'];
        $img2 = $archiveRow['image2'];
        $img3 = $archiveRow['image3'];
        $img4 = $archiveRow['image4'];
        $img5 = $archiveRow['image5'];
        $img6 = $archiveRow['image6'];
        $img7 = $archiveRow['image7'];
        $img8 = $archiveRow['image8'];
        $img9 = $archiveRow['image9'];
        $img10 = $archiveRow['image10'];
        $img11 = $archiveRow['image11'];
        $img12 = $archiveRow['image12'];
        $img13 = $archiveRow['image13'];
        $img14 = $archiveRow['image14'];
        $img15 = $archiveRow['image15'];



    }

}

if(isset($_POST['addArchive'])){
    $description = escape($_POST['description']);

    if ($_FILES['image1']['name']) {
        $img1 = $_FILES['image1']['name'];
        dealwithimage($_FILES['image1']['name'], $_FILES['image1']['tmp_name'], $_FILES['image1']['size'],
            $_FILES['image1']['error'], $dir);
    }

    if ($_FILES['image2']['name']) {
        $img2 = $_FILES['image2']['name'];
        dealwithimage($_FILES['image2']['name'], $_FILES['image2']['tmp_name'], $_FILES['image2']['size'],
            $_FILES['image2']['error'], $dir);
    }

    if ($_FILES['image3']['name']) {
        $img3 = $_FILES['image3']['name'];
        dealwithimage($_FILES['image3']['name'], $_FILES['image3']['tmp_name'], $_FILES['image3']['size'],
            $_FILES['image3']['error'], $dir);
    }

    if ($_FILES['image4']['name']) {
        $img4 = $_FILES['image4']['name'];
        dealwithimage($_FILES['image4']['name'], $_FILES['image4']['tmp_name'], $_FILES['image4']['size'],
            $_FILES['image4']['error'], $dir);
    }

    if ($_FILES['image5']['name']) {
        $img5 = $_FILES['image5']['name'];
        dealwithimage($_FILES['image5']['name'], $_FILES['image5']['tmp_name'], $_FILES['image5']['size'],
            $_FILES['image5']['error'], $dir);
    }

    if ($_FILES['image6']['name']) {
        $img6 = $_FILES['image6']['name'];
        dealwithimage($_FILES['image6']['name'], $_FILES['image6']['tmp_name'], $_FILES['image6']['size'],
            $_FILES['image6']['error'], $dir);
    }

    if ($_FILES['image7']['name']) {
        $img7 = $_FILES['image7']['name'];
        dealwithimage($_FILES['image7']['name'], $_FILES['image7']['tmp_name'], $_FILES['image7']['size'],
            $_FILES['image7']['error'], $dir);
    }

    if ($_FILES['image8']['name']) {
        $img8 = $_FILES['image8']['name'];
        dealwithimage($_FILES['image8']['name'], $_FILES['image8']['tmp_name'], $_FILES['image8']['size'],
            $_FILES['image8']['error'], $dir);
    }

    if ($_FILES['image9']['name']) {
        $img9 = $_FILES['image9']['name'];
        dealwithimage($_FILES['image9']['name'], $_FILES['image9']['tmp_name'], $_FILES['image9']['size'],
            $_FILES['image9']['error'], $dir);
    }

    if ($_FILES['image10']['name']) {
        $img10 = $_FILES['image10']['name'];
        dealwithimage($_FILES['image10']['name'], $_FILES['image10']['tmp_name'], $_FILES['image10']['size'],
            $_FILES['image10']['error'], $dir);
    }

    if ($_FILES['image11']['name']) {
        $img11 = $_FILES['image11']['name'];
        dealwithimage($_FILES['image11']['name'], $_FILES['image11']['tmp_name'], $_FILES['image11']['size'],
            $_FILES['image11']['error'], $dir);
    }

    if ($_FILES['image12']['name']) {
        $img12 = $_FILES['image12']['name'];
        dealwithimage($_FILES['image12']['name'], $_FILES['image12']['tmp_name'], $_FILES['image12']['size'],
            $_FILES['image12']['error'], $dir);
    }

    if ($_FILES['image13']['name']) {
        $img13 = $_FILES['image13']['name'];
        dealwithimage($_FILES['image13']['name'], $_FILES['image13']['tmp_name'], $_FILES['image13']['size'],
            $_FILES['image13']['error'], $dir);
    }

    if ($_FILES['image14']['name']) {
        $img14 = $_FILES['image14']['name'];
        dealwithimage($_FILES['image14']['name'], $_FILES['image14']['tmp_name'], $_FILES['image14']['size'],
            $_FILES['image14']['error'], $dir);
    }

    if ($_FILES['image15']['name']) {
        $img15 = $_FILES['image15']['name'];
        dealwithimage($_FILES['image15']['name'], $_FILES['image15']['tmp_name'], $_FILES['image15']['size'],
            $_FILES['image15']['error'], $dir);
    }

    $addArchive = query("INSERT INTO archives (title, date, location, gps, difficulty, duration, description, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10, image11, image12, image13, image14, image15) VALUES ('$title', '$date', '$location', '$gps', '$difficulty', '$duration', '$description', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$img7', '$img8', '$img9', '$img10', '$img11', '$img12', '$img13', '$img14', '$img15')");
    global $conn;
    confirm($addArchive);
    $lastID = mysqli_insert_id($conn);
    $updateEvent = query("UPDATE events SET archive = 1 WHERE id = '$id'");

    set_message("You have successfully added this event to the Archive.", "success");
    redirect("adminarchive.php?archive=$lastID&updatearchive");
    exit();
}

if(isset($_POST['updatearchive'])){

    $newdescription = $_POST['description'];

    if ($_FILES['image1']['name']) {
        $img1 = $_FILES['image1']['name'];
        dealwithimage($_FILES['image1']['name'], $_FILES['image1']['tmp_name'], $_FILES['image1']['size'],
            $_FILES['image1']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img1 = $row['image1'];
        }
    }

    if ($_FILES['image2']['name']) {
        $img2 = $_FILES['image2']['name'];
        dealwithimage($_FILES['image2']['name'], $_FILES['image2']['tmp_name'], $_FILES['image2']['size'],
            $_FILES['image2']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img2 = $row['image2'];
        }
    }

    if ($_FILES['image3']['name']) {
        $img3 = $_FILES['image3']['name'];
        dealwithimage($_FILES['image3']['name'], $_FILES['image3']['tmp_name'], $_FILES['image3']['size'],
            $_FILES['image3']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img3 = $row['image3'];
        }
    }

    if ($_FILES['image4']['name']) {
        $img4 = $_FILES['image4']['name'];
        dealwithimage($_FILES['image4']['name'], $_FILES['image4']['tmp_name'], $_FILES['image4']['size'],
            $_FILES['image4']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img4 = $row['image4'];
        }
    }

    if ($_FILES['image5']['name']) {
        $img5 = $_FILES['image5']['name'];
        dealwithimage($_FILES['image5']['name'], $_FILES['image5']['tmp_name'], $_FILES['image5']['size'],
            $_FILES['image5']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img5 = $row['image5'];
        }
    }

    if ($_FILES['image6']['name']) {
        $img6 = $_FILES['image6']['name'];
        dealwithimage($_FILES['image6']['name'], $_FILES['image6']['tmp_name'], $_FILES['image6']['size'],
            $_FILES['image6']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img6 = $row['image6'];
        }
    }

    if ($_FILES['image7']['name']) {
        $img7 = $_FILES['image7']['name'];
        dealwithimage($_FILES['image7']['name'], $_FILES['image7']['tmp_name'], $_FILES['image7']['size'],
            $_FILES['image7']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img7 = $row['image7'];
        }
    }

    if ($_FILES['image8']['name']) {
        $img8 = $_FILES['image8']['name'];
        dealwithimage($_FILES['image8']['name'], $_FILES['image8']['tmp_name'], $_FILES['image8']['size'],
            $_FILES['image8']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img8 = $row['image8'];
        }
    }

    if ($_FILES['image9']['name']) {
        $img9 = $_FILES['image9']['name'];
        dealwithimage($_FILES['image9']['name'], $_FILES['image9']['tmp_name'], $_FILES['image9']['size'],
            $_FILES['image9']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img9 = $row['image9'];
        }
    }

    if ($_FILES['image10']['name']) {
        $img10 = $_FILES['image10']['name'];
        dealwithimage($_FILES['image10']['name'], $_FILES['image10']['tmp_name'], $_FILES['image10']['size'],
            $_FILES['image10']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img10 = $row['image10'];
        }
    }

    if ($_FILES['image11']['name']) {
        $img11 = $_FILES['image11']['name'];
        dealwithimage($_FILES['image11']['name'], $_FILES['image11']['tmp_name'], $_FILES['image11']['size'],
            $_FILES['image11']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img11 = $row['image11'];
        }
    }

    if ($_FILES['image12']['name']) {
        $img12 = $_FILES['image12']['name'];
        dealwithimage($_FILES['image12']['name'], $_FILES['image12']['tmp_name'], $_FILES['image12']['size'],
            $_FILES['image12']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img12 = $row['image12'];
        }
    }

    if ($_FILES['image13']['name']) {
        $img13 = $_FILES['image13']['name'];
        dealwithimage($_FILES['image13']['name'], $_FILES['image13']['tmp_name'], $_FILES['image13']['size'],
            $_FILES['image13']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img13 = $row['image13'];
        }
    }

    if ($_FILES['image14']['name']) {
        $img14 = $_FILES['image14']['name'];
        dealwithimage($_FILES['image14']['name'], $_FILES['image14']['tmp_name'], $_FILES['image14']['size'],
            $_FILES['image14']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img14 = $row['image14'];
        }
    }

    if ($_FILES['image15']['name']) {
        $img15 = $_FILES['image15']['name'];
        dealwithimage($_FILES['image15']['name'], $_FILES['image15']['tmp_name'], $_FILES['image15']['size'],
            $_FILES['image15']['error'], $dir);
    } else {
        $getOldImage = query("SELECT * FROM archives WHERE id = '$id'");
        while ($row = fetch_array($getOldImage)) {
            $img15 = $row['image15'];
        }
    }

    $updateArchive = query("UPDATE archives SET description = '$newdescription', image1 = '$img1', image2 = '$img2', image3 = '$img3', image4 = '$img4', image5 = '$img5', image6 = '$img6', image7 = '$img7', image8 = '$img8', image9 = '$img9', image10 = '$img10', image11 = '$img11', image12 = '$img12', image13 = '$img13', image14 = '$img14', image15 = '$img15' WHERE id = '$archiveid' ");
    set_message("You have successfully updated the Archive.", "success");
    redirect("adminarchive.php?archive=$archiveid&updatearchive");
    exit();
}

?>
    <div class="container">
        <h1 style="text-align: center;margin: 50px auto;">Archive</h1>
        <?php display_message(); ?>
        <form method="post" enctype="multipart/form-data">
            <section style="text-align: center;">
                <div class="form-row">
                    <div class="col">
                        <?php if($img1){
                            echo "<div class='text-center'><img src='$dir/$img1' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image1"></div>
                    </div>
                    <div class="col">
                        <?php if($img2){
                            echo "<div class='text-center'><img src='$dir/$img2' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image2"></div>
                    </div>
                    <div class="col">
                        <?php if($img3){
                            echo "<div class='text-center'><img src='$dir/$img3' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image3"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <?php if($img4){
                            echo "<div class='text-center'><img src='$dir/$img4' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image4"></div>
                    </div>
                    <div class="col">
                        <?php if($img5){
                            echo "<div class='text-center'><img src='$dir/$img5' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image5"></div>
                    </div>
                    <div class="col">
                        <?php if($img6){
                            echo "<div class='text-center'><img src='$dir/$img6' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image6"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <?php if($img7){
                            echo "<div class='text-center'><img src='$dir/$img7' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image7"></div>
                    </div>
                    <div class="col">
                        <?php if($img8){
                            echo "<div class='text-center'><img src='$dir/$img8' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image8"></div>
                    </div>
                    <div class="col">
                        <?php if($img9){
                            echo "<div class='text-center'><img src='$dir/$img9' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image9"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <?php if($img10){
                            echo "<div class='text-center'><img src='$dir/$img10' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image10"></div>
                    </div>
                    <div class="col">
                        <?php if($img11){
                            echo "<div class='text-center'><img src='$dir/$img11' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image11"></div>
                    </div>
                    <div class="col">
                        <?php if($img12){
                            echo "<div class='text-center'><img src='$dir/$img12' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image12"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <?php if($img13){
                            echo "<div class='text-center'><img src='$dir/$img13' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image13"></div>
                    </div>
                    <div class="col">
                        <?php if($img14){
                            echo "<div class='text-center'><img src='$dir/$img14' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image14"></div>
                    </div>
                    <div class="col">
                        <?php if($img15){
                            echo "<div class='text-center'><img src='$dir/$img15' height='200px'></div>";
                        }
                        ?>
                        <div class="form-group"><input type="file" name="image15"></div>
                    </div>
                </div>
            </section>
            <div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><textarea class="form-control" id="archivedescription" name="description" placeholder="Description" rows="10" style="margin-bottom: 50px;"><?php echo $description ?></textarea></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <?php
                    if(isset($_GET['updatearchive'])){
                        echo "<div class='col text-center'><button name='updatearchive' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Update Archive</button></div>";
                    } else {
                        echo "<div class='col text-center'><button name='addArchive' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Add To Archive</button></div>";
                    }
                    ?>

                </div>
            </div>
            </div>
        </form>
        <?php include "includes/footer.php"; ?>
    </div>
