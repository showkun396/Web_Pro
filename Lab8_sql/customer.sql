CREATE DATABASE mystore;
USE mystore;

CREATE TABLE customer (
    Customer_id INT(11) NULL AUTO_INCREMENT,
    Customer_Name VARCHAR(50),
    Customer_Lastname VARCHAR(100),
    Gender VARCHAR(5),
    Birthdate VARCHAR(10),
    Address VARCHAR(150),
    Province VARCHAR(50),
    Zipcode VARCHAR(5),
    Telephone VARCHAR(15),
    Customer_Description TEXT,
    username VARCHAR(50),
    password VARCHAR(250),
    PRIMARY KEY (Customer_id)
);