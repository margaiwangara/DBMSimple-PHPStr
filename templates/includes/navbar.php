<div class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
  <div class="container">
    <div class="navbar-brand">DBMSimple</div>
    <!--collapse toggle-->
    <button class="navbar-toggler" data-target="#navbarToggle" data-toggle="collapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggle">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="home.php" class="nav-link" title="Home"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a href="database.php" class="nav-link" title="View Data"><i class="fa fa-database"></i> Summary</a>
        </li>
        <li class="nav-item">
          <a href="sqlops.php" class="nav-link" title="Sql Operations">
            <i class="fa fa-database"></i> SQL
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php if(isset($_SESSION['EMAIL'])):?>
          <li class="nav-item">
            <a href="#" class="nav-link btn btn-outline-link">
              <i class="fas fa-user-tie"></i>
              Hello, <?php echo $_SESSION['EMAIL'];?>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $file_path.'../logout.php';?>" class="nav-link"><i class="fa fa-sign-out-alt"></i> Log Out</a>
          </li>
        <?php else:?>
          <li class="nav-item">
            <a href="signup.php" class="nav-link"><i class="fa fa-user-plus"></i> Sign Up</a>
          </li>
          <li class="nav-item">
            <a href="access.php" class="nav-link"><i class="fa fa-sign-in-alt"></i> Login</a>
          </li>
      <?php endif;?>
      </ul>
    </div>
  </div>
</div>
