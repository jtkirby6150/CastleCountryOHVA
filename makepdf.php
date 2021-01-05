<?php

require_once __DIR__ . '/vendor/autoload.php';

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

$mpdf = new \Mpdf\Mpdf();

$data = "";

$data .= '<h1><img src = "assets/img/logo-dark.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Castle Country OHV Association&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src = "assets/img/logo-dark.png" width="50px"></h1>';

$data .='<br><strong>This a: </strong> ' . $member . ' <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Receive Newsletter via: </strong>' . $newsletter .'</br>';

$data .='<strong>Name:</strong> ' . $firstname . ' ' . $lastname . ' <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email Address: </strong>' . $email .'</br>';



$mpdf -> WriteHTML($data);

$mpdf -> Output('CCOHV_RegistrationForm.pdf', 'D');