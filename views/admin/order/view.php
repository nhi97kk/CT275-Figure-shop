<?php
use \App\Models\Product;
$this->layout("layouts/defaultAdmin", ["title" => APPNAME]) ?>

<?php $this->start("pagee") ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mt-3 text-center animate__animated animate__bounce">Detail Order</h2>
            
                <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                        <tr><td colspan="3">Tên người nhận: <?= $this->e($order->name) ?></td> </tr>
                        <tr><td colspan="3">Số điện thoại: <?= $this->e($order->phone) ?></td></tr>
                        <tr><td colspan="3">Địa chỉ: <?= $this->e($order->address) ?></td></tr>
                        <?php foreach ($carts as $cart): ?>
                            <?php $product = Product::where("id", $cart->product_id)->first(); ?>
                            <?php if (isset($product)): ?>
                            <tr>
                                <td>
                                    <?= $this->e($product->name) ?>
                                    <p>
                                        <?= $this->e($product->desc) ?>
                                    </p>
                                </td>
                                <td>
                                    <img class="img-thumbnail" style="width: 5rem;" class="photo"
                                        src="<?= '/uploads/' . html_escape($product['photo']) ?>" alt="photo">
                                </td>
                                <td>
                                    <div class="input-group align-items-center d-flex flex-column">
                                        <span>Số lượng:
                                            <?= $this->e($cart->quantity) ?>
                                        </span>
                                        <span>
                                            <?= $this->e($product->price * $cart->quantity) ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                        <tr><td colspan="3">Tổng đơn: <?= $this->e($order->total) ?></td></tr>   
                </tbody>
                </table>
            
        </div>
    </div>
</div>

<?php $this->stop() ?>
