<?php

use App\Models\Product;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
    .input-group {
        width: 200px;
    }

    .btn-number {
        padding: 6px 12px;
        height: 34px;
    }

    .input-number {
        text-align: center;
    }
</style>
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="alert alert-success alert-dismissible fade <?= isset($status['none']) ? 'show' : '' ?>" style="position: fixed; right:1rem; top:7rem;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Đã thêm sản phẩm vào giỏ hàng!
</div>

<div class="alert alert-warning alert-dismissible fade <?= isset($status['error']) ? 'show' : '' ?>" style="position: fixed; right:1rem; top:7rem;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php if (isset($status['error'])) : ?>
                            <strong>Error!</strong> <?= $this->e($status['error']) ?>
                    <?php endif ?>
</div>

<div class="alert alert-danger alert-dismissible fade <?= isset($status['null']) ? 'show' : '' ?>" style="position: fixed; right:1rem; top:7rem;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> Bạn chưa đăng nhập!
</div>
<br>
<div class="container rounded p-2 mb-5" style="background-color: aliceblue;">

    <div class="d-flex">
        <div style="width: 50%;">
            <img style="width:100%;" class="img-thumbnail" src="<?= '/uploads/' . htmlspecialchars($product['photo']) ?>" alt="">
        </div>
        <div class="d-flex flex-column justify-content-around px-3">
            <h2 class="bold">
                <?= $this->e($product->name) ?>
            </h2>
            <h3>Thông tin sản phẩm:
                <?= $this->e($product->desc) ?>
            </h3>
            <h4>Số lượng trong kho:
                <?= $this->e($product->quantity) ?>
            </h4>
            <h4>
                Giá: <?= $this->e($product->price) ?>VND
            </h4>
            <form action="<?= '/product/' . $this->e($product->id) ?>" method="post">
                <div>

                    
                    <?php if(\App\SessionGuard::isUserLoggedIn()): ?>
                        <?php $user = \App\SessionGuard::user() ?>
                        <input type="hidden" name="user_id" value="<?= $this->e($user->id) ?>">
                    <?php endif ?>

                    <input name="product_id" type="hidden" value="<?= $this->e($product->id) ?>">

                    <div class="input-group align-items-center">
                        <span>Số lượng: </span>
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-number" data-type="minus" data-field="quantity">
                                <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus"></i></span>
                            </button>
                        </span>
                        <input style="flex: none; width: 4rem;
                        text-align: center;" type="text" name="quantity" class="form-control input-number" value="1" min="1" readonly>
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-number" data-type="plus" data-field="quantity">
                                <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus"></i></span>
                            </button>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning mt-4">Thêm vào giỏ</button>
            </form>
        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start("page_specific_css") ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('.btn-number').click(function (e) {
            e.preventDefault();

            var fieldName = $(this).attr('data-field');
            var type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentValue = parseInt(input.val());

            if (!isNaN(currentValue)) {
                if (type === 'minus') {
                    if (currentValue > input.attr('min')) {
                        input.val(currentValue - 1);
                    }
                } else if (type === 'plus') {
                    if (currentValue < <?= $product->quantity ?>)
                        input.val(currentValue + 1);
                }
            }
        });

        setTimeout(function () {
            $(".alert").removeClass('show');
        }, 3000);

    });


</script>

<?php $this->stop() ?>