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
$url = "";
$description = "";
$image = "";
$dir = "../assets/img/partners";

if(isset($_GET['edit'])){
    $id = escape($_GET['edit']);
    $sql = query("SELECT * FROM partners WHERE id = '$id'");
    while($row = fetch_array($sql)){
        $title =  $row['title'];
        $url = $row['url'];
        $description = $row['description'];
        $image = $row['image'];
    }

}

if(isset($_POST['addPartner'])){
    $title =  escape($_POST['title']);
    $url = escape($_POST['url']);
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
            $getimg = query("SELECT * FROM partners WHERE id = '$id'");
            while($imgrow = fetch_array($getimg)){
                $image = $imgrow['image'];
            }
        }

    }



    $sql = query("INSERT INTO partners (title, url, image, description) VALUES ('$title', '$url', '$image', '$description')");
    confirm($sql);
    set_message("You have successfully added a new Partner: $title", "success");
    redirect("partners.php");
    exit();
}
if(isset($_POST['editPartner'])){
    $id = escape($_GET['edit']);
    $url = escape($_POST['url']);
    $title =  escape($_POST['title']);
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
            $getimg = query("SELECT * FROM partners WHERE id = '$id'");
            while($imgrow = fetch_array($getimg)){
                $image = $imgrow['image'];
            }
        }

    }

    $sql = query("UPDATE partners SET title = '$title', url = '$url', description = '$description', image = '$image' WHERE id = '$id'");
    confirm($sql);
    set_message("You have successfully updated the partner: $title", "success");
    redirect("partners.php?edit=$id");
    exit();
}
?>
<div class="container">
    <?php display_message(); ?>

    <form method="post" enctype="multipart/form-data" class="mb-5">
        <h1 style="text-align: center;" class="mt-5 mb-5">Partners</h1>

        <div class="form-row">
            <div class="col">
                <div class="form-group">
                    <?php
                    if($image){
                       echo "<div class='text-center'><img src='$dir/$image' width='200px' alt=''></div>";
                    }
                    ?>
                    <label for="image">Partner Logo</label>
                    <input value="<?php echo $image ?>" class="form-control" type="file" name="image">
                </div>
                <div class="form-group">
                    <input value="<?php echo $title ?>" class="form-control" type="text" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <input value="<?php echo $url ?>" class="form-control" type="text" name="url" placeholder="URL">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group"><textarea id="ptitledescription" class="form-control" name="description" id="" cols="30" rows="6" placeholder="Description"> <?php echo $description ?> </textarea>
                </div>
            </div>
        </div>
        <?php
        if(isset($_GET['edit'])){
            echo "<div class='form-row'>
                <div class='col text-center'><button name='editPartner' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Update Partner Info</button></div>
            </div>";
        } else {
            echo "<div class='form-row'>
                <div class='col text-center'><button name='addPartner' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Add Partner</button></div>
            </div>";
        }
        ?>
    </form>

    <?php
    include "includes/footer.php"; ?>
</div>
