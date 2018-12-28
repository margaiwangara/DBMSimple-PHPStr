<?php
$name = $p_name = $prodName = [];
//include customers.php
include_once __DIR__.'/../customers.php';
//include personel.php
include_once __DIR__.'/../personel.php';
//include productsales.php
include_once __DIR__.'/../productsales.php';
//title
$title = "Summary";
//include layout
include_once('layout.php');
?>

<header id="database-header">
  <div class="dark-overlay">
    <div class="database-inner">
      <div class="container">
        <div class="row">
          <div class="col">
            <h4 class="display-4 text-center">Summary</h4>
            <p class="lead text-center">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi numquam cupiditate inventore atque eveniet adipisci saepe, aperiam ea sequi, voluptate culpa maxime nobis maiores quam.
            </p>

            <div class="card mt-2">
              <div class="card-body">
                <?php if(isset($_SESSION['EMAIL'])):?>
                <!--Tabs come here-->
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a href="#customers" class="nav-link active" data-toggle="pill">Customer Data</a>
                  </li>
                  <li class="nav-item">
                    <a href="#personel" class="nav-link" data-toggle="pill">Personel Data And Salary</a>
                  </li>
                  <li class="nav-item">
                    <a href="#most-sold-items" class="nav-link" data-toggle="pill">Most Sold Items</a>
                  </li>
                </ul>

                <!--TAb contents-->
                <div class="tab-content pt-3">
                  <div class="tab-pane container active" id="customers">
                    <div class="py-2 border-bottom mb-3">
                      <a href="customerform.php" class="btn btn-success">
                        <i class="fa fa-user-plus"></i> Add Customer
                      </a>
                    </div>
                    <?php if(count($name) > 0): ?>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <tr class="thead-light">
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Full Name</th>
                            <th></th>
                          </tr>
                          <?php foreach($name as $key=>$data): ?>
                            <tr>
                              <td><?php echo $data; ?></td>
                              <td><?php echo $surname[$key]; ?></td>
                              <td><?php echo $email[$key]; ?></td>
                              <td><?php echo $date_of_birth[$key]; ?></td>
                              <td class="text-capitalize"><?php echo $fullname[$key];?></td>
                              <td>
                                <a class="btn btn-danger" title="Delete Customer" href="../deletecustomer.php?id=<?php echo $id[$key];?>">
                                  <i class="fas fa-user-minus"></i>
                                </a>
                                <a class="btn btn-primary" title="Edit Customer" href="customerform.php?id=<?php echo $id[$key];?>">
                                  <i class="fa fa-user-edit"></i>
                                </a>
                              </td>
                            </tr>
                          <?php endforeach;?>
                        </table>
                      </div>
                    <?php else: ?>
                      <p class="lead">There are no customers available at the moment</p>
                    <?php endif;?>
                  </div>
                  <div class="tab-pane container fade" id="personel">
                    <?php if(count($p_name) > 0): ?>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <tr class="thead-light">
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Department</th>
                            <th>Salary</th>
                          </tr>
                          <?php foreach($p_name as $key=>$data): ?>
                            <tr>
                              <td><?php echo $data; ?></td>
                              <td><?php echo $p_surname[$key]; ?></td>
                              <td><?php echo $p_email[$key]; ?></td>
                              <td><?php echo $p_date_of_birth[$key]; ?></td>
                              <td><?php echo $p_department[$key]; ?></td>
                              <td><?php echo $p_salary[$key]; ?></td>
                            </tr>
                          <?php endforeach;?>
                        </table>
                      </div>
                    <?php else: ?>
                      <p class="lead">There is no personel data available at the moment</p>
                    <?php endif;?>
                  </div>
                  <div class="tab-pane container fade" id="most-sold-items">
                    <?php if(count($prodName) > 0): ?>
                      <div class="table-responsive">
                        <table class="table table-sm table-striped border">
                          <tr class="thead-light">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>In Stock</th>
                            <th>Sold</th>
                            <th>Unit Price($)</th>
                            <th>O.Total($)</th>
                            <th>N.Total($)</th>
                            <th>S.Total($)</th>
                            <th>Profit/Loss</th>
                          </tr>
                          <?php foreach($prodName as $key=>$data): ?>
                            <tr>
                              <td><?php echo $prodId[$key]; ?></td>
                              <td><?php echo $prodName[$key]; ?></td>
                              <td><?php echo $prodCategory[$key]; ?></td>
                              <td><?php echo $prodStock[$key]; ?></td>
                              <td><?php echo $prodSold[$key]; ?></td>
                              <td><?php echo presetPrice($prodUnitPrice[$key]); ?></td>
                              <td><?php echo presetPrice(originalTotal($prodStock[$key], $prodSold[$key], $prodUnitPrice[$key])); ?></td>
                              <td><?php echo presetPrice(inStockTotal($prodStock[$key], $prodUnitPrice[$key])); ?></td>
                              <td><?php echo presetPrice(sTotal($prodSold[$key], $prodUnitPrice[$key])); ?></td>
                              <td>
                                <?php
                                    $decider = originalTotal($prodStock[$key], $prodSold[$key], $prodUnitPrice[$key]) - sTotal($prodSold[$key], $prodUnitPrice[$key]);
                                    echo presetPrice($decider)." ";

                                    if($decider > 0)
                                      echo "<i class='fa fa-caret-up text-success'></i>";
                                    else
                                      echo "<i class='fa fa-caret-down text-danger'></i>";
                                ?>
                              </td>
                            </tr>
                          <?php endforeach;?>
                        </table>
                      </div>
                    <?php else: ?>
                      <p class="lead">There is no product data available at the moment</p>
                    <?php endif;?>
                  </div>
                </div>
                <?php else:?>
                  <div class="text-center p-3 text-info">
                    <i class="fa fa-info-circle fa-5x"></i>
                  </div>
                  <p class="h5 text-center">
                    You need to have an account to view this page contents.
                    <br>Already A Member? <a href="access.php">Access Account</a>. Not A Member? <a href="signup.php">Create Account</a>
                  </p>
                <?php endif;?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</header>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
