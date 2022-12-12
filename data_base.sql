CREATE DATABASE system;

USE system;

CREATE TABLE users(
    id_user int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    login varchar(250) NOT NULL UNIQUE,
    senha varchar(250) NOT NULL
);