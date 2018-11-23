<?php

//include db
require_once('database/db.php');

//acquire data
//customers
$personel = mysqli_query($conn, "SELECT * FROM personel ORDER BY created_at ASC, name ASC");
if(mysqli_num_rows($personel) > 0)
{
  //get data
  while($personel_data = mysqli_fetch_assoc($personel)){
    $p_name [] = ucfirst($personel_data['name']);
    $p_surname [] = ucfirst($personel_data['surname']);
    $p_email [] = $personel_data['email'];

    //format date
    $p_date_of_birth [] = date("d M Y", strtotime($personel_data['date_of_birth']));
  }

}
else
  echo "<h3>There is no data to be displayed</h3>";
