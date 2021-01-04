<?php
ob_start();
session_start();
date_default_timezone_set('America/Denver');
include 'resources/functions.php';
$conn = mysqli_connect('localhost', 'ccohva', 'secret!@#', 'ccohva');


$logodir = "assets/img";
$resources = "resources";

?>