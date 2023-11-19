<?php

use App\Models\Product;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>

<?php $this->stop() ?>

<?php $this->start("page") ?>

<br>
<!-- Nav tabs -->
<ul class="nav nav-tabs" style="background-color: black;" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Tất cả sản phẩm</a>
    </li>
    <?php foreach ($categorys as $category): ?>
        <li class="nav-item">
            <a class="nav-link" style="font-style: bold;" data-toggle="tab" href="#menu<?= htmlspecialchars($category->id) ?>">
                <?= htmlspecialchars($category->name) ?>
            </a>
        </li>
    <?php endforeach ?>
</ul>

<!-- Tab panes -->
<div class="tab-content pb-5" style="background-color: #000000bf;">
    <div id="home" class="container tab-pane active"><br>
        <div class="row " style="margin-left: -1rem; margin-right: -1rem;">
            <?php foreach ($products as $product): ?>
                <div class="col-3 px-1 py-1 align-self-stretch">
                <div class="card " style="height:100%;">
                    <img class="card-img-top" src="<?= '/uploads/' . htmlspecialchars($product['photo']) ?>" alt="Card image"
                        style="width:100%">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h4 class="card-title">
                            <?= htmlspecialchars($product['name']) ?>
                        </h4>
                        <p class="card-text">
                            <?= htmlspecialchars($product['desc']) ?>
                        </p>
                        <p class="card-text">
                            Giá: <?= htmlspecialchars($product['price']) ?>VND
                        </p>
                        <a href="<?= '/product/' . $this->e($product->id) ?>" class="btn btn-primary">Detail</a>
                    </div>
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
                    <div class="col-3 px-1 py-1 align-self-stretch">
                <div class="card " style="height:100%;">
                    <img class="card-img-top" src="<?= '/uploads/' . htmlspecialchars($product['photo']) ?>" alt="Card image"
                        style="width:100%">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h4 class="card-title">
                            <?= htmlspecialchars($product['name']) ?>
                        </h4>
                        <p class="card-text">
                            <?= htmlspecialchars($product['desc']) ?>
                        </p>
                        <p class="card-text">
                            Giá: <?= htmlspecialchars($product['price']) ?>VND
                        </p>
                        <a href="<?= '/product/' . $this->e($product->id) ?>" class="btn btn-primary">Detail</a>
                    </div>
                </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $this->stop() ?>