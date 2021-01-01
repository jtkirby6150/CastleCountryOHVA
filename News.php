<?php
include "mainincludes/header.php";
include "mainincludes/init.php";
include "mainincludes/nav.php";
?>
    <div class="container">
        <h1 style="text-align: center;">News</h1>
        <section>
            <div class="container">


                    <?php
                    $getNews = query("SELECT * FROM news WHERE archive = 0 ORDER BY date DESC");
                    while($row = fetch_array($getNews)){
                        $title = $row['title'];
                        $date = $row['date'];
                        $description = $row['description'];
                        $dir = 'assets/img/news';
                        $image = $row['image'];

                        echo "<div class='row'>
                        <div class='col col-md-12 mb-5' style='padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;box-shadow: 0px 0px 10px 5px #af6b58;'>
                        <div class='bg-light border rounded shadow card' style='background: #556052;color: #f2efea;'>
                        <div class='text-center'>"; displayNewsImages($image);
                        echo "</div>                        
                            <div class='card-body' style='background: #556052;color: #f2efea;'>
                                <h3 class='card-title' style='font-family: Antic, sans-serif;color: #f2efea;'>$title</h3>
                                <h5 class='card-sub-title' style='font-family: Antic, sans-serif;color: #f2efea;'>$date</h5>
                                <p class='card-text' style='font-family: Antic, sans-serif;color: #f2efea;font-size: 14px;'>
                                <br>$description<br><br></p>
                            </div>
                        </div>
                    </div>
                    </div>";

                    }
                    ?>
            </div>
        </section>
 <?php include "mainincludes/footer.php";