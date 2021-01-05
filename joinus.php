<?php
include "mainincludes/header.php";
include "mainincludes/init.php";
include "mainincludes/nav.php";

?>
<script type="text/javascript" src="jspdf.min.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script>
    function genPDF() {
        html2canvas('#mainForm', {
            onrendered: function (canvas) {
                var doc = new jsPDF();
                doc.save("CCHOVA_RegistrationForm.pdf");
            }
        });
    }
</script>
<?php


require_once "resources/functions.php";

if(isset($_POST['submitRegistration'])){
    $member = escape($_POST['member']);
    $newsletter = escape($_POST['newsletter']);
    $name = escape($_POST['name']);
    $phone = escape($_POST['phone']);
    $email = escape($_POST['email']);
    $address = escape($_POST['address']);
    $pobox = escape($_POST['pobox']);
    $city = escape($_POST['city']);
    $state = escape($_POST['state']);
    $zip = escape($_POST['zip']);
    $help = escape($_POST['help']);
    $accept = escape($_POST['accept']);
    $signature = escape($_POST['signature']);
    $date = escape($_POST['date']);


//    $addMember = query("INSERT INTO members (member, newsletter, name, phone, emial, address, pobox, city, state, zip, help, accept, signature, date, active) VALUES ('$member', '$newsletter', '$name', '$phone', '$email', '$address', '$pobox', '$city', '$state', '$zip', '$help', '$accept', '$signature', '$date', 0)");
//    confirm($addMember);
//    set_message("YOU GOT IT");
//    redirect("joinus.php");
//    exit();
}
?>
    <div class="container">
        <h1 style="text-align: center;">Join Us</h1>
        <?php display_message(); ?>
        <p style="text-align: center;" class='mb-5'>Please join us by filling out the form below or sending in this <a class="btn btn-secondary" href="assets/2021-Membership-Application.pdf" download="">downloadable</a> form.</p>

        <section id="mainForm" style="border: solid">
            <form method="post" action="" class="p-4" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2"><img src="assets/img/logo-dark.png" height="100px"></div>
                    <div class="col-md-8"><h1 class="text-center">Castle Country OHV Association</h1></div>
                    <div class="col-md-2"><img src="assets/img/logo-dark.png" height="100px"></div>
                    <div></div>
                </div>
                <div class="form-row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="member">New Member or Renewal?</label><br>
                            <input type="radio" name="newOrRenew" id="newOrRenew" value="new" required>
                            <label for="new">New</label>
                            <input class="ml-2" type="radio" name="newOrRenew" id="newOrRenew" value="renew" required>
                            <label for="renew">Renewal</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="member">How would you like your newsletter?</label><br>
                            <input type="radio" name="mailOrEmail" id="mailOrEmail" value="mail"required>
                            <label for="mail">Mail</label>
                            <input class="ml-2" type="radio" name="mailOrEmail" id="mailOrEmail" value="email" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>

            <section id="demographics">
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label>First Name:</label><input name="firstname" tabindex="5" class="form-control" type="text" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label>Last Name:</label><input name="lastname" tabindex="6" class="form-control" type="text" required></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label>Phone:</label><input name="phone" class="form-control" type="text" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label>Email:</label><input name="email" class="form-control" type="text"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label>Address:</label><input name="address" class="form-control" type="text" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label>P.O. Box:</label><input name="pobox" class="form-control" type="text" ></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label>City:</label><input name="city" class="form-control" type="text" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label>State:</label><input name="state" class="form-control" type="text" required></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label>Zip:</label><input name="zip" class="form-control" type="text" required></div>
                    </div>
                </div>
            </section>
                <p style="text-align: center;"><strong>Membership will cost $ 25.00 per year per household.</strong><br><strong>This money will be used for newsletter, postage, club events and group membership to The BLUE</strong><br><strong>RIBBON COALITION &amp; The Utah ATV Association.</strong><br></p>
                <p style="text-align: center;">Would you like to help? (Please select all that apply)</p>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="help">Would you like to help? (Please select all that apply by holding CTRL while clicking on the applicable items)</label>
                            <select name="help[]" id="" multiple class="form-control">
                                <option value="Lead a club ride">Lead a club ride</option>
                                <option value="Suggest a place to ride">Suggest a place to ride</option>
                                <option value="Become a Board Member">Become a Board Member</option>
                                <option value="Help with club event(s)">Help with club event(s)</option>
                                <option value="Suggest a club event">Suggest a club event</option>
                                <option value="Nominate a Member">Nominate a Member</option>
                                <option value="Assist on committee">Assist on committee</option>
                            </select>
                        </div>
                    </div>
                </div>


                <!--            <div class="row">-->
                <!--                <div class="col">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Lead a club ride.</label></div>-->
                <!--                </div>-->
                <!--                <div class="col">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Suggest a place to ride.</label></div>-->
                <!--                </div>-->
                <!--                <div class="col">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Become a Board Member.</label></div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="row">-->
                <!--                <div class="col">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Help with club event(s).</label></div>-->
                <!--                </div>-->
                <!--                <div class="col">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">Suggest a club event.</label></div>-->
                <!--                </div>-->
                <!--                <div class="col">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Nominate a Member.</label></div>-->
                <!--                </div>-->
                <!--                <div class="col">-->
                <!--                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">Assist on committee.</label></div>-->
                <!--                </div>-->
                <!--            </div>-->
                <p class="text-center"><br><strong>*<span style="text-decoration: underline;">No Alcohol Policy</span> on all Club Sponsored Rides and Events. “Drinking Alcohol while driving an Off&nbsp;Highway Vehicle (OHV) is against the Law.” Each Member is expected to portray a safe and responsible&nbsp;attitude while riding OHV’s and to respect the environment around us.</strong><br><br></p>
                <h4 class="text-center">STATEMENT OF LIMITED LIABILITY</h4>
                <p>The Castle Country Off Highway Vehicle Association assumes no responsibility or liability for any loss, damage, or&nbsp;injury or death to any person or property in connection with your participation in any ATV ride. Your presence and&nbsp;participation in rides indicates knowledge of, and assumption of, the resulting risks involved. All participants are, therefore,&nbsp;urged to be sure that they use proper riding gear, are in satisfactory physical condition, and to secure prior to the ride,&nbsp;appropriate medical and personal injury and property damage insurance coverage. A parent or legal guardian must accompany<br>juveniles. Utah State law requires that operators of ATV’s must be 8 years of age or older. Operators between 8 and 16 years of&nbsp;age must be State certified in order to ride on Public lands.&nbsp;<br></p>
                <p>I HAVE READ THE ABOVE INFORMATION ON RISK, RELEASE AND WAVER OF LIABILITY, HOLD-HARMLESS&nbsp;AND INDEMNITY AGREEMENT, FULLY UNDERSTAND ITS TERMS, UNDERSTAND THAT I MAY HAVE GIVEN&nbsp;UP SUBSTANTIAL RIGHTS BY SIGNING IT, AND HAVE SIGNED IT, ON BEHALF OF MYSELF AND MY MINOR&nbsp;CHILDREN, FREELY AND VOLUNTARILY WITHOUT ANY INDUCEMENT, ASSURANCE OR GUARANTEE BEING<br>MADE TO ME AND FULLY INTEND MY SIGNATURE TO BE A COMPLETE, CONTINUING AND&nbsp;UNCONDITIONAL RELEASE OF ALL LIABILITY TO THE FULLEST EXTENT ALLOWED BY LAW. IF I FAIL TO&nbsp;ABIDE BY THE ASSOCIATION BY-LAWS, I SHALL FORFEIT MY MEMBERSHIP AND DUES.&nbsp;<br></p>
                <p><strong>By selecting "I&nbsp;Accept" using any device, means that you have read and understand the "STATEMENT OF LIMITED LIABILITY", our "No Alcohol Policy", and to practice safe OHV handling at all times. Furthermore you agree that your signature on this document (hereafter referred to as your "E-Signature") is as valid as if you signed the document in writing.&nbsp;</strong></p>
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center"><label><strong>I Accept:&nbsp;</strong> &nbsp;</label><input type="checkbox" required></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <div class="form-group"><label class="text-center">Signature:&nbsp; &nbsp;</label><input required placeholder="Type Name Here" type="text"></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label>Date:&nbsp; &nbsp;</label><input value="<?php echo date("m/d/Y") ?> " disabled type="text"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="javascript:genPDF()" name="submitRegistration" class='btn' data-bs-hover-animate='pulse' type='submit' style='color: #1c1c1c;background: #af6b58;'><strong>Submit</strong></a>
                    </div>
                </div>
            </form>
        </section>
        <?php
        include "mainincludes/footer.php";
        ?>
    </div>
