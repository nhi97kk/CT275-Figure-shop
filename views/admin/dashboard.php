<?php $this->layout("layouts/defaultAdmin", ["title" => APPNAME]) ?>

<?php $this->start("pagee") ?>

<div class="container">
  <h2>Dashboard</h2>
  
  <div class="card-columns">
    <div class="card bg-primary">
      <div class="card-body text-center">
        <strong>User</strong>
        <p class="card-text"><?= $this->e($user) ?></p>
      </div>
    </div>
    <div class="card bg-warning">
      <div class="card-body text-center">
        <strong>Product</strong>
        <p class="card-text"><?= $this->e($product) ?></p>
      </div>
    </div>
    <div class="card bg-success">
      <div class="card-body text-center">
        <strong>Category</strong>
        <p class="card-text"><?= $this->e($category) ?></p>
      </div>
    </div>
    <div class="card bg-danger">
      <div class="card-body text-center">
        <strong>Order</strong>
        <p class="card-text"><?= $this->e($order) ?></p>
      </div>
    </div>  
    
    </div>
  </div>
</div>
<?php $this->stop() ?>