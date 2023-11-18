<?php

use App\Models\Product;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="container">

    <?php $total = 0; ?>
    <div class="row">
        <div class="col-12">
            <h2 class="mt-3 text-center animate__animated animate__bounce">Assign information for order</h2>

            <form action="/order" method="POST" class="col-md-6 offset-md-3">

                <div class="form-group">
                    <label for="name">Full name:</label>
                    <input type="text" name="name"
                        class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255" id="name"
                        placeholder="Enter Name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" />

                    <?php if (isset($errors['name'])): ?>
                        <span class="invalid-feedback">
                            <strong>
                                <?= $this->e($errors['name']) ?>
                            </strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone"
                        class="form-control<?= isset($errors['phone']) ? ' is-invalid' : '' ?>" maxlen="255" id="phone"
                        placeholder="Enter Phone" value="<?= isset($old['phone']) ? $this->e($old['phone']) : '' ?>" />

                    <?php if (isset($errors['phone'])): ?>
                        <span class="invalid-feedback">
                            <strong>
                                <?= $this->e($errors['phone']) ?>
                            </strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="address">Address: </label>
                    <input type="text" name="address"
                        class="form-control<?= isset($errors['address']) ? ' is-invalid' : '' ?>" maxlen="255"
                        id="address" placeholder="Enter address"
                        value="<?= isset($old['address']) ? $this->e($old['address']) : '' ?>" />

                    <?php if (isset($errors['address'])): ?>
                        <span class="invalid-feedback">
                            <strong>
                                <?= $this->e($errors['address']) ?>
                            </strong>
                        </span>
                    <?php endif ?>
                </div>
                
                <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col"> </th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
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
            <input type="hidden" value="<?= $this->e($total) ?>" name="total">
            <h2 class="text-center">Total:
                <?= $this->e($total) ?> VND
            </h2>
                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Confirm to Order</button>
            </form>
        </div>
    </div>
</div>

<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>

<?php $this->stop() ?>