<?php

//include db
require_once('database/db.php');

//get id from url
if(isset($_GET['id'])){
  $id = sanitizer($_GET['id']);

  //delete operations
  $delete = mysqli_query($conn, "DELETE FROM customers WHERE id = '$id'") or trigger_error("Data not deleted from db");

  if($delete)
  {
    echo "<h3 style='color: green;'>Deletion Success. Redirecting...</h3><br>";

    header("Refresh: 3;url = templates/database.php");
  }
  else{

    echo "<h3 style='color: red;''>Deletion Not Successful. Redirecting...</h3><br>";

    header("Refresh: 3;url = templates/database.php");
  }
}


?>
