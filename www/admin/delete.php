<?php
include "../mainincludes/init.php";
if(!isset($_SESSION['username'])){
    set_message("You must be logged in to view that page.");
    redirect("../login.php");
    exit();
}

if(isset($_GET['deleteboardmember'])){
    $id = $_GET['deleteboardmember'];
    $sql=query("DELETE FROM board WHERE id = '$id'");
    set_message("You have successfully deleted the board member.");
    redirect("admin.php");
    exit();
}

if(isset($_GET['deletepartner'])){
    $id = $_GET['deletepartner'];
    $sql=query("DELETE FROM partners WHERE id = '$id'");
    set_message("You have successfully deleted the partner.");
    redirect("admin.php");
    exit();
}

if(isset($_GET['deletesponsor'])){
    $id = $_GET['deletesponsor'];
    $sql=query("DELETE FROM sponsors WHERE id = '$id'");
    set_message("You have successfully deleted the sponsor.");
    redirect("admin.php");
    exit();
}

if(isset($_GET['deletelandmanagement'])){
    $id = $_GET['deletelandmanagement'];
    $sql=query("DELETE FROM landmanagement WHERE id = '$id'");
    set_message("You have successfully deleted the land management.");
    redirect("admin.php");
    exit();
}

if(isset($_GET['event'])){
    $id = $_GET['event'];
    $sql=query("DELETE FROM events WHERE id = '$id'");
    set_message("You have successfully deleted the event.");
    redirect("admin.php");
    exit();
}
if(isset($_GET['otherevent'])){
    $id = $_GET['otherevent'];
    $sql=query("DELETE FROM otherevents WHERE id = '$id'");
    set_message("You have successfully deleted the event.");
    redirect("admin.php");
    exit();
}

if(isset($_GET['archive'])){
    $id = $_GET['archive'];
    $sql=query("DELETE FROM archives WHERE id = '$id'");
    set_message("You have successfully deleted the archive.");
    redirect("admin.php");
    exit();
}

if(isset($_GET['otherarchive'])){
    $id = $_GET['otherarchive'];
    $sql=query("DELETE FROM otherarchives WHERE id = '$id'");
    set_message("You have successfully deleted the archive.");
    redirect("admin.php");
    exit();
}

if(isset($_GET['news'])){
    $id = $_GET['news'];
    $sql=query("DELETE FROM news WHERE id = '$id'");
    set_message("You have successfully deleted the news article.");
    redirect("admin.php");
    exit();
}