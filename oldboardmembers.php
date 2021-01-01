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
                                <button type='button' name='titlebutton' class='btn btn-info btn-lg' data-toggle='modal' data-target='#titlemodal'>$boardtitle</button>
                                <p style='color: #556052;'>$boardphone</p>
                                <p>$description</p>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>

                    <div id="titlemodal" role="dialog" tabindex="-1" class="modal fade" style="display: block;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Modal Title</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <h1>Heading</h1>
                                    <p>The content of your modal.</p>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
          <?php include "mainincludes/footer.php";?>
    </div>
