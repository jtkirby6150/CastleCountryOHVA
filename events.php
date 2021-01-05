<?php
include "mainincludes/header.php";
include "mainincludes/init.php";

include "mainincludes/nav.php";
?>
    <div class="container">
        <h1 class="text-center">Events</h1>

                <?php
                $sql = query("SELECT * FROM events WHERE archive = 0 ORDER BY date");
                while($row = fetch_array($sql)){
                    $title = $row['title'];
                    $date = $row['date'];
                    $time = $row['time'];
                    $loc = $row['location'];
                    $gps = $row['gps'];
                    $difficulty = $row['difficulty'];
                    $duration = $row['duration'];
                    $description = $row['description'];
                    $image= $row['image'];

                    if($time) {
                        $time = date("H:i A", strtotime($time));
                        } else {
                        $time = "To be determined";
                    }

                    echo "<div class='photo-card' style='margin: 25px auto 50px;box-shadow: 0px 0px 10px 5px #af6b58; color: white'>
                    <div class='photo-background' style='background: url(assets/img/events/$image) center / cover no-repeat;'></div>
                    <div class='photo-details' style='border-color: #556052;'><h1><b>$title</b> </h1>
                    <b>Date: </b>" . date("m/d/Y", strtotime($date)) . "<br>
                    <b>Time: </b>$time<br>
                    <b>Location: </b>$loc <br>
                    <b>GPS: </b>" . clean($gps) . "<br>
                    <b>Difficulty: </b>$difficulty <br>
                    <b>Duration: </b>$duration <br>
                    <b>Ride Description: </b><br>
                    $description<br><br></p>  <div class='photo-tags' style='text-align: center;'>
                    <a href='contactus.php' class='btn' data-bs-hover-animate='pulse' type='button' style='color: #1c1c1c;background: #af6b58;'><strong>Contact Us</strong></a></div>
            </div>
        </div>";

                }
                ?>
  <?php include "mainincludes/footer.php"; ?>
    </div>
