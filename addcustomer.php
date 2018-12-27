<?php

//include db
require_once('database/db.php');

$messages = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $name = sanitizer($_POST['customerName']);
  $surname = sanitizer($_POST['customerSurName']);
  $email = sanitizer($_POST['customerEmail']);
  $dob = sanitizer($_POST['customerdob']);

  //check for nulls
  if(empty($name))
  {
    array_push($messages, "The Name field is required");
  }

  if(empty($surname))
  {
    array_push($messages, "The Surname field is required");
  }

  if(empty($email))
  {
    array_push($messages, "The Email field is required");
  }

  if(empty($dob))
  {
    array_push($messages, "The Date of Birth field is required");
  }

  if(count($messages) == 0)
  {
    //check if user exists in db
    if(isset($_GET['id'])){
      $uid = sanitizer($_GET['id']);

      $update = mysqli_query($conn, "UPDATE customers SET name = '$name', surname = '$surname', email = '$email', date_of_birth='$dob' WHERE id = '$uid'") or trigger_error("Data not updated");

      if($update)
      {
        //redirect to customer display page
        header("Location: database.php");
      }
      else
      {
        array_push($messages, "Update of data not successful");
      }
    }
    else
    {
      //add to db
      $add_data = mysqli_query($conn, "INSERT INTO customers(name, surname, email, date_of_birth) VALUES('$name', '$surname', '$email', '$dob')") or trigger_error("Data not input into db");
      if($add_data)
      {
        //redirect to customer display page
        header("Location: database.php");
      }
      else
      {
        array_push($messages, "Data input into db failed");
      }
    }

  }
}



?>
