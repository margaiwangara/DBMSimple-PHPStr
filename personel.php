<?php

//include db
require_once('database/db.php');

//acquire data
//customers
$personel = mysqli_query($conn, "SELECT p.id as id, p.name as name, p.surname as surname, p.date_of_birth as dob, p.email as email,
                                 d.name as department, d.salary as salary FROM personel as p JOIN departments as d
                                 ON d.id = p.department_id ORDER BY p.created_at ASC, p.name ASC");
if(mysqli_num_rows($personel) > 0)
{
  //get data
  while($personel_data = mysqli_fetch_assoc($personel)){
    $p_name [] = ucfirst($personel_data['name']);
    $p_surname [] = ucfirst($personel_data['surname']);
    $p_email [] = $personel_data['email'];
    $p_salary [] = presetPrice($personel_data['salary']);
    $p_department [] = ucfirst($personel_data['department']);

    //format date
    $p_date_of_birth [] = date("d M Y", strtotime($personel_data['dob']));
  }

}
else
  echo "<h3>There is no data to be displayed</h3>";
