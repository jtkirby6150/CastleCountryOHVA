<?php
include "../mainincludes/init.php";

if(isset($_GET['validate'])){
    $validation = $_GET['validate'];
    $username = $_GET['username'];
    $sql = query("SELECT * FROM users WHERE validation = '$validation' AND username = '$username'");
    confirm($sql);
    if(row_count($sql)>0){
        $validate = query("UPDATE users SET validation = '' AND activation = 1 ");
        confirm($validate);
        $subject = "$username has just registered and validated their email address.";
        $msg = "$username has just validated their email address. You must log in to review the account before the user can access the site.";
        $headers = "From: noreply@ccohva.org";
        mail('webmaster@ccohva.org', $subject, $msg, $headers);
        set_message("You have successfully validated your email address and your account is now under review. <br>We will send you and email once its been reviewed.", "success");
        redirect("../index.php");
        exit();
    } else {
        set_message("Sorry there has been an error. Please try again.<br> If the problem persists please contact us.");
        redirect("../register.php");
        exit();
    }
}