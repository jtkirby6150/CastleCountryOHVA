<?php
include "mainincludes/header.php";
include "mainincludes/init.php";
include "mainincludes/nav.php";

?>
    <h1 style="text-align: center;">Archives</h1>
    <div>
        <?php
        $num = 0;
        $getArchives = query("SELECT * FROM archives");
        while($row = fetch_array($getArchives)){
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


            displayImages($image1);
            displayImages($image2);
            displayImages($image3);
            displayImages($image4);
            displayImages($image5);
            displayImages($image6);
            displayImages($image7);
            displayImages($image8);
            displayImages($image9);
            displayImages($image10);
            displayImages($image11);
            displayImages($image12);
            displayImages($image13);
            displayImages($image14);
            displayImages($image15);

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
           
        </div></div></div>";
        }
        ?>
<div class="container">
        <?php
        include "mainincludes/footer.php" ?>


</div>

