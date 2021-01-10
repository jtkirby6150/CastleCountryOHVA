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
    $memberID = $_GET['updateMember'];
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
        $poBox = $row['poBox'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $date = strtotime($row['date']);

    }
}


?>
    <div class="container">
        <h1 style="text-align: center;">Members</h1>
        <form>
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
                <div class="col" style="text-align: center;margin: 15px;"><button class="btn btn-primary" type="button">Update Member Info</button></div>
            </div>
        </form>
        <div id="footer" style="margin-top: 25px;">
            <div class="row">
                <div class="col-md-6">
                    <p style="font-size: 20px;">Copyright info</p>
                </div>
                <div class="col-md-6">
                    <p style="font-size: 20px;">Visit us on&nbsp;&nbsp;<i class="fa fa-facebook-square" style="font-size: 24px;"></i>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>