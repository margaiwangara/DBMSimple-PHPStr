<?php

//include db
require_once('database/db.php');

//write queries
//customers
// mysqli_query($conn, "INSERT INTO customers(name, surname, email, date_of_birth) VALUES('john', 'doe', 'jdoe@live.com', '12/10/1989')");
// mysqli_query($conn, "INSERT INTO customers(name, surname, email, date_of_birth) VALUES('jane', 'doe', 'jndoe@live.com', '12/9/1990')");
// mysqli_query($conn, "INSERT INTO customers(name, surname, email, date_of_birth) VALUES('margai', 'wangara', 'mwangara@wangaras.me', '12/9/1996')");
// mysqli_query($conn, "INSERT INTO customers(name, surname, email, date_of_birth) VALUES('hilla', 'muboka', 'hmuboka@wangaras.com', '12/10/1996')");
// mysqli_query($conn, "INSERT INTO customers(name, surname, email, date_of_birth) VALUES('mgaza', 'ong''amo', 'mgaza@live.com', '9/2/1995')");
//mysqli_query($conn, "INSERT INTO customers(name, surname, email, date_of_birth) VALUES('jack', 'aden', 'jack@busia.gov.ke', '12/8/1993')");

// //customer updates
// //mysqli_query($conn, "UPDATE customers SET date_of_birth = '1989/10/20' WHERE id = 7");
// mysqli_query($conn, "UPDATE customers SET date_of_birth = '1990/9/12' WHERE id = 2");
// mysqli_query($conn, "UPDATE customers SET date_of_birth = '1996/9/12' WHERE id = 3");
// mysqli_query($conn, "UPDATE customers SET date_of_birth = '2000/10/13' WHERE id = 4");
// mysqli_query($conn, "UPDATE customers SET date_of_birth = '2003/2/1' WHERE id = 5");
// mysqli_query($conn, "UPDATE customers SET date_of_birth = '2010/8/11' WHERE id = 6");
// mysqli_query($conn, "UPDATE customers SET date_of_birth = '1970/10/10' WHERE id = 8");


//personel
// mysqli_query($conn, "INSERT INTO personel(name, surname, email, date_of_birth) VALUES('ali', 'doe', 'alidoe@live.com', '12/10/1985')");
// mysqli_query($conn, "INSERT INTO personel(name, surname, email, date_of_birth) VALUES('lily', 'doe', 'lilydoe@live.com', '12/9/1986')");
// mysqli_query($conn, "INSERT INTO personel(name, surname, email, date_of_birth) VALUES('juma', 'wangara', 'jwangara@wangaras.me', '15/7/1966')");
// mysqli_query($conn, "INSERT INTO personel(name, surname, email, date_of_birth) VALUES('mark', 'mark', 'mark@sakarya.edu.tr', '7/10/1996')");
// mysqli_query($conn, "INSERT INTO personel(name, surname, email, date_of_birth) VALUES('sila', 'pektas', 'spektas@istanbul.edu.tr', '9/2/1995')");
// mysqli_query($conn, "INSERT INTO personel(name, surname, email, date_of_birth) VALUES('luke', 'oduor', 'luke@kenya.gov.ke', '12/8/1990')");

//personel updates
// mysqli_query($conn, "UPDATE personel SET date_of_birth = '1971/9/12' WHERE id = 1");
// mysqli_query($conn, "UPDATE personel SET date_of_birth = '1972/9/12' WHERE id = 2");
// mysqli_query($conn, "UPDATE personel SET date_of_birth = '2001/10/13' WHERE id = 3");
// mysqli_query($conn, "UPDATE personel SET date_of_birth = '2002/2/1' WHERE id = 4");
// mysqli_query($conn, "UPDATE personel SET date_of_birth = '2005/8/11' WHERE id = 5");
// mysqli_query($conn, "UPDATE personel SET date_of_birth = '1973/10/10' WHERE id = 6");

//products
// mysqli_query($conn, "INSERT INTO products(name, category, stock, price) VALUES('black and white shirt', 'giyim', '50', '100.00')");
// mysqli_query($conn, "INSERT INTO products(name, category, stock, price) VALUES('dark green khaki pants', 'giyim', '60', '200.50')");
// mysqli_query($conn, "INSERT INTO products(name, category, stock, price) VALUES('brown leather shoes', 'giyim', '70', '90.25')");
// mysqli_query($conn, "INSERT INTO products(name, category, stock, price) VALUES('sporting white reebok shoes', 'giyim', '90', '120.45')");
// mysqli_query($conn, "INSERT INTO products(name, category, stock, price) VALUES('custom made mug for programmers', 'mutfak', '100', '25.90')");
// mysqli_query($conn, "INSERT INTO products(name, category, stock, price) VALUES('samsung galaxy S6 phone', 'electronics', '20', '1850.95')");

//products_sales
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(4, 2, 5)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(4, 3, 2)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(4, 5, 2)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(5, 1, 5)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(5, 6, 1)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(2, 3, 2)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(7, 2, 5)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(3, 6, 1)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(8, 3, 2)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(7, 4, 5)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(6, 5, 2)");
// mysqli_query($conn, "INSERT INTO products_sale(cust_id, prod_id, quantity) VALUES(6, 2, 2)");

//departments
// if(mysqli_query($conn, "INSERT INTO departments(name, salary) VALUES('production', 20000), ('human resources', 15000), ('research and development', 30000), ('marketting', 10000), ('account and financing', 50000)"))
//   echo "Input successful";
// else
//   echo "Input failed";

//categories
//giyim(women(shoes, shirts, blouse, pants))
// if(mysqli_query($conn, "INSERT INTO categories(name) VALUES ('giyim'), ('mutfak'), ('elektronik'), ('spor')"))
//   echo "Input successful";
// else
//   echo "Input failed";

//user roles
// if(mysqli_query($conn, "INSERT INTO user_roles(name) VALUES ('user'), ('admin')"))
//   echo "Input successful";
// else
//   echo "Input failed";
?>
