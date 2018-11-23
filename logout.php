<?php

//session
session_start();

if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['EMAIL'])){
  session_destroy();

  //redirect to login
  header('refresh:3;url = templates/access.php');
  echo "Logout Success. Redirecting to login page in 3 secs. Please Wait...";
}else{
  echo "Session does not exist";
}

?>
