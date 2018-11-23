<?php

//include register.php
include_once('../register.php');

$title = "Become A Member";
//include layout
include_once('layout.php');

?>
<header id="signup-header">
  <div class="dark-overlay">
    <div class="signup-inner">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 d-none d-lg-block text-white">
            <h4 class="display-4">Sign Up. Sign Up. Just Sign Up.</h4>
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
            <div class="card card-form bg-light">
              <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" autocomplete="off">
                  <fieldset class="form-group">
                    <legend class="border-bottom py-2">Create Account</legend>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email" name="email" value="<?php if(isset($_POST['email'])):echo $_POST['email'];endif; ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                    </div>
                    <div class="form-group">
                      <?php if(count($roles) > 0):?>
                        <select name="user_roles" class="form-control">
                          <option disabled selected>Select a user role</option>
                          <?php foreach($roles as $key=>$role): ?>
                            <option value="<?php echo $role_id[$key];?>" <?php if(isset($_POST['user_roles']) && sanitizer($_POST['user_roles']) == $role_id[$key]):echo 'selected';endif;?>><?php echo $role; ?></option>
                          <?php endforeach;?>
                        </select>
                      <?php endif;?>
                    </div>
                    <button class="btn btn-outline-primary btn-block" type="submit" name="submit_register">Sign Up</button>
                  </fieldset>
                  <div class="alert alert-<?php if($var):if($var == 1):echo 'success';else:echo 'danger';endif;endif;?>">
                    <small><?php echo $var == 1?"Registration Success":$var;?></small>
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
