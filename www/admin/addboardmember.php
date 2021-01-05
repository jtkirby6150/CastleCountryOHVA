<?php
include "../mainincludes/init.php";
include "includes/header.php";
include "includes/nav.php";

if(!isset($_SESSION['username'])){
    set_message("You must be logged in to view that page.");
    redirect("../login.php");
    exit();
}

$boardname = "";
$boardphone = "";
$boardemail = "";
$boardtitle = "";

if(isset($_GET['edit'])){
    $id = escape($_GET['edit']);
    $sql = query("SELECT * FROM board WHERE id = '$id'");
    while($row = fetch_array($sql)){
        $boardname = $row['name'];
        $boardphone = $row['phone'];
        $boardemail = $row['email'];
        $boardtitle = $row['title'];
    }
}

if(isset($_POST['addboardmember'])){
    $title = escape($_POST['title']);
    $name = escape($_POST['name']);
    $phone = escape($_POST['phone']);
    $email = escape($_POST['email']);
    $sql = query("INSERT INTO board (name, email, phone, title) VALUES ('$name', '$email', '$phone', '$title')");
    set_message("You have successfully added: $name as a board member assigned to Title: $title", "success");
    redirect("addboardmember.php");
    exit();
}

if(isset($_POST['updateboardmember'])){
    $id = $_GET['edit'];
    $title = escape($_POST['title']);
    $name = escape($_POST['name']);
    $phone = escape($_POST['phone']);
    $email = escape($_POST['email']);
    $sql = query("UPDATE board SET name = '$name', title = '$title', email = '$email', phone = '$phone' WHERE id = '$id'");
    set_message("You have successfully updated board member: $name", "success");
    redirect("addboardmember.php?edit=$id");
    exit();
}
?>
    <div class="container">
        <?php display_message(); ?>
    <form method="post">
            <h1 style="text-align: center;" class="mt-5 mb-5">Add New Board Member</h1>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input value="<?php echo $boardname ?>" class="form-control" type="text" name="name" placeholder="Name"></div>
                </div>
                <div class="col">
                    <div class="form-group"><select class="form-control" name="title" required>
                            <option value="">Please select an option</option>
                                <?php
                                $getTitles = query("SELECT * FROM boardtitles ORDER BY name");
                                if(isset($_GET['edit'])){
                                    while ($titleRow = fetch_array($getTitles)) {
                                        $title = $titleRow['name'];
                                        if($boardtitle == $title){
                                            echo "<option value='$title' selected>$title</option>";
                                        } else {
                                            echo "<option value='$title'>$title</option>";
                                        }
                                    }
                                } else {

                                    while ($titleRow = fetch_array($getTitles)) {
                                        $title = $titleRow['name'];
                                        echo "<option value='$title'>$title</option>";
                                    }
                                }

                                ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input value="<?php echo $boardphone ?>" class="form-control" type="text" name="phone" placeholder="Phone"></div>
                </div>
                <div class="col"><input value="<?php echo $boardemail ?>" class="form-control" type="text" name="email" placeholder="Email"></div>
            </div>
        <?php
        if(isset($_GET['edit'])){
            echo "<div class='form-row'>
                <div class='col text-center'><button name='updateboardmember' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Update Board Member</button></div>
            </div>";
        } else {
            echo "<div class='form-row'>
                <div class='col text-center'>
                <button name='addboardmember' class='btn' data-bs-hover-animate='pulse' type='submit' style='background: #af6b58;color: #f2efea;'>Add Member</button></div>
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
            </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
          <?php
include "includes/footer.php"; ?>
    </div>
