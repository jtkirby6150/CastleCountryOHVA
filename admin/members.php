<?php
include "includes/header.php";
include "../mainincludes/init.php";
include "includes/nav.php";

if(isset($_GET['activeStatus'])){
    $memberID = $_GET['activeStatus'];
    $getMemberInfo = query("SELECT * FROM members WHERE id = '$memberID'");
    confirm($getMemberInfo);
    while($row = fetch_array($getMemberInfo)){
        $active = $row['active'];
        $memberName = $row['member1FN'] . " " . $row['member1LN'];
        if($active == 1){
            $makeInactive = query("UPDATE members SET active = 0 WHERE id = $memberID");
            set_message("You have successfully set $memberName status to InActive.", "success");
            redirect('admin.php');
            exit();
        } elseif ($active == 0) {
            $makeActive = query("UPDATE members SET activew = 1 WHERE id = $memberID");
            set_message("You have successfully set $memberName status to Active.", "success");
            redirect('admin.php');
            exit();
        } else {
            $makeActive = query("UPDATE members SET activew = 1 WHERE id = $memberID");
            set_message("You have successfully set $memberName status to Active.", "success");
            redirect('admin.php');
            exit();
        }

    }
}