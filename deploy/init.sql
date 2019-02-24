-- to run this file:
-- sudo mysql -p < path/to/this-file.sql

-- clear existing data
USE App;
DROP TABLE IF EXISTS User;
DROP DATABASE IF EXISTS App;

-- create new database and tables
CREATE DATABASE IF NOT EXISTS App;

USE App;

CREATE TABLE IF NOT EXISTS User (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(25) NOT NULL UNIQUE,
  password varchar(255),
  PRIMARY KEY(id)
);
