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
$dateActivation = "";
$reasonForDeactivation = "";
$dateOfDeactivation = "";

if(isset($_GET['updateMember'])){
    $memberID = $_GET['updateMember'];
}


?>
    <div class="container">
        <h1 style="text-align: center;">Members</h1>
        <form>
            <div class="form-row">
                <div class="col"><label>Membership Type:</label>
                <select class='form-control' name="membership">
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
                <div class="col"><label>Would live newsletters via:</label>
                    <select class='form-control' name='newsletter' id='newsletter'>
                    <?php
                    if(isset($_GET['updateMember'])){
                        if($newsletter == 'Mail'){
                           echo "<option value='Email'>Email</option>
                        <option value='Mail' selected>Mail</option>";
                        } else {
                            echo "<option value='Email' selected>Email</option>
                        <option value='Mail' >Mail</option>";
                        }

                    } else {
                        echo "<option value=''>Please select an option</option>
                        <option value='Email'>Email</option>
                        <option value='Mail'>Mail</option>";
                    }
                    ?>

                    </select>
                    <input class="form-control" type="text"></div>
            </div>
            <div class="form-row">
                <div class="col"><label>Member 1 First Name</label><input class="form-control" type="text"></div>
                <div class="col"><label>Member 1 Last Name</label><input class="form-control" type="text"></div>
            </div>
            <div class="form-row">
                <div class="col"><label>Member 2 First Name</label><input class="form-control" type="text"></div>
                <div class="col"><label>Member 2 Last Name</label><input class="form-control" type="text"></div>
            </div>
            <div class="form-row">
                <div class="col"><label>Kid 1</label><input class="form-control" type="text"></div>
                <div class="col"><label>Kid 2</label><input class="form-control" type="text"></div>
                <div class="col"><label>Kid 3</label><input class="form-control" type="text"></div>
                <div class="col"><label>Kid 4</label><input class="form-control" type="text"></div>
                <div class="col"><label>Kid 5</label><input class="form-control" type="text"></div>
            </div>
            <div class="form-row">
                <div class="col"><label>Phone</label><input class="form-control" type="text"></div>
                <div class="col"><label>Email 1</label><input class="form-control" type="text"></div>
                <div class="col"><label>Email 2</label><input class="form-control" type="text"></div>
            </div>
            <div class="form-row">
                <div class="col"><label>Address</label><input class="form-control" type="text"></div>
                <div class="col"><label>PO Box</label><input class="form-control" type="text"></div>
            </div>
            <div class="form-row">
                <div class="col"><label>City</label><input class="form-control" type="text"></div>
                <div class="col"><label>State</label><input class="form-control" type="text"></div>
                <div class="col"><label>Zip</label><input class="form-control" type="text"></div>
            </div>
            <div class="form-row">
                <div class="col"><label>Date of Activation</label><input class="form-control" type="text"></div>
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