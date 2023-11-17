<?php $this->layout("layouts/defaultAdmin", ["title" => APPNAME]) ?>

<?php $this->start("pagee") ?>
<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Category</h2>

    <div class="row">
        <div class="col-12">

            <form action="/dashboard/category" method="POST" class="col-md-6 offset-md-3">

                <!-- num -->
                <div class="form-group">
                    <label for="name">Name of category</label>
                    <input type="text" name="name" class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255" id="name" placeholder="Enter name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" />

                    <?php if (isset($errors['name'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="desc" name="desc" class="form-control<?= isset($errors['desc']) ? ' is-invalid' : '' ?>" maxlen="255" id="desc" placeholder="Enter description" value="<?= isset($old['desc']) ? $this->e($old['desc']) : '' ?>" />

                    <?php if (isset($errors['desc'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['desc']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>


                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Add category</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>