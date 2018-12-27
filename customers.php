<?php

//include db
require_once('database/db.php');

//acquire data
//customers
$customers = mysqli_query($conn, "SELECT * FROM customers ORDER BY created_at ASC, name ASC");
if(mysqli_num_rows($customers) > 0)
{
  //get data
  while($customer_data = mysqli_fetch_assoc($customers)){
    $name [] = ucfirst($customer_data['name']);
    $surname [] = ucfirst($customer_data['surname']);
    $email [] = $customer_data['email'];

    //format date
    $date_of_birth [] = date("d M Y", strtotime($customer_data['date_of_birth']));
    $id [] = $customer_data['id'];
  }

}
else
  echo "<h3>There is no data to be displayed</h3>";
