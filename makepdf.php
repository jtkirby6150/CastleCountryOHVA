<?php

require_once __DIR__ . '/vendor/autoload.php';
include "mainincludes/init.php";

if(isset($_GET['printPDF'])) {
    $memberID = $_GET['printPDF'];
    $getMemberInfo = query("SELECT * FROM members WHERE id = '$memberID'");
    confirm($getMemberInfo);
    while ($row = fetch_array($getMemberInfo)) {
        $member = $row['member'];
        $newsletter = $row['newsletter'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
        $pobox = $row['pobox'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $help = $row['help'];
        $accept = $row['accept'];
        $signature = $row['signature'];
        $date = $row['date'];
    }
} else {

//Grabbing variables from form:
    $member = $_POST['member'];
    $newsletter = $_POST['newsletter'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pobox = $_POST['pobox'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $help = $_POST['help'];
    $accept = $_POST['accept'];
    $signature = $_POST['signature'];
    $date = $_POST['date'];
}

//Help Array:
    $helpList = array();
    $hlist = $_POST['help'];
    if ($hlist) {
        $helpList = '';
        foreach ($hlist as $value) {
            $helpList .= $value . ", ";
        }
        $helpList = rtrim($helpList, ", ");
    }


    if ($member == "new") {
        $member = "New Member Registration";
    } elseif ($member = "renew") {
        $member = "Renewal Registration";
    } else {
        $member = "Unknown";
    }

    $mpdf = new \Mpdf\Mpdf();

    $data = "";

    $data .= '<h1><img src = "assets/img/logo-dark.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Castle Country OHV Association&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src = "assets/img/logo-dark.png" width="50px"></h1>';

    $data .= '<strong>This is a: </strong> ' . $member . ' <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Receive Newsletter via: </strong>' . $newsletter . '<br>';

    $data .= '<strong>Name:</strong> ' . $firstname . ' ' . $lastname . ' <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address: </strong>' . $email . '<br>';

    $data .= '<strong>Phone: </strong>' . $phone . '<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P.O. Box: </strong>' . $pobox . '<br>';

    $data .= '<strong>Address: </strong>' . $address . '<br>';

    $data .= '<strong>City: </strong>' . $city . '<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State: </strong>' . $state . '<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zip:</strong>' . $zip . '<br>';

    $data .= '<br><strong>Would like to help with: </strong>' . $helpList;

    $data .= '<p><strong>Membership will cost $ 25.00 per year per household. This money will be used for newsletter, postage, club events and group membership to The BLUE RIBBON COALITION & The Utah ATV Association.</strong></p>';
    $data .= '<strong><u>*No Alcohol Policy</u> on all Club Sponsored Rides and Events. “Drinking Alcohol while driving an Off Highway Vehicle (OHV) is against the Law.” Each Member is expected to portray a safe and responsible attitude while riding OHV’s and to respect the environment around us.</strong>';
    $data .= '<h3>STATEMENT OF LIMITED LIABILITY</h3>';
    $data .= 'The Castle Country Off Highway Vehicle Association assumes no responsibility or liability for any loss, damage, or injury or death to any person or property in connection with your participation in any ATV ride. Your presence and participation in rides indicates knowledge of, and assumption of, the resulting risks involved. All participants are, therefore, urged to be sure that they use proper riding gear, are in satisfactory physical condition, and to secure prior to the ride, appropriate medical and personal injury and property damage insurance coverage. A parent or legal guardian must accompany juveniles. Utah State law requires that operators of ATV’s must be 8 years of age or older. Operators between 8 and 16 years of age must be State certified in order to ride on Public lands.
<br>I HAVE READ THE ABOVE INFORMATION ON RISK, RELEASE AND WAVER OF LIABILITY, HOLD-HARMLESS AND INDEMNITY AGREEMENT, FULLY UNDERSTAND ITS TERMS, UNDERSTAND THAT I MAY HAVE GIVEN UP SUBSTANTIAL RIGHTS BY SIGNING IT, AND HAVE SIGNED IT, ON BEHALF OF MYSELF AND MY MINOR CHILDREN, FREELY AND VOLUNTARILY WITHOUT ANY INDUCEMENT, ASSURANCE OR GUARANTEE BEING
MADE TO ME AND FULLY INTEND MY SIGNATURE TO BE A COMPLETE, CONTINUING AND UNCONDITIONAL RELEASE OF ALL LIABILITY TO THE FULLEST EXTENT ALLOWED BY LAW. IF I FAIL TO ABIDE BY THE ASSOCIATION BY-LAWS, I SHALL FORFEIT MY MEMBERSHIP AND DUES.<br>';

    $data .= '<strong>By selecting "I Accept" using any device, means that you have read and understand the "STATEMENT OF LIMITED LIABILITY", our "No Alcohol Policy", and to practice safe OHV handling at all times. Furthermore you agree that your signature on this document (hereafter referred to as your "E-Signature") is as valid as if you signed the document in writing.</strong>';

    $data .= '<br><br><strong>Accepted Agreement On: </strong>' . $date . '<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Electronic Signature: </strong>' . $signature;

    $mpdf->WriteHTML($data);

    $mpdf->Output('CCOHV_RegistrationForm.pdf', 'D');
    $content = $mpdf->Output('', 'S');
    $filename = 'CCOHVA_Registration_' . $lastname . '.pdf';
    $subject = 'CCOHVA Registration Submission';
