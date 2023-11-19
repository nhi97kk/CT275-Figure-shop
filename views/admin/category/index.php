<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>


    <div class="container bg-white mt-3 mb-5 rounded py-3">
        <!-- SECTION HEADING -->
        <h2 class="mt-3 text-center animate__animated animate__bounce">Category</h2>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->

                <a href="/dashboard/category/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Category</a>

                <!-- Table Starts Here -->
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name of category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorys as $category): ?>
                            <tr>
                                <td>
                                    <?= $this->e($category->name) ?>
                                </td>
                                <td>
                                    <?= $this->e($category->desc) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/dashboard/category/edit/' . $this->e($category->id) ?>" class="btn btn-xs btn-warning">
                                        <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                    <form class="form-inline ml-1" action="<?= '/dashboard/category/delete/' . $this->e($category->id) ?>"
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