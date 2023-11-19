<?php

use App\Models\Product;

$this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
<style>
    .side-nav>li {
        padding: 0.5rem;
        border-bottom: 1px solid #c1a67b;
    }
</style>
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<div class="container bg-white mt-3 mb-5 rounded py-3">
    <?php if (count($carts) === 0): ?>
        <img src="./uploads/no_cart.png" alt="">
    <?php endif; ?>

    <?php if (count($carts) !== 0): ?>
        <?php $total = 0; ?>
        <div class="row">
            <div class="col-12">
            <h2 class="mt-3 text-center animate__animated animate__bounce">Your cart</h2>

                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name </th>
                            <th scope="col">Photo</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carts as $cart): ?>
                            <?php $product = Product::where("id", $cart->product_id)->first(); ?>
                            <?php if(isset($product)): ?>
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
                                    <?= $this->e($product->price) ?> VND
                                    
                                </td>
                                <td>
                                    <div class="input-group align-items-center">
                                        <span>Số lượng: </span>
                                        <span class="input-group-btn">
                                            <form action="/cart/minus" method="post">
                                            <input type="hidden" name="cartId" value="<?= $this->e($cart->id)?>">
                                            <button type="submit" class="btn btn-default btn-number" >
                                                <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus"></i></span>
                                            </button>
                                            </form>
                                            
                                        </span>
                                        
                                        <input style="flex: none; width: 4rem; text-align: center;" type="text" class="form-control input-number" value="<?= $this->e($cart->quantity) ?>" min="1" readonly >
                                        
                                        <span class="input-group-btn">
                                            <form action="/cart/plus" method="post">
                                            <input type="hidden" name="cartId" value="<?= $this->e($cart->id)?>">
                                            <button type="submit" class="btn btn-default btn-number" >
                                                <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus"></i></span>
                                            </button>
                                            </form>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <?= $this->e($product->price * $cart->quantity) ?>VND
                                    <?php $total +=  $product->price * $cart->quantity ?>
                                </td>

                                <td class="d-flex justify-content-center">
                                    <form class="form-inline ml-1" action="<?= '/cart/delete/' . $this->e($cart->id) ?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-table">
                                            <i alt="Delete" class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <h2 class="text-center" style="color: darkcyan;">Total: <?= $this->e($total) ?> VND</h2>
                <a href="/order/create" class="btn btn-xs btn-warning">
                <i alt="Edit" class="fa-solid fa-truck-fast"></i> Click to Order</a>

            </div>
        </div>

    <?php endif; ?>
</div>
<div id="delete-confirm" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Do you want to delete this?</div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        new DataTable('#table');
        $('button[name="delete-table"]').on('click', function (e) {
            e.preventDefault();
            const form = $(this).closest('form');
            const nameTd = $(this).closest('tr').find('td:first');
            if (nameTd.length > 0) {
                $('.modal-body').html(
                    `Do you want to delete "${nameTd.text()}"?`
                );
            }
            $('#delete-confirm')
                .modal({
                    backdrop: 'static',
                    keyboard: false
                })
                .one('click', '#delete', function () {
                    form.trigger('submit');
                });

        });
    });
</script>
<?php $this->stop() ?>