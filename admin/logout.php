<?php
include "../mainincludes/init.php";
session_start();
session_unset();
session_destroy();
set_message("You have successfully logged out.", "success");
redirect("../index.php");
exit();
?>