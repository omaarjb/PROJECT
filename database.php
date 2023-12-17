<?php

include "connection.php";

$connection = new Connection();
// $connection->createDatabase("myHotel");


$query = "
CREATE TABLE users_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    adress VARCHAR(50) NOT NULL,
    phonenum VARCHAR(50) NOT NULL,
    pincode int(10) NOT NULL,
    dob date NOT NULL,
    password VARCHAR(100) NOT NULL,
    datentime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
";

$query2 = " 
CREATE TABLE reservation(
    idReservation int PRIMARY KEY AUTO_INCREMENT,
    dataDebut date,
    dateFin date,
    idC int(6) unsigned NOT NULL,
    idR int(11) NOT NULL,
    FOREIGN KEY (idC) REFERENCES users_info(id),
    FOREIGN KEY (idR) REFERENCES rooms(id)  
);
";

$query3 = " 
CREATE TABLE category(
    idCategory int PRIMARY KEY AUTO_INCREMENT,
    price int(11) NOT NULL
);
";

$connection->selectDatabase("myHotel");
$connection->createTable($query3);
