# Order Management

This has been written in PHP 7.3 and using MySQL 5.7 as the database.

Using Semantic UI because it's easy to use and looks quite nice. I can also make use of the javascript api when I implement the search bar.

Add your database credentials to the array in `core/init.php`;

First of all create the Schema and tables to be used: 

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
