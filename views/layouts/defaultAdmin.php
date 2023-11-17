<?php $this->layout("layouts/default", ["title" => 'MyFigure']) ?>

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
<div class="d-flex">
    <div class="sidebar-nav">
        <ul class="side-nav color-gray" style="list-style-type: none;
    font-size: 1.1rem;
    background-color: #ccc;
    padding: 0;">
            <li class="nav-header" style="font-size: 1.5rem;
    background-color: black;
    color: white;">
                <span class="">Main Category</span>
            </li>
            <li>
                <a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

            </li>

            <li class="nav-header" style="font-size: 1.5rem;
    background-color: black;
    color: white;">
                <span class="">Appearance</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/category"><i class="fa-solid fa-book"></i> <span>Category</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/product"><i class="fa-brands fa-codepen"></i> <span>Product</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/order"><i class="fa-solid fa-truck-fast"></i> <span>Order</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/user"><i class="fa fa-users"></i> <span>User</span>
            </li>
            <li><a href="/dashboard/change-password"><i class="fa-solid fa-key"></i> <span> Change
                        Password</span></a>
            </li>


    </div>
    <!-- SECTION HEADING -->
    <?= $this->section("pagee") ?>

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