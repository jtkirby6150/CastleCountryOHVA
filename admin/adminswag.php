<?php
include "includes/header.php";
include "../mainincludes/init.php";
include "includes/nav.php";
?>
        <h1 style="text-align: center;margin: 25px;">SWAG</h1>
        <div class="row">
            <div class="col">
                <div style="text-align: center;"><img style="margin-bottom: 15px;height: 250px;" height="420px"></div>
            </div>
        </div>
        <div class="row">
            <div class="col" style="text-align: center;">
                <div class="form-group"><input type="file"></div>
            </div>
            <div class="col">
                <div class="form-group"><input type="text" class="form-control" name="imageTxt" placeholder="Alt Image Text"></div>
            </div>
        </div>
        <div class="row" style="margin: 10px 0;margin-top: 0px;">
            <div class="col-3">
                <div><img class="card-img-top" src="/assets/img/alleStudio2.jpg" style="height: 200px;">
                    <div class="card-body">
                        <div class="form-group"><input type="file"></div>
                        <div class="form-group"><input type="text" class="form-control" name="altImg1" placeholder="Alt Image Text"></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div><img class="card-img-top" src="/assets/img/alleStudio2.jpg" style="height: 200px;">
                    <div class="card-body">
                        <div class="form-group"><input type="file"></div>
                        <div class="form-group"><input type="text" class="form-control" name="altImg1" placeholder="Alt Image Text"></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div><img class="card-img-top" src="/assets/img/alleStudio2.jpg" style="height: 200px;">
                    <div class="card-body">
                        <div class="form-group"><input type="file"></div>
                        <div class="form-group"><input type="text" class="form-control" name="altImg1" placeholder="Alt Image Text"></div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div><img class="card-img-top" src="/assets/img/alleStudio2.jpg" style="height: 200px;">
                    <div class="card-body">
                        <div class="form-group"><input type="file"></div>
                        <div class="form-group"><input type="text" class="form-control" name="altImg1" placeholder="Alt Image Text"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group"><input type="text" class="form-control" name="title" placeholder="Title"></div>
            </div>
            <div class="col">
                <div class="form-group"><input type="text" class="form-control" name="qty" placeholder="Quantity"></div>
            </div>
            <div class="col">
                <div class="form-group"><input type="text" class="form-control" name="price" placeholder="Price"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group"><input type="text" class="form-control" name="shortDesc" placeholder="Short Description"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group"><textarea class="form-control" name="description" placeholder="Description of item"></textarea></div>
                <div style="text-align: center;"><button class="btn btn-primary" type="button">Add Swag</button></div>
            </div>
        </div>
    </div>
 <?php include "includes/footer.php";