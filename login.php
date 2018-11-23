<?php

//require db
require_once('database/db.php');
//error var initialize
$var = FALSE;

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $email = sanitizer($_POST['email']);
  $password = sanitizer($_POST['password']);

  if(empty($email) || empty($password))
    $var = "All fields are <strong>required</strong>";

  //input data into db
  if(!$var){
    //check if email exists
    $em = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    //if email exists
    if(mysqli_num_rows($em) == 1){
      //check to see if password checks out
      $login_data = mysqli_fetch_assoc($em);

      //check pass
      if(password_verify($password, $login_data['password'])){
        $var = 1;
      }
      else{
        $var = "Invalid email or password. Please try again";
      }
    }else{
      $var = "Please <a href='signup.php'>Create Account</a> before trying to access";
    }


  }

}



?>
