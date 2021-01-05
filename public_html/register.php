<?php
include "mainincludes/init.php";
include "mainincludes/header.php";
include "mainincludes/nav.php";

if(isset($_POST['register'])){
    $firstname = escape($_POST['firstname']);
    $lastname = escape($_POST['lastname']);
    $phone = escape($_POST['phone']);
    $email = escape($_POST['email']);
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);
    $confpassword = escape($_POST['confpassword']);
    $validation = generate_token();

    $userExists = query("SELECT * FROM users WHERE username = '$username'");
    if(row_count($userExists) > 0){
        set_message("Sorry this username already exists.");
        redirect("register.php");
        exit();
    }

    if($password != $confpassword){
        set_message("Sorry, the passwords do not match. Please try again.");
        redirect("register.php");
        exit();
    } elseif($password == $confpassword) {
        $hashpass = password_hash($password,PASSWORD_BCRYPT);
        $subject = "Castle Country OHV Association - Email Validation Link";
        $headers = "From: noreply@ccohva.org";
        $msg = "$firstname $lastname, Thank you for registering. Please follow the link below to validate your account.\r\n http://www.castlecountryohva.org/admin/validate.php?validate=$validation&username=$username";
        mail($email, $subject, $msg, $headers);
        $sql = query("INSERT INTO users (firstname, lastname, phone, email, username, password, validation, activation) VALUES ('$firstname', '$lastname', '$phone', '$email', '$username', '$hashpass', '$validation', 0)");
        confirm($sql);
    }

    set_message("You have successfully registered.<br> Please check your email for further instructions on how to activate your account.<br> Please be sure to check your spam folder as well.", "success");
}

?>
    <div class="container text-center">
        <h1 style="margin: 50px;">Register</h1>
        <?php display_message(); ?>
        <form method="post">
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input class="form-control" type="text" name="firstname" placeholder="First Name"></div>
                </div>
                <div class="col">
                    <div class="form-group"><input class="form-control" type="text" name="lastname" placeholder="Last Name"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input class="form-control" type="text" name="phone" placeholder="Phone"></div>
                </div>
                <div class="col">
                    <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><input class="form-control" type="text" name="username" placeholder="username"></div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                        </div>
                        <div class="col">
                            <div class="form-group"><input class="form-control" type="password" name="confpassword" placeholder="Confirm Password"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group"><button name="register" class="btn" data-bs-hover-animate="pulse" type="submit" style="background: #af6b58;color: #f2efea;">Submit Registration</button></div>
                </div>
            </div>
        </form>
    </div>
  <?php include "mainincludes/footer.php";