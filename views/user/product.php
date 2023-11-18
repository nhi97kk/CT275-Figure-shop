<?php

use App\Models\Product;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>

<?php $this->stop() ?>

<?php $this->start("page") ?>

<br>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Tất cả sản phẩm</a>
    </li>
    <?php foreach ($categorys as $category): ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu<?= $category->id ?>">
                <?= $category->name ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
        <div class="row ">
            <?php foreach ($products as $product): ?>
                <div class="card col-3 " style="width:400px">
                    <img class="card-img-top" src="<?= '/uploads/' . htmlspecialchars($product['photo']) ?>" alt="Card image"
                        style="width:100%">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h4 class="card-title">
                            <?= $product['name'] ?>
                        </h4>
                        <p class="card-text">
                            <?= $product['desc'] ?>
                        </p>
                        <a href="<?= '/product/' . $this->e($product->id) ?>" class="btn btn-primary">See Product</a>
                    </div>
                </div>
            <?php endforeach ?>
            
        </div>

    </div>

    <?php foreach ($categorys as $category): ?>
        <div id="menu<?= $category->id ?>" class="container tab-pane fade"><br>
            <div class="row">
                <?php $products = Product::where('category_id', $category->id)->get() ?>
                <?php foreach ($products as $product): ?>
                    <div class="card col-3" style="width:400px">
                        <img class="card-img-top" src="<?= '/uploads/' . htmlspecialchars($product['photo']) ?>" alt="Card image"
                            style="width:100%">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h4 class="card-title">
                                <?= $product['name'] ?>
                            </h4>
                            <p class="card-text">
                                <?= $product['desc'] ?>
                            </p>
                            <a href="<?= '/product/' . $this->e($product->id) ?>" class="btn btn-primary">See Product</a>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $this->stop() ?>