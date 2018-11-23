<?php

//include register.php
include_once('../login.php');

$title = "Access Acccount";
//include layout
include_once('layout.php');

?>
<header id="login-header">
  <div class="dark-overlay">
    <div class="login-inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 d-none d-lg-block text-white">
            <h4 class="display-4">Log In. Log In. Just Log In.</h4>
            <p class="lead">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt quibusdam alias quia, repellat voluptatem ipsam tempora eum quidem dolor suscipit!
            </p>
            <div class="d-flex">
              <div class="align-content-start p-2">
                <i class="fa fa-check fa-2x"></i>
              </div>
              <div class="align-content-end p-2">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt tenetur libero in nihil quo eligendi.
                </p>
              </div>
            </div>

            <div class="d-flex">
              <div class="align-content-start p-2">
                <i class="fa fa-check fa-2x"></i>
              </div>
              <div class="align-content-end p-2">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt tenetur libero in nihil quo eligendi.
                </p>
              </div>
            </div>

            <div class="d-flex">
              <div class="align-content-start p-2">
                <i class="fa fa-check fa-2x"></i>
              </div>
              <div class="align-content-end p-2">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt tenetur libero in nihil quo eligendi.
                </p>
              </div>
            </div>

          </div>
          <div class="col-lg-4 p-2">
            <div class="card card-form bg-primary">
              <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" autocomplete="off">
                  <fieldset class="form-group">
                    <legend class="border-bottom py-2">Access Account</legend>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])):echo $_POST['email'];endif; ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <button class="btn btn-outline-light btn-block" type="submit" name="submit_login">Access Account</button>
                  </fieldset>
                  <div class="alert alert-<?php if($var):if($var == 1):echo 'success';else:echo 'danger';endif;endif;?>">
                    <small><?php echo $var == 1?"Registration Success. You will be redirected in 5 secs. Please Wait...":$var;?></small>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
