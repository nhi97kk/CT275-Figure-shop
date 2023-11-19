<?php
use \App\Models\Product;
use \App\Models\Cart;
$this->layout("layouts/defaultAdmin", ["title" => APPNAME]) ?>

<?php $this->start("pagee") ?>
<div class="container bg-white mt-3 mb-5 rounded py-3">

    <?php $total = 0; ?>
    <div class="row">
        <div class="col-12">
            <h2 class="mt-3 text-center animate__animated animate__bounce">Orders</h2>
            
                <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order): ?>
                            <tr>
                                <td>
                                    <?= $this->e($order->name) ?>
                                </td>
                                <td>
                                    <?= $this->e($order->phone) ?>
                                </td>
                                <td>
                                    <?= $this->e($order->address) ?>
                                </td>
                                <td>
                                    <?= $this->e($order->total) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/dashboard/order/' . $this->e($order->id) ?>" class="btn btn-xs btn-warning">
                                        <i alt="view" class="fa fa-pencil"></i> View</a>
                                </td>
                            </tr>     
                    <?php endforeach ?>
                </tbody>
                </table>
            
        </div>
    </div>
</div>

<?php $this->stop() ?>
