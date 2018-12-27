<?php

include_once("../addcustomer.php");

include_once("../editcustomer.php");

$title = isset($_GET['id'])?"Edit Customer":"Add Customer";
//include layout
include_once('layout.php');

?>


<style>
#customer-form-section .customer-form-inner{
  padding-top: 90px;
}
</style>
<section id="customer-form-section">
  <div class="customer-form-inner">
    <div class="row">
      <div class="col-md-5 offset-md-4">
        <div class="card card-form">
          <h4 class="display-4 text-center border-bottom py-2 my-3">
            <?php echo $title;?>
          </h4>
          <div class="card-body">
            <?php
              //sanitize some input
              $id = false;
              if(isset($_GET['id'])){
                $id = "?id=".htmlspecialchars($_GET['id']);
              }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']).$id;?>" method="post">
              <?php if(count($messages) > 0): ?>
                <ul class="text-danger">
                  <?php foreach($messages as $message): ?>
                    <li><?php echo $message;?></li>
                  <?php endforeach;?>
                </ul>
              <?php endif;?>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user-tag"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="customerName" id="customerNameId" placeholder="Name" value="<?php echo $name;?>">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-user-tag"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="customerSurName" id="customerSurNameId" placeholder="Surname" value="<?php echo $surname;?>">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-paper-plane"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="customerEmail" id="customerEmailId" placeholder="Email" value="<?php echo $email;?>">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </div>
                </div>
                <input type="text" class="form-control" name="customerdob" id="customerdobId" placeholder="Date of Birth" value="<?php echo $dateofbirth;?>">
              </div>

              <button class="btn btn-outline-primary btn-block" type="submit">
                <i class="fas fa-plus"></i> Save
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
