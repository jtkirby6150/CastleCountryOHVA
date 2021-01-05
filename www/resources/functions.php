<?php

function query($query){
    global $conn;
    return mysqli_query($conn, $query);
}

function fetch_array($result)
{
    global $conn;
    return mysqli_fetch_array($result);
}

function set_message($message, $level='danger')
{
    if($level != 'primary' && $level != 'secondary' && $level != 'info' && $level != 'warning' && $level != 'success'){
        $level = 'danger';
    }
    if (!empty($message)) {
        $_SESSION['message'] = "<div class='text-center alert alert-{$level} alert-dismissible fade show' role='alert'>
  <strong>$message</strong>
  <button type='button' class='close'' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    } else {
        unset($_SESSION['message']);
    }
}

function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location)
{
    return header("Location: $location");
}

function confirm($result)
{
    global $conn;
    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }
}

function escape($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}

function generate_token(){
    return md5(microtime().mt_rand());
}

function row_count($result)
{
    return mysqli_num_rows($result);
}

function dealwithimage($imagenum, $imagetmp, $imagesize, $imageerror, $dir){
    //dealing with image
    $fileExt = explode(".", $imagenum);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
        if ($imageerror === 0) {
            if ($imagesize < 5000000) {
                $newImage = $imagenum;
                $fileDestination = $dir . "/" .  $newImage;
                if (file_exists($fileDestination)) {
                    echo "<h6 class='container text-center alert alert-warning'>File <i>'$imagenum'</i> already exists and was not uploaded.</h6>";
                } else {
                    if (!is_dir($dir)) {
                        mkdir($dir, 0777, true);
                    }

                    move_uploaded_file($imagetmp, $fileDestination);
                    return true;
                }
            } else {
                echo "<h6 class='container text-center alert alert-warning'>File <i>'$imagenum'</i> is too large. Up to 5MB Allowed.</h6>";
            }
        } else {
            echo "<h6 class='container text-center alert alert-warning'>There was an error uploading your file: <i>'$imagenum'</i></h6>";
        }
    } else {
        echo "<h6 class='container text-center alert alert-warning'>Sorry, this file type <i>'$fileActualExt'</i> is not supported. <br>We currently support: jpg, jpeg, and png files.</h6>";
    }
}


function displayImages($img)
{
    $prop_target = "assets/archives";
    if ($img) {
        echo "<div class='text-center col-sm-6 col-md-4 col-lg-3 item' style='margin: 10px 0; height: 150px; width: auto'><a 
                                data-lightbox='photos' href='$prop_target/$img'>
                                        <img class='img-fluid' src='$prop_target/$img' style='height: 100%; width: auto' /></a>
                                        </div>";
    }
}

function displayArchiveImages($img)
{
    $prop_target = "../assets/archives";
    if ($img) {
        echo "<div class='text-center col-sm-6 col-md-4 col-lg-3 item' style='margin: 10px 0; height: 150px; width: auto'><a 
                                data-lightbox='photos' href='$prop_target/$img'>
                                        <img class='img-fluid' src='$prop_target/$img' style='height: 100%; width: auto' /></a>
                                        </div>";
    }
}

function displayNewsImages($img)
{
    $prop_target = "assets/img/news";
    if ($img) {
        echo "<div class='text-center' style='margin: 10px 0; height: 420px; width: auto'><a 
                                data-lightbox='photos' href='$prop_target/$img'>
                                        <img class='img-fluid' src='$prop_target/$img' style='height: 100%; width: auto' /></a>
                                        </div>";
    }
}

function displayAdminNewsImages($img)
{
    $prop_target = "../assets/img/news";
    if ($img) {
        echo "<div class='text-center' style='margin: 10px 0; height: 420px; width: auto'><a 
                                data-lightbox='photos' href='$prop_target/$img'>
                                        <img class='img-fluid' src='$prop_target/$img' style='height: 100%; width: auto' /></a>
                                        </div>";
    }
}


function clean($string)
{
    return htmlentities($string);
}





?>
<script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm("Are you sure you would like to delete this?");
    }
</script>