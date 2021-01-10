<?php
include "includes/header.php";
include "../mainincludes/init.php";
include "includes/nav.php";

$membership = "";
$newsletter = "";
$member1FN = "";
$member1LN = "";
$member2FN = "";
$member2LN = "";
$kid1 = "";
$kid2 = "";
$kid3 = "";
$kid4 = "";
$kid5 = "";
$phone = "";
$email1 = "";
$email2 = "";
$address = "";
$poBox = "";
$city = "";
$state = "";
$zip = "";
$date = "";
$dateActivation = "";
$reasonForDeactivation = "";
$dateOfDeactivation = "";

if(isset($_GET['updateMember'])){
    $memberID = escape($_GET['updateMember']);
    $getMemberInfo = query("SELECT * FROM members WHERE id = '$memberID'");
    confirm($getMemberInfo);
    while($row = fetch_array($getMemberInfo)){
        $member = $row['member'];
        $newsletter = $row['newsletter'];
        $member1FN = $row['member1FN'];
        $member1LN = $row['member1LN'];
        $member2FN = $row['member2FN'];
        $member2LN = $row['member2LN'];
        $kid1 = $row['kid1'];
        $kid2 = $row['kid2'];
        $kid3 = $row['kid3'];
        $kid4 = $row['kid4'];
        $kid5 = $row['kid5'];
        $phone = $row['phone'];
        $email1 = $row['email1'];
        $email2 = $row['email2'];
        $address = $row['address'];
        $poBox = $row['pobox'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $date = strtotime($row['date']);
    }
}

if(isset($_POST['updateMemberInfo'])){
    $member = escape($_POST['membership']);
    $newsletter = escape($_POST['newsletter']);
    $member1FN = escape($_POST['member1FN']);
    $member1LN = escape($_POST['member1LN']);
    $member2FN = escape($_POST['member2FN']);
    $member2LN = escape($_POST['member2LN']);
    $kid1 = escape($_POST['kid1']);
    $kid2 = escape($_POST['kid2']);
    $kid3 = escape($_POST['kid3']);
    $kid4 = escape($_POST['kid4']);
    $kid5 = escape($_POST['kid5']);
    $phone = escape($_POST['phone']);
    $email1 = escape($_POST['email1']);
    $email2 = escape($_POST['email2']);
    $address = escape($_POST['address']);
    $poBox = escape($_POST['pobox']);
    $city = escape($_POST['city']);
    $state = escape($_POST['state']);
    $zip = escape($_POST['zip']);
    $date = escape($_POST['date']);

    $updateMember = query("UPDATE members SET member = '$member', newsletter = '$newsletter', member1FN = '$member1FN', member1LN = '$member1LN', member2FN = '$member2FN', member2LN = '$member2LN', kid1 = '$kid1', kid2 = '$kid2', kid3 = '$kid3', kid4 = '$kid4', kid5 = '$kid5', phone = '$phone', email1 = '$email1', email2 = '$email2', address = '$address', city = '$city', state = '$state', zip = '$zip', date = '$date' WHERE id = '$memberID'");
    confirm($updateMember);
    set_message("You have successfully updated member: $member1FN $member1LN", "success");
    redirect("members.php?updateMember=$memberID");
    exit();
    if(!$updateMember) {
        set_message("This is not working");
        redirect("admin.php");
        exit();
    }
}


?>
    <div class="container">
    <?php display_message(); ?>
        <h1 style="text-align: center;">Members</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col">
                    <label for="membership">Membership Type:</label>
                    <select class='form-control' id="membership" name="membership">
                        <?php
                        if(isset($_GET['updateMember'])){
                            echo "<option value='New Membership'>New Membership</option>
                        <option value='Renewal' selected>Renewal Membership</option>";
                        } else {
                            echo "<option value=''>Pleae select an option</option>
                            <option value='New Membership'>New Membership</option>
                        <option value='Renewal' selected>Renewal Membership</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="newsletter">Would live newsletters via:</label>
                    <select class='form-control' name='newsletter' id='newsletter'>
                    <?php
                    if(isset($_GET['updateMember'])) {
                        if ($newsletter == 'Mail') {
                            echo "<option value='Email'>Email</option>
                        <option value='Mail' selected>Mail</option>";
                        } elseif ($newsletter == 'Email') {
                            echo "<option value='Email' selected>Email</option>
                        <option value='Mail' >Mail</option>";
                        } else {
                            echo "<option value='' selected>Please select an option</option>
                        <option value='Email'>Email</option>
                        <option value='Mail'>Mail</option>";
                        }
                    }
                    ?>

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="member1FN">Member 1 First Name</label>
                    <input value="<?php echo $member1FN ?>" value="$member1FN" name="member1FN" id="member1FN" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="member1LN">Member 1 Last Name</label>
                    <input value="<?php echo $member1LN ?>" value="$member1LN" name="member1LN" id="member1LN" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="member2FN">Member 2 First Name</label>
                    <input value="<?php echo $member2FN ?>" name="member2FN" id="member2FN" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="member2LN">Member 2 Last Name</label>
                    <input value="<?php echo $member2LN ?>" name="member2LN" id="member2LN" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="kid1">Kid 1</label>
                    <input value="<?php echo $kid1 ?>" name="kid1" id="kid1" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="kid2">Kid 2</label>
                    <input value="<?php echo $kid2 ?>" name="kid2" id="kid2" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="kid3">Kid 3</label>
                    <input value="<?php echo $kid3 ?>" name="kid3" id="kid3" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="kid4">Kid 4</label>
                    <input value="<?php echo $kid4 ?>" name="kid4" id="kid4" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="kid5">Kid 5</label>
                    <input value="<?php echo $kid5?>" name="kid5" id="kid5" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="phone">Phone</label>
                    <input value="<?php echo $phone; ?>" name="phone" id="phone" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="email1">Email 1</label>
                    <input value="<?php echo $email1; ?>" name="email1" id="email1" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="email2">Email 2</label>
                    <input value="<?php echo $email2; ?>" name="email2" id="email2" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="address">Address</label>
                    <input value="<?php echo $address; ?>" name="address" id="address" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="poBox">PO Box</label>
                    <input value="<?php echo $poBox; ?>" name="poBox" id="poBox" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="city">City</label>
                    <input value="<?php echo $city; ?>" name="city" id="city" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="state">State</label>
                    <input value="<?php echo $state; ?>" name="state" id="state" class="form-control" type="text">
                </div>
                <div class="col">
                    <label for="zip">Zip</label>
                    <input value="<?php echo $zip; ?>" name="zip" id="zip" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="dateOfActivation">Date of Activation</label>
                    <input value="<?php echo date('m/d/Y', $date); ?>" class="form-control" type="text">
                </div>
            </div>
            <div class="form-row">
                <div class='col' style='text-align: center;margin: 15px;'>
                    <button value="updateMemberInfo" class='btn btn-primary' type='submit'>Update Member Info</button></div>
            </div>
        </form>
<?php include "includes/footer.php";