<?php

$title = "Home";
//include layout
include_once('layout.php');

?>

<header class="home-header">
  <div class="header-inner">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row">
          <div class="col text-center pt-3">
            <h4 class="display-4">Welcome To DBMSimple Homepage</h4>
            <p class="lead">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto nam sunt, minima et est maiores, quasi mollitia doloremque doloribus ipsa non aliquid? Harum temporibus unde repudiandae fugiat voluptas, ducimus maxime!
            </p>
            <a href="database.php" class="btn btn-success btn-lg">
              <i class="fa fa-database"></i> View Data</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</header>

<section id="data-display">
  <div class="data-display-inner p-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="../static/images/bg-image-2.jpg" alt="about-us-image" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
          <h4>About DBMSimple</h4>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet asperiores, iusto quia iste accusamus cum, mollitia possimus optio esse, odio voluptatibus nemo earum, qui corporis!
          <div class="d-flex">
            <div class="align-content-start p-2">
              <i class="fa fa-check fa-2x"></i>
            </div>
            <div class="align-content-end p-2">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur incidunt, porro sapiente eaque, eligendi quis?
                </p>
            </div>
          </div>
          <div class="d-flex">
            <div class="align-content-start p-2">
              <i class="fa fa-check fa-2x"></i>
            </div>
            <div class="align-content-end p-2">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur incidunt, porro sapiente eaque, eligendi quis?
                </p>
            </div>
          </div>
          <div class="d-flex">
            <div class="align-content-start p-2">
              <i class="fa fa-check fa-2x"></i>
            </div>
            <div class="align-content-end p-2">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur incidunt, porro sapiente eaque, eligendi quis?
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
