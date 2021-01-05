<?php
include "mainincludes/init.php";
include "mainincludes/header.php";
include "mainincludes/nav.php";
?>
    <div class="container">
        <h1 style="text-align: center;">Land Management</h1>
        <p style="text-align: center;margin: 50px;">We would like to thank the men and women that have dedicated their lives to saving our natural resources and preserving the great outdoors.</p>
        <h3 style="text-align: center;">THANK YOU!</h3>
        <section>
            <div class="container">
                <div class="row">
                    <?php
                    $sql = query("SELECT * FROM landmanagement");
                    while($row = fetch_array($sql)){
                        $title = $row['title'];
                        $url = $row['url'];
                        $description = $row['description'];
                        $image = $row['image'];

                        $dir = "assets/img/partners";


                        echo "<div class='col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4' style='padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;margin: 25px 0;'>
                        <div class='bg-light border rounded shadow card' data-bs-hover-animate='pulse'>
                        <img class='card-img-top' src='$dir/$image' style='height: 175px;'>
                            <div class='card-body'>
                                <a href='#'><h3 class='card-title' style='font-family: Antic, sans-serif;color: rgb(81,87,94);'>$title</h3></a>
                                <h5 class='card-sub-title' style='font-family: Antic, sans-serif;color: rgb(81,87,94);'>$description</h5>
                                <div style='text-align: center;'><a href='$url' target='_blank' class='btn' type='button' style='color: #f2efea;background: #af6b58;'>Visit Us</a></div>
                            </div>
                        </div>
                    </div>";

                    }

                    ?>


                </div>
            </div>
        </section>
    </div>
    <div class="container">
       <?php include "mainincludes/footer.php" ?>