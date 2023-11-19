<?php
use \App\Models\Product;
use \App\Models\Cart;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="container bg-white mt-3 mb-5 rounded py-3">

    <?php $total = 0; ?>
    <div class="row">
        <div class="col-12">
            <h2 class="mt-3 text-center animate__animated animate__bounce">Your Orders</h2>
            <?php foreach ($orders as $order): ?>
                <div class="rounded p-3" style="background-color: darkgray;">
                    <p>Tên người nhận:
                        <?= $this->e($order->name) ?>
                    </p>
                    <p>Số điện thoại:
                        <?= $this->e($order->phone) ?>
                    </p>
                    <p>Địa chỉ:
                        <?= $this->e($order->address) ?>
                    </p>
                    <table id="table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $carts = Cart::where('order_id', $order->id)->where('user_id', $user->id)->get(); ?>
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
                                                    <?php $total += $product->price * $cart->quantity ?>VND
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <h3>Tổng đơn:
                        <?= $this->e($order->total) ?>VND
                    </h3>
                </div>
                <hr>
                <hr>
            <?php endforeach ?>


        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>