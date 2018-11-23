<?php

$name = $p_name = [];

//include customers.php
include_once __DIR__.'/../customers.php';
//include personel.php
include_once __DIR__.'/../personel.php';
//title
$title = "Database";

//include layout
include_once('layout.php');

?>

<header id="database-header">
  <div class="dark-overlay">
    <div class="database-inner">
      <div class="container">
        <div class="row">
          <div class="col">
            <h4 class="display-4 text-center">Database</h4>
            <p class="lead text-center">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi numquam cupiditate inventore atque eveniet adipisci saepe, aperiam ea sequi, voluptate culpa maxime nobis maiores quam.
            </p>

            <div class="card mt-2">
              <div class="card-body">
                <!--Tabs come here-->
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a href="#customers" class="nav-link active" data-toggle="pill">Customer Data</a>
                  </li>
                  <li class="nav-item">
                    <a href="#personel" class="nav-link" data-toggle="pill">Personal Data And Salary</a>
                  </li>
                  <li class="nav-item">
                    <a href="#most-sold-items" class="nav-link" data-toggle="pill">Most Sold Items</a>
                  </li>
                </ul>

                <!--TAb contents-->
                <div class="tab-content pt-3">
                  <div class="tab-pane container active" id="customers">
                    <?php if(count($name) > 0): ?>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <tr class="thead-light">
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                          </tr>
                          <?php foreach($name as $key=>$data): ?>
                            <tr>
                              <td><?php echo $data; ?></td>
                              <td><?php echo $surname[$key]; ?></td>
                              <td><?php echo $email[$key]; ?></td>
                              <td><?php echo $date_of_birth[$key]; ?></td>
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
                          </tr>
                          <?php foreach($p_name as $key=>$data): ?>
                            <tr>
                              <td><?php echo $data; ?></td>
                              <td><?php echo $p_surname[$key]; ?></td>
                              <td><?php echo $p_email[$key]; ?></td>
                              <td><?php echo $p_date_of_birth[$key]; ?></td>
                            </tr>
                          <?php endforeach;?>
                        </table>
                      </div>
                    <?php else: ?>
                      <p class="lead">There are personel data available at the moment</p>
                    <?php endif;?>
                  </div>
                  <div class="tab-pane container fade" id="most-sold-items">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, excepturi eligendi, hic eaque quo aliquid odio nostrum dolor dignissimos voluptatibus, accusamus quas ea tempora eum.
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</header>
