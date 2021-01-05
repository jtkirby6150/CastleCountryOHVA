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

$data .= '<img src = "assets/img/logo-dark.png" width="100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1>Castle Country OHV Association</h1><img src = "assets/img/logo-dark.png" width="100px">';


$mpdf -> WriteHTML($data);

$mpdf -> Output('CCOHV_RegistrationForm.pdf', 'D');