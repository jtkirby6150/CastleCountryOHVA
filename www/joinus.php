<?php
include "mainincludes/header.php";
include "mainincludes/init.php";
include "mainincludes/nav.php";

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
        <p style="text-align: center;" class='mb-5'>Please join us by filling out the this downloadable <a href="assets/2021-Membership-Application.pdf" download="">FORM</a> and sending it in.</p>
       
         <?php
include "mainincludes/footer.php";
?>
    </div>
