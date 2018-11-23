<?php

//require db
require_once('database/db.php');
//error var initialize
$var = FALSE;
$roles = [];

//get roles
$rdata = mysqli_query($conn, "SELECT * FROM user_roles ORDER BY id ASC");
if(mysqli_num_rows($rdata) > 0){
  while($datacol = mysqli_fetch_assoc($rdata)){
    $role_id [] = $datacol['id'];
    $roles [] = $datacol['name'];
  }

}


if($_SERVER['REQUEST_METHOD'] == "POST"){
  $email = sanitizer($_POST['email']);
  $password = sanitizer($_POST['password']);
  $confirm_password = sanitizer($_POST['confirm_password']);

  if(!empty($email) && !empty($password) && !empty($confirm_password) && isset($_POST['user_roles'])){
    $user_role = sanitizer($_POST['user_roles']);
    if($password == $confirm_password)
      //encrypt password
      $pass_encr = password_hash($password, PASSWORD_DEFAULT);
    else
      $var = "Passwords do not match";
  }else
      $var = "All fields are <strong>required</strong>";

  //input data into db
  if(!$var){
    //check if email exists
    $em = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_num_rows($em) == 1){
      $var = "Email already exists. Please try again";
    }else{
      $query = mysqli_query($conn, "INSERT INTO users(email, password, role) VALUES('$email', '$pass_encr', '$user_role')");
      if($query)
        $var = 1;
      else
        $var = "Registration failed";
    }


  }

}



?>
