<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>


    <div class="container bg-white mt-3 mb-5 rounded py-3">
        <!-- SECTION HEADING -->
        <h2 class="mt-3 text-center animate__animated animate__bounce">User</h2>

        <div class="row">
            <div class="col-12">
                <!-- <a href="/dashboard/user/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New user</a> -->

                <!-- Table Starts Here -->
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">User name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <?= $this->e($user->username) ?>
                                </td>
                                <td>
                                    <?= $this->e($user->email) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <form class="form-inline ml-1" action="<?= '/dashboard/user/delete/' . $this->e($user->id) ?>"
                                        method="POST">
                                        <button disabled type="submit" class="btn btn-xs btn-danger" name="delete-table">
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