CREATE DATABASE secure;

USE secure;

CREATE TABLE users 
(
    id int primary key auto_increment, 
    username varchar(255), 
    password varchar(255) 
);

-- insert a row into the users table for the administrator:
-- username = admin
-- password = pwd
INSERT INTO users (username, password) VALUES ('admin', '$2y$10$6EagpQz90eekX4cIlXjWdu/iCCo3jmSPrLmm9kJ/OVzbmwHaJZGzG');

