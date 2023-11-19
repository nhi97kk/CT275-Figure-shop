<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>


    <div class="container bg-white mt-3 mb-5 rounded py-3">
        <!-- SECTION HEADING -->
        <h2 class="mt-3 text-center animate__animated animate__bounce">Product</h2>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->

                <a href="/dashboard/product/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New product</a>

                <!-- Table Starts Here -->
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name </th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <?= $this->e($product->name) ?>
                                </td>
                                <td>
                                <?= $this->e($product->desc) ?>
                                </td>
                                <td>
                                    <?= $this->e($product->price) ?>
                                </td>
                                <td>
                                    <?= $this->e($product->quantity) ?>
                                </td>
                                <td>
                                    <img class="img-thumbnail" style="width: 5rem;" class="photo" src="<?= '/uploads/' . html_escape($product['photo']) ?>" alt="photo">
                                </td>
                                <!-- <td> -->
                                <td>
                                    <?php $categoryP = \App\Models\Category::where('id',$product->category_id)->first(); ?>
                                    <?= isset($categoryP) ? $this->e($categoryP->name) : '' ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/dashboard/product/edit/' . $this->e($product->id) ?>" class="btn btn-xs btn-warning">
                                        <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                    <form class="form-inline ml-1" action="<?= '/dashboard/product/delete/' . $this->e($product->id) ?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-table">
                                            <i alt="Delete" class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Table Ends Here -->
            </div>
        </div>
    </div>

    <?php $this->stop() ?>