# Order Management

This has been written in PHP 7.3 and using MySQL 5.7 as the database.

Using Semantic UI because it's easy to use and looks quite nice. I can also make use of the javascript api when I implement the search bar.

Add your database credentials to the array in `core/init.php`;

You can either create the schema and import Products and Clients I used in testing from the `orderManagement.sql` file. Or use the queries below to create the schema and tables and start fresh. 

`CREATE SCHEMA 'order_management';`

Clients Table:
`CREATE TABLE 'order_management'.'clients' (
  'clients_id' INT NOT NULL AUTO_INCREMENT,
  'client_name' VARCHAR(50),
  'first_name' VARCHAR(50) NOT NULL,
  'last_name' VARCHAR(50) NOT NULL,
  PRIMARY KEY ('clients_id'));`

Orders table: 
`CREATE TABLE 'order_management'.'orders' (
  'orders_id' INT NOT NULL AUTO_INCREMENT,
  'status' VARCHAR(45) NOT NULL,
  'payment_method' VARCHAR(45) NOT NULL,
  'date_time' DATETIME NOT NULL,
  'description' VARCHAR(250) NULL,
  PRIMARY KEY ('orders_id'));`

Products table: 
`CREATE TABLE 'order_management'.'products' (
  'products_id' INT NOT NULL AUTO_INCREMENT,
  'product_name' VARCHAR(100) NOT NULL,
  'description' VARCHAR(250) NOT NULL,
  PRIMARY KEY ('products_id'));`
  
Products to order table:
`CREATE TABLE 'order_management'.'products_to_order' (
  'products_to_order_id' INT NOT NULL AUTO_INCREMENT,
  'orders_id' INT NOT NULL,
  'clients_id' INT NOT NULL,
  'products_id' INT NOT NULL,
  'price' VARCHAR(45) NOT NULL,
  'postage' VARCHAR(45) NOT NULL,
  'despatch_date' DATETIME NOT NULL,
  PRIMARY KEY ('products_to_order_id'));`


Routes: <br>
index.php                  => Home page. <br>
orders.php                 => Orders Page. <br>
create-order.php           => Create Order Page (simply adds row to orders table). <br>
delete-order.php?id=?      => Delete the order associated with the ID passed in the URL. <br>
products.php               => Displays all products (pagination needs adding). <br>
create-product.php         => Creates product. <br>
delete-product.php?id=?    => Deletes the product associated with the ID passed in the URL. <br>
clients.php                => List of all available Clients. <br>
create-client.php          => Create a client. <br>
view-client.php?id=?       => Displays information for client associated with the ID passed in the URL. <br>
view-order.php?id=?        => Displays all orders for the Client with the ID passed from the URL. <br>
products-to-order.php?id=? => Adds record to products_to_order table for the client's id passed through the URL (doesn't work correctly yet. <br>
update-order.php?id=?      => Updates the order associated with the id passed through the URL (not working yet). <br>
