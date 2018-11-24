<?php

//require db file
require_once('database/db.php');

//create table and call it
$customer_query = "CREATE TABLE IF NOT EXISTS customers(
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  date_of_birth TIMESTAMP NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
)";

//create table and call it
$personel_query = "CREATE TABLE IF NOT EXISTS personel(
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  date_of_birth TIMESTAMP NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
)";

//create table and call it
$products_query = "CREATE TABLE IF NOT EXISTS products(
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  name VARCHAR(100) NOT NULL,
  category VARCHAR(50) NOT NULL,
  stock INT NOT NULL,
  price DECIMAL(8, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
)";

//products sale table
$products_sale = "CREATE TABLE IF NOT EXISTS products_sale(
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  cust_id INT NOT NULL,
  prod_id INT NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(8, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
)";

//users table
$users = "CREATE TABLE IF NOT EXISTS users(
  id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
)";

//user roles table
$roles = "CREATE TABLE IF NOT EXISTS user_roles(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(20) NOT NULL
)";

//product categories table
$categories = "CREATE TABLE IF NOT EXISTS categories(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL
)";

//personal departments table
$departments = "CREATE TABLE IF NOT EXISTS department(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(100) NOT NULL,
    salary DECIMAL(8,2) NOT NULL
)";
//update db
// if(mysqli_query($conn, "ALTER TABLE customers DROP COLUMN date_of_birth")){
//   echo "Table Alteration Success";
//   if(mysqli_query($conn, "ALTER TABLE customers ADD COLUMN date_of_birth TIMESTAMP AFTER email"))
//     echo "Column created successfully";
//   else
//     echo "Column not created because".mysqli_error($conn);
//   }
// else
//   echo "Table Alteration Failed";
// if(mysqli_query($conn, $departments))
//   echo "<h3>Table Created Successfully</h3>";
// else
//   echo "<h3>Table not created</h3>".mysqli_error($conn);

// if(mysqli_query($conn, "RENAME TABLE department TO departments"))
//   echo "Table renamed";
// else
//   echo "Table rename fail";

// if(mysqli_query($conn, "ALTER TABLE personel ADD COLUMN department_id INT NOT NULL AFTER id"))
//   echo "<h4>Table alteration successful</h4>";
// else
//   echo "<h4>Table alteration failed</h4>";

//create a carbon copy of an existing table and copy data into it
// if(mysqli_query($conn, "CREATE TABLE IF NOT EXISTS productsCC SELECT * FROM products"))
//   echo "<h4>Backup table created</h4>";
// else
//   echo "<h4>Backup table not created</h4>";

//recopy data from backup int db
// if(mysqli_query($conn, "INSERT products SELECT * FROM productscc"))
//   echo "<h4>Table recopy success</h4>";
// else
//   echo "<h4>Table recopy failed because</h4>".mysqli_error($conn);


// ON DELETE CASCADE, SET NULL, UPDATE
// if(mysqli_query($conn, "ALTER TABLE products ADD CONSTRAINT FK_products_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE"))
//   echo "<h4>Table foreign key created successful</h4>";
// else
//   echo "<h4>Table foreign key creation failed</h4>";
?>
