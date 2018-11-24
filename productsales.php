<?php

//require db
require_once('database/db.php');

$prodName = [];

//get data
$productsales = mysqli_query($conn, "SELECT p.id as id, p.name as name, ct.name as category, SUM(p.stock) as instock, SUM(ps.quantity) as sold, p.price as unitprice,
                                    c.name as cfirstName, c.surname as csurName, ps.created_at as buydate FROM products_sale as ps JOIN products as p
                                    ON p.id = ps.prod_id JOIN customers as c ON c.id = ps.cust_id JOIN categories as ct ON p.category_id = ct.id
                                    GROUP BY ps.prod_id ORDER BY sold DESC");

if(mysqli_num_rows($productsales) > 0)
{
  while($product_data = mysqli_fetch_assoc($productsales))
  {
      $prodId [] = $product_data['id'];
      $prodName [] = ucwords($product_data['name']);
      $prodCategory [] = ucwords($product_data['category']);
      $prodStock [] = $product_data['instock'];
      $prodSold [] = $product_data['sold'];
      $prodUnitPrice [] = $product_data['unitprice'];
      $custFirstName [] = ucfirst($product_data['cfirstName']);
      $custSurname [] = ucfirst($product_data['csurName']);

      $prodBuyDate [] = date("d M Y h:i a", strtotime($product_data['buydate']));

  }

}
else
  echo "<h3>There is no data to be displayed</h3>";

//original price function - total stock x price
function originalTotal($old, $new, $price){
  $total = $old + $new;

  return $price * $total;
}

function inStockTotal($iStock, $price){
  return $iStock * $price;
}
function sTotal($sold, $price){
  return $sold * $price;
}

function profitOrLoss($old, $new){
  return $old - $new;
}
