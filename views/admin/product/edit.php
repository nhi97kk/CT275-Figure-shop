<?php $this->layout("layouts/defaultAdmin", ["title" => APPNAME]) ?>

<?php $this->start("pagee") ?>
<div class="container bg-white mt-3 mb-5 rounded py-3">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Product</h2>

    <div class="row">
        <div class="col-12">

            <form action="<?= '/dashboard/product/' . $this->e($product['id']) ?>" method="POST" class="col-md-6 offset-md-3" enctype="multipart/form-data">

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name of product</label>
                    <input type="text" name="name" class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255" id="name" placeholder="Enter name" value="<?= $this->e($product['name']) ?>" />

                    <?php if (isset($errors['name'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" class="form-control<?= isset($errors['desc']) ? ' is-invalid' : '' ?>" maxlen="255" id="desc" placeholder="Enter desc" value="<?= $this->e($product['desc']) ?>" />

                    <?php if (isset($errors['desc'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['desc']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control<?= isset($errors['price']) ? ' is-invalid' : '' ?>" maxlen="255" id="price" placeholder="Enter price" value="<?= $this->e($product['price']) ?>" />

                    <?php if (isset($errors['price'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['price']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control<?= isset($errors['quantity']) ? ' is-invalid' : '' ?>" maxlen="255" id="quantity" placeholder="Enter quantity" value="<?= $this->e($product['quantity']) ?>" />

                    <?php if (isset($errors['quantity'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['quantity']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <img class="img-thumbnail" style="width: 5rem;" class="photo" src="<?= '/uploads/' . html_escape($product['photo']) ?>" alt="photo">
                    <br>
                    <input type="file" name="photo" class="form-control<?= isset($errors['photo']) ? ' is-invalid' : '' ?>" maxlen="255" id="photo" placeholder="Enter photo" value="<?= $this->e($product['photo']) ?>" />
                    <input type="hidden" name="old-photo" value="<?= html_escape($product['photo']) ?>">

                    <?php if (isset($errors['photo'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['photo']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id"
                        class="form-control<?= isset($errors['category']) ? ' is-invalid' : '' ?>">
                        <option value="">Select category</option>
                        <?php $categorys = \App\Models\category::all();?>
                        <?php foreach ($categorys as $category): ?>
                            <option value="<?= $category->id ?>" <?= $this->e($product['category_id']) == $category->id ? 'selected' : '' ?>>
                                <?= $category->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['category'])): ?>
                        <span class="invalid-feedback">
                            <strong>
                            <?= $this->e($errors['category']) ?>
                            
                            </strong>
                        </span>
                    <?php endif; ?>
                </div>
                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update product</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>