<?php

include 'route.php';
include 'classes/contact.php';

//add routes
$route = new Route();

$route->add('/', function(){
    require_once('templates/home.php');
});
$route->add('/summary', function(){
  require_once('templates/database.php');
});
$route->add('/login', function(){
  require_once('templates/access.php');
});

$route->add('/register', function(){
  require_once('templates/signup.php');
});

$route->add('/logout', function(){
  require_once('logout.php');
});


//submit
$route->submit();
