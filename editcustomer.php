<?php

//include db
require_once('database/db.php');

$name = $surname = $email = $dateofbirth = false;

//get id from url
if(isset($_GET['id'])){
  $id = sanitizer($_GET['id']);

  //delete operations
  $getdata = mysqli_query($conn, "SELECT * FROM customers WHERE id = '$id'") or trigger_error("Data not acquired from db");

  if(mysqli_num_rows($getdata) == 1){

    $collect = mysqli_fetch_assoc($getdata);

    $name = $collect['name'];
    $surname = $collect['surname'];
    $email = $collect['email'];
    $dateofbirth = $collect['date_of_birth'];
  }
  else{

    echo "<h3 style='color: red;'>User not found. Please input correct user id</h3>";

    //redirect
    header("refresh: 3;url = home.php");
  }

}


?>
