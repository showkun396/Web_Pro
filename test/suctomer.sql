CREATE TABLE customer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    lastname VARCHAR(50),
    age INT,
    username VARCHAR(20),
    password VARCHAR(20),
);

INSERT INTO customer (name, lastname, age, username, password)
VALUES ('Admin', 'Test', 25, 'admin', '1234');