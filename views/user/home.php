<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
</style>
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="container pb-5">
    <div class="container mt-3">
        <div class="jumbotron">
            <h1 class="animate__rubberBand animate__animated"
                style="font-family: 'Kdam Thmor Pro', sans-serif; color: chocolate;">Welcome to my shop!</h1>
            <p class="text-justify" style="padding: 1rem;
    border-radius: 10px;
    background-color: #ffff0063;">Welcome to our static model store! We take pride in offering a diverse collection of
                stunning static models for enthusiasts, builders, and decorators. With high quality and intricate
                details, each static model will provide you with a unique experience and create a special focal point in
                your space. Explore our unique static models and express your individuality through passion and
                creativity. Start shopping today and build an impressive collection of your own!</p>
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./uploads/gioi-tre-sai-gon-chi-tien-khung-suu-tap-do-choi-sieu-mo-hinh-7.jpg" alt=""
                            width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="./uploads/ke-xe-mo-hinh-1600x1600.jpg" alt="" width="1100" height="500">
                    </div>
                    <div class="carousel-item">
                        <img src="./uploads/mg-4601-min-922.jpg" alt="" width="1100" height="500">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <h1 class="animate__rubberBand animate__animated"
                style="font-family: 'Kdam Thmor Pro', sans-serif; color: chocolate;">Special Product</h1>
        <div class="d-flex">
            <div class="row">
                <div class="col-4"><img class="rounded-circle my-2" style="width: 100%;" src="./uploads/1.jpg" alt=""></div>
                <div class="col-4"><img class="rounded-circle my-2" style="width: 100%;" src="./uploads/2.webp" alt=""></div>
                <div class="col-4"><img class="rounded-circle my-2" style="width: 100%;" src="./uploads/3.webp" alt=""></div>
                <div class="col-4"><img class="rounded-circle my-2" style="width: 100%;" src="./uploads/4.webp" alt=""></div>
                <div class="col-4"><img class="rounded-circle my-2" style="width: 100%;" src="./uploads/5.webp" alt=""></div>
                <div class="col-4"><img class="rounded-circle my-2" style="width: 100%;" src="./uploads/6.webp" alt=""></div>
            </div>
        </div>

    </div>
</div>

<?php $this->stop() ?>