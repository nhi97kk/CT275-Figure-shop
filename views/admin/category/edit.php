<?php $this->layout("layouts/defaultAdmin", ["title" => APPNAME]) ?>

<?php $this->start("pagee") ?>
<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Category</h2>

    <div class="row">
        <div class="col-12">

            <form action="<?= '/dashboard/category/' . $this->e($category['id']) ?>" method="POST" class="col-md-6 offset-md-3">

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name of category</label>
                    <input type="text" name="name" class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255" id="name" placeholder="Enter name" value="<?= $this->e($category['name']) ?>" />

                    <?php if (isset($errors['name'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" class="form-control<?= isset($errors['desc']) ? ' is-invalid' : '' ?>" maxlen="255" id="desc" placeholder="Enter desc" value="<?= $this->e($category['desc']) ?>" />

                    <?php if (isset($errors['desc'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['desc']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>


                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update category</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>