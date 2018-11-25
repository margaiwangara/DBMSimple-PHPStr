<?php
//define variables
$username = 'root';
$password = '';
$host = 'localhost';
$dbName = 'DBMSimple';

//connection establish
$conn = mysqli_connect($host, $username, $password, $dbName);

//global connection
$GLOBALS['CONN'] = $conn;

if(!$conn)
  echo "<h3 style='red: green;'>Connection Failed</h3>";

//SQL Injection and invalid data input prevention
function sanitizer($data){
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  $data = trim($data);
  $data = mysqli_real_escape_string($GLOBALS['CONN'], $data);

  return $data;
}

function presetPrice($data){
  return '$'.number_format($data, 2,".","");
}
