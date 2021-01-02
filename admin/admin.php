<?php
include "includes/header.php";
include "../mainincludes/init.php";

include "includes/nav.php";

if(!isset($_SESSION['username'])){
    set_message("You must be logged in to view that page.");
    redirect("../login.php");
    exit();
}


?>



    <div class="container">
        <h1>Welcome, Admin</h1>
        <?php display_message(); ?>
        <div class="table-responsive" style="margin: 30px auto;">

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php



                $getBoard = query("SELECT * FROM board ORDER BY name");
                while($bmrow = fetch_array($getBoard)) {
                    $id = $bmrow['id'];
                    $boardname = $bmrow['name'];
                    $boardemail = $bmrow['email'];
                    $boardphone = $bmrow['phone'];
                    $boardtitle = $bmrow['title'];
                    echo "<tr>
                        <td>$boardname</td>
                        <td>$boardtitle</td>
                        <td>$boardphone</td>
                        <td>$boardemail</td>
                    </tr>";
                }
                //webmaster detail
                echo "<tr>
                        <td>Kirby</td>
                        <td>Web Master</td>
                        <td>(801) 879-0378</td>
                        <td>james.t.kirby@gmail.com</td>
                    </tr>";
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-1" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Members & Swag</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-2" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Events</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-17" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Other Events</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-3" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">News</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-4" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Board Members</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-5" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Org Info</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-6" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Partners</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-7" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Sponsors</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-8" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Land Management</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="tab-1">
                    <p>Here you will find a breakdown of members based on "Active", "Inactive", "All Members", "About to expire" status'.</p>
                    <div style="text-align: center;"><button class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add New</button></div>
                <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-9" style="color: #f2efea;background: #af6b58;border-style: solid;border-color: #556052;">Active</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-10" style="border-style: solid;border-color: #556052;background: #af6b58;color: #f2efea;">Inactive</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-11" style="background: #af6b58;color: #f2efea;border-color: #556052;">All Members</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-100" style="background: #af6b58;color: #f2efea;border-color: #556052;">Swag</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="tab-9">
                                <p>Content for tab 9.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>James Kirby</td>
                                                <td>(435) 248-2888</td>
                                                <td>kirby@castlecountryohv.com</td>
                                                <td>PO Box 971<br>Ferron, Utah 84523</td>
                                                <td style="text-align: center;"><i class="fa fa-pencil" style="font-size: 30px;color: var(--green);"></i><i class="fa fa-trash" style="margin-left: 15px;font-size: 30px;color: var(--red);"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="tab-10">
                                <p>Content for tab 10.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>James Kirby</td>
                                                <td>(435) 248-2888</td>
                                                <td>kirby@castlecountryohv.com</td>
                                                <td>PO Box 971<br>Ferron, Utah 84523</td>
                                                <td style="text-align: center;"><i class="fa fa-pencil" style="font-size: 30px;color: var(--green);"></i><i class="fa fa-trash" style="margin-left: 15px;font-size: 30px;color: var(--red);"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="tab-11">
                                <p>Content for tab 11.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Edit / Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>James Kirby</td>
                                                <td>(435) 248-2888</td>
                                                <td>kirby@castlecountryohv.com</td>
                                                <td>PO Box 971<br>Ferron, Utah 84523</td>
                                                <td style="text-align: center;"><i class="fa fa-pencil" style="font-size: 30px;color: var(--green);"></i><i class="fa fa-trash" style="margin-left: 15px;font-size: 30px;color: var(--red);"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="tab-100">
                                <p>SWAG</p>
                                <div><button class="btn btn-primary" type="button">Add Swag</button></div>
                                <section>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Image/Title</th>
                                                <th>Short Description</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Active?</th>
                                                <th>Edit / Set Active / Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="text-align: center;">
                                                    <p>TITLE OF PRODUCT</p><img src="/assets/img/122532219_3394763900749660_2608346714282335828_n.jpg" style="height: 200px;">
                                                </td>
                                                <td>
                                                    <p>fdjsakj; df js;kjdfs ai;jdfsaidfsjh dfjkasj;fda jfkdas;jf zksajdsz <br>fddfsaj fdkjkaj;fd ka;jfkj ;djfasjldjf ;fdjsa fdajsdfjkl;fdjsa</p>
                                                </td>
                                                <td>
                                                    <p>10</p>
                                                </td>
                                                <td>
                                                    <p>$15.99</p>
                                                </td>
                                                <td>
                                                    <p>Active</p>
                                                </td>
                                                <td class="text-center">
                                                    <p><i class="fa fa-pencil" style="font-size: 30px;color: var(--success);"></i><br><i class="fa fa-check" style="margin: 0 15px;font-size: 30px;color: var(--blue);"></i><br><i class="fa fa-remove" style="margin: 0 15px;font-size: 30px;color: rgb(235,142,33);"></i><br><i class="fa fa-trash" style="font-size: 30px;color: var(--danger);"></i></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cell 3</td>
                                                <td>Cell 4</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>


                        </div>
                </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-2">
                    <p>Events</p>
                    <div style="text-align: center;"><a href="events.php" class="btn" data-bs-hover-animate="pulse" type="button" style="color: #f2efea;background: #af6b58;text-align: center;">Add New Event</a></div>
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-12" style="color: #f2efea;background: #af6b58;border-style: solid;border-color: #556052;">Events</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-13" style="background: #af6b58;color: #f2efea;border-style: solid;border-color: #556052;">Archives</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-14" style="color: #f2efea;background: #af6b58;border-style: solid;border-color: #556052;">Archived Events.</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="tab-12">
                                <p>Events</p>
                                <?php
                                $sql = query("SELECT * FROM events WHERE archive = 0 ORDER BY id");
                                while($row = fetch_array($sql)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $date = $row['date'];
                                    $time = $row['time'];
                                    $loc = $row['location'];
                                    $gps = $row['gps'];
                                    $difficulty = $row['difficulty'];
                                    $duration = $row['duration'];
                                    $description = $row['description'];
                                    $image = $row['image'];


                                    echo "<div class='photo-card' style='margin: 25px auto 50px;box-shadow: 0px 0px 10px 5px #af6b58; color: white'>
                    <div class='photo-background' style='background: url(../assets/img/events/$image) center / cover no-repeat;'></div>
                    <div class='photo-details' style='border-color: #556052;'><h1><b>$title</b> </h1>
                    <b>Date: </b>" . date("m/d/Y",strtotime($date)) . "<br>
                    <b>Time: </b>". date("H:i A",strtotime($time)) . "<br>
                    <b>Location: </b>$loc <br>
                    <b>GPS: </b>$gps <br>
                    <b>Difficulty: </b>$difficulty <br>
                    <b>Duration: </b>$duration <br>
                    <b>Ride Description: </b><br>
                    $description<br><br></p>  <div class='photo-tags' style='text-align: center;'>
                    <a href='events.php?edit=$id;' class='btn mb-2' data-bs-hover-animate='pulse' type='button' style='color: #1c1c1c;background: green;'><strong>Edit</strong></a>
                    <a href='adminarchive.php?archive=$id' class='btn mb-2' data-bs-hover-animate='pulse' type='button' style='color: #1c1c1c;background: #af6b58;'><strong>Archive</strong></a>
                    <a href='delete.php?event=$id' onclick='checkDelete()' class='btn' data-bs-hover-animate='pulse' type='button' style='color: white;background: red;'><strong>Delete</strong></a></div>
            </div>
        </div>";

                                }
                                ?>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-13">
                                <p>Archived Events</p>
                                <?php
                                $num = 0;
                                $getArchives = query("SELECT * FROM archives ORDER BY id DESC");
                                while($row = fetch_array($getArchives)){
                                    $archiveID = $row['id'];
                                    $title = $row['title'];
                                    $date = $row['date'];
                                    $location = $row['location'];
                                    $gps = $row['gps'];
                                    $duration = $row['duration'];
                                    $difficulty = $row['difficulty'];
                                    $description = $row['description'];
                                    $image1 = $row['image1'];
                                    $image2 = $row['image2'];
                                    $image3 = $row['image3'];
                                    $image4 = $row['image4'];
                                    $image5 = $row['image5'];
                                    $image6 = $row['image6'];
                                    $image7 = $row['image7'];
                                    $image8 = $row['image8'];
                                    $image9 = $row['image9'];
                                    $image10 = $row['image10'];
                                    $image11 = $row['image11'];
                                    $image12 = $row['image12'];
                                    $image13 = $row['image13'];
                                    $image14 = $row['image14'];
                                    $image15 = $row['image15'];

                                    $num ++;
                                    $carousel = "carousel" . $num;


                                    echo "<div class='container' style='margin-top: 40px; margin: auto'>
        <div style='box-shadow: 0px 0px 10px 5px #0f4c75;margin: 25px auto;'>
            <h1 style='text-align: center;font-family: Alex Brush, cursive;font-size: 50px;padding-top: 20px;'>$title</h1>
            
            
            
            <div class='col-md-12 mb-3 p-2'>
                                <div class='form-row photos'>";


                                    displayArchiveImages($image1);
                                    displayArchiveImages($image2);
                                    displayArchiveImages($image3);
                                    displayArchiveImages($image4);
                                    displayArchiveImages($image5);
                                    displayArchiveImages($image6);
                                    displayArchiveImages($image7);
                                    displayArchiveImages($image8);
                                    displayArchiveImages($image9);
                                    displayArchiveImages($image10);
                                    displayArchiveImages($image11);
                                    displayArchiveImages($image12);
                                    displayArchiveImages($image13);
                                    displayArchiveImages($image14);
                                    displayArchiveImages($image15);

                                    echo "
<hr style='border-style: dotted;border-top-width: 3px;border-top-color: rgb(85,96,82);width: 80%;' class='mb-5'>
                            </div>
                            </div>
                      <div class='my-3 mx-3'>
            <p style='margin-bottom: 20px;'>
            DATE: $date<br>
            LOCATION: $location<br>
            GPS: $gps<br>
            DIFFICULTY: $difficulty<br>
            DURATION: $duration<br>
            $description<br><br></p>
            <div class='photo-tags p-3' style='text-align: center;'>
                    <a href='adminarchive.php?archive=$archiveID&updatearchive' class='btn mb-2' data-bs-hover-animate='pulse' type='button' style='color: #1c1c1c;background: green;'><strong>Edit</strong></a>
                    
                    <a href='delete.php?archive=$archiveID' onclick='checkDelete()' class='btn' data-bs-hover-animate='pulse' type='button' style='color: white;background: red;'><strong>Delete</strong></a>
            </div>
        </div></div></div>";
                                }
                                ?>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab-14">
                                <p>Archived Events</p>
                                <?php
                                $sql = query("SELECT * FROM events WHERE archive = 1");
                                while($row = fetch_array($sql)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $date = $row['date'];
                                    $time = $row['time'];
                                    $loc = $row['location'];
                                    $gps = $row['gps'];
                                    $difficulty = $row['difficulty'];
                                    $duration = $row['duration'];
                                    $description = $row['description'];
                                    $image = $row['image'];


                                    echo "<div class='photo-card' style='margin: 25px auto 50px;box-shadow: 0px 0px 10px 5px #af6b58; color: white'>
                    <div class='photo-background' style='background: url(../assets/img/events/$image) center / cover no-repeat;'></div>
                    <div class='photo-details' style='border-color: #556052;'><h1><b>$title</b> </h1>
                    <b>Date: </b>" . date("m/d/Y",strtotime($date)) . "<br>
                    <b>Time: </b>". date("H:i A",strtotime($time)) . "<br>
                    <b>Location: </b>$loc <br>
                    <b>GPS: </b>$gps <br>
                    <b>Difficulty: </b>$difficulty <br>
                    <b>Duration: </b>$duration <br>
                    <b>Ride Description: </b><br>
                    $description<br><br></p>  <div class='photo-tags' style='text-align: center;'>
                    <a href='delete.php?event=$id' onclick='checkDelete()' class='btn' data-bs-hover-animate='pulse' type='button' style='color: white;background: red;'><strong>Delete</strong></a></div>
            </div>
        </div>";

                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center"></div>

                </div>
                <div class="tab-pane" role="tabpanel" id="tab-3">
                    <p>News</p>
                    <div style="text-align: center;" class="my-5"><a href="adminnews.php" class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add New</a></div>
                    <?php
                    $getNews = query("SELECT * FROM news");
                    while ($newsRow = fetch_array($getNews)){
                        $newsID = $newsRow['id'];
                        $newsTitle = $newsRow['title'];
                        $newsDesc = $newsRow['description'];
                        $newsDate = $newsRow['date'];
                        $newsImage = $newsRow['image'];

                        echo "<div class='row'>
                        <div class='col col-md-12 mb-5' style='padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;box-shadow: 0px 0px 10px 5px #af6b58;'>
                        <div class='bg-light border rounded shadow card' style='background: #556052;color: #f2efea;'>
                        <div class='text-center'>"; displayAdminNewsImages($newsImage);
                        echo "</div>                        
                            <div class='card-body' style='background: #556052;color: #f2efea;'>
                                <h3 class='card-title' style='font-family: Antic, sans-serif;color: #f2efea;'>$newsTitle</h3>
                                <h5 class='card-sub-title' style='font-family: Antic, sans-serif;color: #f2efea;'>$newsDate</h5>
                                <p class='card-text' style='font-family: Antic, sans-serif;color: #f2efea;font-size: 14px;'>
                                <br>$newsDesc<br><br></p>
                                <div style='text-align: center;' class='mb-3'><a href='adminnews.php?updatenewsinfo=$newsID' class='btn' data-bs-hover-animate='pulse' type='button' style='background: green;border-color: rgba(242,239,234,0);color: #f2efea;'>Update</a></div>
                                <div style='text-align: center;' class=''><a onclick=' return checkDelete()' href='delete.php?news=$newsID' class='btn' data-bs-hover-animate='pulse' type='button' style='background: red;border-color: rgba(242,239,234,0);color: #f2efea;'>Delete</a></div>
                                
                            </div>
                        </div>
                    </div>
                    </div>";
                    }
                    ?>

                </div>
                <div class="tab-pane" role="tabpanel" id="tab-4">
                    <p>Editing this info will update the Board Member info throughout the site.</p>
                    <div style="text-align: center;">
                        <a href="addboardmember.php" class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add New Board Member</a>
                        <a href="boardtitles.php" class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add Board Title</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Board Member</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getBoardMembers = query("SELECT * FROM board ORDER BY name");
                            while($bmlrow = fetch_array($getBoardMembers)){
                                $id = $bmlrow['id'];
                                $boardname = $bmlrow['name'];
                                $boardemail = $bmlrow['email'];
                                $boardphone = $bmlrow['phone'];
                                $boardtitle = $bmlrow['title'];

                                $getDescription = query("SELECT * FROM boardtitles WHERE name = '$boardtitle'");
                                while($desRow = fetch_array($getDescription)) {
                                    $description = $desRow['description'];

                                }

                                echo "<tr>
                                    <td><b>$boardname</b> <br><b>Phone:</b> $boardphone<br><b>Email:</b> $boardemail</td>
                                    <td>$boardtitle</td>
                                    <td>$description</td>
                                    <td class='text-center'>
                                    <a href='addboardmember.php?edit=$id'><i class='fa fa-pencil' style='font-size: 30px;color: var(--green);border-color: var(--gray-dark);'></i></a>
                                    <a onclick='return checkDelete()' href='delete.php?deleteboardmember=$id'><i class='fa fa-trash' style='font-size: 30px;color: var(--red);'></i></a></td>
                                </tr>";
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-5">
                    <p>Updating this information will change the organization info in all sections of the site. (i.e. Contact Us)<br></p>
                    <div style="text-align: center;"><button class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add New</button></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Castle Country OHV Association</td>
                                    <td><input type="text">&nbsp; &nbsp;&nbsp;<i class="fa fa-pencil" style="font-size: 30px;color: var(--green);border-color: var(--gray-dark);"></i></td>
                                </tr>
                                <tr>
                                    <td>Cell 3</td>
                                    <td>Cell 4</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-6">
                    <p>Updating this information will change the organization info in all sections of the site. (i.e. Contact Us)<br></p>
                    <div style="text-align: center;"><a href="partners.php" class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add New</a></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Description</th>
                                    <th>Edit / Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getPartners = query("SELECT * FROM partners ORDER BY title");
                            while($partnerRow = fetch_array($getPartners)){
                                $title = $partnerRow['title'];
                                $image = $partnerRow['image'];
                                $id = $partnerRow['id'];
                                $url = $partnerRow['url'];
                                $description = $partnerRow['description'];
                                $dir = "../assets/img/partners";
                                echo "<tr>
                                    <td>$title<br><img width='150px' src='$dir/$image' alt=''></td>
                                    <td>$url</td>
                                    <td>$description</td>
                                    <td><a href='partners.php?edit=$id'><i class='fa fa-pencil' style='font-size: 30px;color: var(--green);border-color: var(--gray-dark);'></i></a>
                                    <a onclick='return checkDelete()' href='delete.php?deletepartner=$id'><i class='fa fa-trash' style='font-size: 30px;color: var(--red);'></i></a></td>
                                </tr>";
                            }
                            ?>

                                <tr></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-7">
                    <p>Updating this information will change the organization info in all sections of the site. (i.e. Contact Us)<br></p>
                    <div style="text-align: center;"><a href="sponsors.php" class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add New</a></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getSponsors = query("SELECT * FROM sponsors ORDER BY title");
                            while($sponsorRow = fetch_array($getSponsors)){
                                $title = $sponsorRow['title'];
                                $image = $sponsorRow['image'];
                                $id = $sponsorRow['id'];
                                $url = $sponsorRow['url'];
                                $description = $sponsorRow['description'];
                                $dir = "../assets/img/partners";
                                echo "<tr>
                                    <td>$title<br><img width='150px' src='$dir/$image' alt=''></td>
                                    <td>$url</td>
                                    <td>$description</td>
                                    <td><a href='sponsors.php?edit=$id'><i class='fa fa-pencil' style='font-size: 30px;color: var(--green);border-color: var(--gray-dark);'></i></a>
                                    <a onclick='return checkDelete()' href='delete.php?deletesponsor=$id'><i class='fa fa-trash' style='font-size: 30px;color: var(--red);'></i></a></td>
                                </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab-8">
                    <p>Updating this information will change the organization info in all sections of the site. (i.e. Contact Us)<br></p>
                    <div style="text-align: center;"><a href="landmanagement.php" class="btn" data-bs-hover-animate="pulse" type="button" style="background: #af6b58;border-color: rgba(242,239,234,0);color: #f2efea;">Add New</a></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>URL</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $getlandmanagement = query("SELECT * FROM landmanagement ORDER BY title");
                            while($lmRow = fetch_array($getlandmanagement)){
                                $title = $lmRow['title'];
                                $image = $lmRow['image'];
                                $id = $lmRow['id'];
                                $url = $lmRow['url'];
                                $description = $lmRow['description'];
                                $dir = "../assets/img/partners";
                                echo "<tr>
                                    <td>$title<br><img width='150px' src='$dir/$image' alt=''></td>
                                    <td>$url</td>
                                    <td>$description</td>
                                    <td><a href='landmanagement.php?edit=$id'><i class='fa fa-pencil' style='font-size: 30px;color: var(--green);border-color: var(--gray-dark);'></i></a>
                                    <a onclick='return checkDelete()' href='delete.php?deletelandmanagement=$id'><i class='fa fa-trash' style='font-size: 30px;color: var(--red);'></i></a></td>
                                </tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

    <div class="tab-pane" role="tabpanel" id="tab-17">
        <p>Other Events</p>
        <div style="text-align: center;">
            <a href="otherevents.php" class="btn" data-bs-hover-animate="pulse" type="button" style="color: #f2efea;background: #af6b58;text-align: center;">Add New Event</a>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-18" style="color: #f2efea;background: #af6b58;border-style: solid;border-color: #556052;">Other Events</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-19" style="background: #af6b58;color: #f2efea;border-style: solid;border-color: #556052;">Archives</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" data-bs-hover-animate="pulse" href="#tab-20" style="color: #f2efea;background: #af6b58;border-style: solid;border-color: #556052;">Archived Events.</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-18">
                <h4>Other Events</h4>
                <?php
                $sql = query("SELECT * FROM otherevents WHERE archive = 0 ORDER BY id");
                while($row = fetch_array($sql)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $date = $row['date'];
                    $time = $row['time'];
                    $loc = $row['location'];
                    $gps = $row['gps'];
                    $difficulty = $row['difficulty'];
                    $duration = $row['duration'];
                    $description = $row['description'];
                    $image = $row['image'];

                    if(!$gps){
                        $gps = "N/A";
                    }
                    if(!$difficulty){
                        $difficulty = "N/A";
                    }


                    echo "<div class='photo-card' style='margin: 25px auto 50px;box-shadow: 0px 0px 10px 5px #af6b58; color: white'>
                            <div class='photo-background' style='background: url(../assets/img/otherevents/$image) center / cover no-repeat;'></div>
                            <div class='photo-details' style='border-color: #556052;'><h1><b>$title</b> </h1>
                                <b>Date: </b>" . date("m/d/Y",strtotime($date)) . "<br>
                                <b>Time: </b>". date("H:i A",strtotime($time)) . "<br>
                                <b>Location: </b>$loc <br>
                                <b>GPS: </b>$gps <br>
                                <b>Difficulty: </b>$difficulty <br>
                                <b>Duration: </b>$duration <br>
                                <b>Ride Description: </b><br>
                                $description<br><br></p>  
                            <div class='photo-tags' style='text-align: center;'>
                                <a href='otherevents.php?edit=$id;' class='btn mb-2' data-bs-hover-animate='pulse' type='button' style='color: #1c1c1c;background: green;'><strong>Edit</strong></a>
                                <a href='adminarchiveother.php?archive=$id' class='btn mb-2' data-bs-hover-animate='pulse' type='button' style='color: #1c1c1c;background: #af6b58;'><strong>Archive</strong></a>
                                <a href='delete.php?otherevent=$id' onclick='checkDelete()' class='btn' data-bs-hover-animate='pulse' type='button' style='color: white;background: red;'><strong>Delete</strong></a>
                            </div>
                            </div>
                        </div>";
                }
                ?>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab-19">
                <h4>Archives</h4>
                <?php
                $num = 0;
                $getArchives = query("SELECT * FROM otherarchives ORDER BY id DESC");
                while($row = fetch_array($getArchives)){
                    $archiveID = $row['id'];
                    $title = $row['title'];
                    $date = $row['date'];
                    $location = $row['location'];
                    $gps = $row['gps'];
                    $duration = $row['duration'];
                    $difficulty = $row['difficulty'];
                    $description = $row['description'];
                    $image1 = $row['image1'];
                    $image2 = $row['image2'];
                    $image3 = $row['image3'];
                    $image4 = $row['image4'];
                    $image5 = $row['image5'];
                    $image6 = $row['image6'];
                    $image7 = $row['image7'];
                    $image8 = $row['image8'];
                    $image9 = $row['image9'];
                    $image10 = $row['image10'];
                    $image11 = $row['image11'];
                    $image12 = $row['image12'];
                    $image13 = $row['image13'];
                    $image14 = $row['image14'];
                    $image15 = $row['image15'];

                    if(!$gps){
                        $gps = "N/A";
                    }
                    if(!$difficulty){
                        $difficulty = "N/A";
                    }

                    $num ++;
                    $carousel = "carousel" . $num;


                    echo "<div class='container' style='margin-top: 40px; margin: auto'>
                            <div style='box-shadow: 0px 0px 10px 5px #0f4c75;margin: 25px auto;'>
                                <h1 style='text-align: center;font-family: Alex Brush, cursive;font-size: 50px;padding-top: 20px;'>$title</h1>
                            <div class='col-md-12 mb-3 p-2'>
                            <div class='form-row photos'>";
                    displayArchiveImages($image1);
                    displayArchiveImages($image2);
                    displayArchiveImages($image3);
                    displayArchiveImages($image4);
                    displayArchiveImages($image5);
                    displayArchiveImages($image6);
                    displayArchiveImages($image7);
                    displayArchiveImages($image8);
                    displayArchiveImages($image9);
                    displayArchiveImages($image10);
                    displayArchiveImages($image11);
                    displayArchiveImages($image12);
                    displayArchiveImages($image13);
                    displayArchiveImages($image14);
                    displayArchiveImages($image15);

                    echo "<hr style='border-style: dotted;border-top-width: 3px;border-top-color: rgb(85,96,82);width: 80%;' class='mb-5'>
                            </div>
                            </div>
                            <div class='my-3 mx-3'>
                                <p style='margin-bottom: 20px;'>
                                DATE: $date<br>
                                LOCATION: $location<br>
                                GPS: $gps<br>
                                DIFFICULTY: $difficulty<br>
                                DURATION: $duration<br>
                                $description<br><br></p>
                                <div class='photo-tags p-3' style='text-align: center;'>
                                    <a href='adminarchiveother.php?archive=$archiveID&updatearchive' class='btn mb-2' data-bs-hover-animate='pulse' type='button' style='color: #1c1c1c;background: green;'><strong>Edit</strong></a>
                                    <a href='delete.php?otherarchive=$archiveID' onclick='checkDelete()' class='btn' data-bs-hover-animate='pulse' type='button' style='color: white;background: red;'><strong>Delete</strong></a>
                                </div>
                            </div>
                            </div>
                        </div>";
                }
                ?>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab-20">
                <h4>Archived Events</h4>
                <?php
                $sql = query("SELECT * FROM otherevents WHERE archive = 1");
                while($row = fetch_array($sql)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $date = $row['date'];
                    $time = $row['time'];
                    $loc = $row['location'];
                    $gps = $row['gps'];
                    $difficulty = $row['difficulty'];
                    $duration = $row['duration'];
                    $description = $row['description'];
                    $image = $row['image'];

                    if(!$gps){
                        $gps = "N/A";
                    }
                    if(!$difficulty){
                        $difficulty = "N/A";
                    }


                    echo "<div class='photo-card' style='margin: 25px auto 50px;box-shadow: 0px 0px 10px 5px #af6b58; color: white'>
                            <div class='photo-background' style='background: url(../assets/img/otherevents/$image) center / cover no-repeat;'>
                            </div>
                            <div class='photo-details' style='border-color: #556052;'><h1><b>$title</b> </h1>
                                <b>Date: </b>" . date("m/d/Y",strtotime($date)) . "<br>
                                <b>Time: </b>". date("H:i A",strtotime($time)) . "<br>
                                <b>Location: </b>$loc <br>
                                <b>GPS: </b>$gps <br>
                                <b>Difficulty: </b>$difficulty <br>
                                <b>Duration: </b>$duration <br>
                                <b>Ride Description: </b><br>
                                    $description<br><br></p>  
                            <div class='photo-tags' style='text-align: center;'>
                                <a href='delete.php?otherevent=$id' onclick='checkDelete()' class='btn' data-bs-hover-animate='pulse' type='button' style='color: white;background: red;'><strong>Delete</strong></a>
                            </div>
                            </div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>




            
         <?php include "includes/footer.php"; ?>
    </div>
