<?php
include "mainincludes/init.php";
include "mainincludes/header.php";
include "mainincludes/nav.php";

//Get the company info to display in the Contact Us portion.
$getCompInfo = query("SELECT * FROM company");
while($row = fetch_array($getCompInfo)){
    $name = strtoupper($row['name']);
    $phone = $row['phone'];
    $email = $row['email'];
    $fullAddress = $row['address'] . "<br>" . $row['city'] . ", " . $row['state'] . " " . $row['zip'];
}

if(isset($_POST['contactUs'])){
    $name = $_POST['name'];
    $to = $_POST['to'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = "New Contact Us submission from: $name";
    $headers = "From: noreply@castlecountryOHVA.org";
    $msg = "New message from: \r\n Name: $name  \r\n Phone: $phone  \r\n Email: $email  \r\n Message: " . $_POST['message'];
    mail($to, $subject, $msg, $headers);
    set_message("Thank you for your message, we will get back to you shortly.", "success");
    redirect("contactus.php");
    exit();
}
?>


    <h1 class="text-center">Contact Us</h1>
<div><?php display_message(); ?></div>
<div class="mt-5 text-center"><p>We want to make sure that we tend to any questions, comments, or concerns that you may have.
        <br>Please reference our contact information below or feel free to submit the contact form and we will
        get back to you as quickly as possible.</p></div>
<div class="row mt-5">
<div class="col-md-4"></div>
<div class="col-md-4 ml-4 text-center">
    <div class="text-center" ><span class="font-weight-bold">CASTLE COUNTRY OHV ASSOCIATION </span><br></div>
    <br>
    <p>
        <b>Phone: </b><br> <?php echo $phone; ?><br>
        <b>Email: </b><br> <?php echo $email; ?><br>
        <b>Address: </b><br><?php echo $fullAddress; ?>
    </p>
</div>
<div class="col-md-4"></div>
</div>
    <div class="contact-clean" style="background: rgba(241,247,252,0);">
        <form method="post" style="background: rgba(255,255,255,0);box-shadow: 0px 0px 10px 5px #af6b58;">
            <h2 class="text-center">Contact us</h2>
            <div class="form-group">
                <select class="form-control" name="to" id="" required>
                    <option value="">Please select an option</option>
                    <option value="ccohva@gmail.com">General Questions</option>
                    <?php
                    //retrieves a list of current board members to display in the dropdown contact us area.
                    $getBoardList = query("SELECT * FROM board ORDER BY name");
                    while ($blRow = fetch_array($getBoardList)){
                    $boardID = $blRow['id'];
                    $membername = $blRow['name'];
                    $membertitle = $blRow['title'];
                    $memberphone = $blRow['phone'];
                    $memberEmail = $blRow['email'];

                    if(isset($_GET['contact'])){
                        $id= $_GET['contact'];
                        if($id == $boardID) {
                            echo "<option selected value='$memberEmail'>$membername ~ $membertitle</option>";
                        } else{
                            echo "<option value='$memberEmail'>$membername ~ $membertitle</option>";
                        }
                    } else {
                        echo "<option value='$memberEmail'>$membername ~ $membertitle</option>";
                    }
                    }

                    ?>

                </select>
            </div>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name" required></div>
            <div class="form-group"><input class="form-control" type="text" name="phone" placeholder="Phone"
                                           required></div>
            <div class="form-group"><input class="form-control is-invalid" type="email" name="email"
                                           placeholder="Email" required></div>
            <div class="form-group"><textarea class="form-control" name="message" placeholder="Message" rows="14" required
                ></textarea></div>
            <div class="col text-center">
                <button name="contactUs" class='btn' data-bs-hover-animate='pulse' type='submit' style='color: #1c1c1c;
                background: #af6b58;'><strong>Contact Us</strong></button>
            </div>
        </form>

    </div>
<div class="container"><?php include "mainincludes/footer.php"; ?></div>

