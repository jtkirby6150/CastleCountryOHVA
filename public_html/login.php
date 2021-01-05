<?php
include "mainincludes/init.php";
include "mainincludes/header.php";
include "mainincludes/nav.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check = query("SELECT * FROM users WHERE username = '$username'");
    while($row = fetch_array($check)){
        $dbpassword = $row['password'];
        $activation = $row['activation'];
        if(password_verify($password, $dbpassword)){
            if($activation == 1){
            $_SESSION['username'] = $username;
            redirect("admin/admin.php");
            exit();
            } else {
                set_message("Sorry but your account has not yet been activated.");
            redirect("login.php");
            exit();
            }
        } else {
            set_message("Sorry but the credentials do not match the database.");
            redirect("login.php");
            exit();
        }
    }
}
?>
    <div class="login-dark" style="background: rgba(71,93,98,0);height: 100vh;">
        <?php display_message(); ?>
        <form method="post" style="background: rgba(197,168,128,0.5);">

            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline" style="border-top-color: #af6b58;color: #af6b58;"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" style="color: #556052;"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" style="color: #556052;"></div>
            <div class="form-group"><button name="login" class="btn btn-block" data-bs-hover-animate="pulse" type="submit" style="background: #af6b58;border-top-color: #556052;color: #f2efea;">Log In</button></div><a class="forgot" href="#">Forgot your username or password?</a>
        </form>
    </div>
    <?php include "mainincludes/footer.php";