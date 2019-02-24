-- sudo mysql -p < init.sql

USE App;
DROP TABLE IF EXISTS User;
DROP DATABASE IF EXISTS App;

CREATE DATABASE
IF NOT EXISTS App;
USE App;

CREATE TABLE
IF NOT EXISTS User
(
  id int NOT NULL
  AUTO_INCREMENT,
    name varchar
(30) NOT NULL,
    password varchar
(30),
    PRIMARY KEY
(id)
);