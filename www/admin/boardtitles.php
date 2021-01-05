<?php
include "includes/header.php";
include "../mainincludes/init.php";
include "includes/nav.php";

$title =  "";
$description = "";
if(!isset($_SESSION['username'])){
    set_message("You must be logged in to view that page.");
    redirect("../login.php");
    exit();
}


if(isset($_GET['edit'])){
    $id = escape($_GET['edit']);
    $sql = query("SELECT * FROM boardtitles WHERE id = '$id'");
    while($row = fetch_array($sql)){
        $title =  $row['name'];
        $description = $row['description'];
    }

}

if(isset($_POST['addTitle'])){
    $title =  escape($_POST['title']);
    $description = escape($_POST['description']);
    $sql = query("INSERT INTO boardtitles (name, description) VALUES ('$title', '$description')");
    confirm($sql);
    set_message("You have successfully added the new Board Title of: $title", "success");
    redirect("boardtitles.php");
    exit();
}
if(isset($_POST['editTitle'])){
    $id = escape($_GET['edit']);
    $title =  escape($_POST['title']);
    $description = escape($_POST['description']);
    $sql = query("UPDATE boardtitles SET name = '$title', description = '$description' WHERE id = '$id'");
    confirm($sql);
    set_message("You have successfully added the new Board Title of: $title", "success");
    redirect("boardtitles.php");
    exit();
}
?>
    <div class="container">
        <?php display_message(); ?>
    <form method="post">
            <h1 style="text-align: center;" class="mt-5 mb-5">Board Titles</h1>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input value="<?php echo $title ?>" class="form-control" type="text" name="title" placeholder="Title"></div>
                </div>
            </div>
        <div class="form-row">
            <div class="col">
                <div class="form-group"><textarea id="boardMemberDescription" class="form-control" name="description" id="" cols="30" rows="6" placeholder="Description"> <?php echo $description ?> </textarea>
                </div>
            </div>
        </div>
        <?php
        if(isset($_GET['edit'])){
            echo "<div class='form-row'>
                <div class='col text-center'><button name='editTitle' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Update Board Title</button></div>
            </div>";
        } else {
            echo "<div class='form-row'>
                <div class='col text-center'><button name='addTitle' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Add Board Title</button></div>
            </div>";
            }
        ?>
    </form>


    <h4 style="margin: 25px;" class="text-center mt-5">Board Member Title Reference</h4>
    <div class="table-responsive" style="margin: 25px;">
        <table class="table mb-5">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Edit/Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $getTitles = query("SELECT * FROM boardtitles ORDER BY name");
            while($titleRow = fetch_array($getTitles)){
                $title = $titleRow['name'];
                $id = $titleRow['id'];
                $description = $titleRow['description'];
                echo "<tr>
                <td>$title</td>
                <td>$description</td>
                <td><a href='boardtitles.php?edit=$id'><i class='fa fa-pencil' style='font-size: 30px;color: var(--green);border-color: var(--gray-dark);'></i></a></td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
          <?php
include "includes/footer.php"; ?>
    </div>
