<?php
include "mainincludes/init.php";
include "mainincludes/header.php";
include "mainincludes/nav.php";
?>
    <h1 style="text-align: center;">Board Members</h1>
    <div class="container">
        <section>
            <div class="container">
                <div class="row">
                    <?php
                    $getBoard = query("SELECT * FROM board ORDER BY name");
                    while($bmrow = fetch_array($getBoard)) {
                        $id = $bmrow['id'];
                        $boardname = $bmrow['name'];
                        $boardemail = $bmrow['email'];
                        $boardphone = $bmrow['phone'];
                        $boardtitle = $bmrow['title'];

                        $getDescription = query("SELECT * FROM boardtitles WHERE name = '$boardtitle'");
                        while($desRow = fetch_array($getDescription)) {
                            $description = $desRow['description'];

                        }
                        echo "<div class='col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4' style='padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;'>
                        <div class='bg-light border rounded shadow card' data-bs-hover-animate='pulse'>
                            <div class='card-body' style='box-shadow: 0px 0px 10px 5px;'>
                                <h3 class='card-title' style='font-family: Antic, sans-serif;color: #556052;'>$boardname</h3>
                                <p class='font-weight-bold'>$boardtitle</p>
                                <p style='color: #556052;'>$boardphone</p>
                                <div class='text-center'><a class='btn' href='contactus.php?contact=$id'>Contact Me</a></div>
                                
                            </div>
                        </div>
                    </div>";
                    }


                    ?>

                </div>
            </div>
        </section>
        <h4 style="margin: 25px;" class="text-center mt-5">Board Member Title Reference</h4>
        <div class="table-responsive" style="margin: 25px;">
            <table class="table mb-5">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getTitles = query("SELECT * FROM boardtitles ORDER BY name");
                while($titleRow = fetch_array($getTitles)){
                    $title = $titleRow['name'];
                    $id = $titleRow['id'];
                    $description = $titleRow['description'];
                    echo "<tr>
                <td>$title</td>
                <td>$description</td>
            </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php include "mainincludes/footer.php";?>
    </div>
