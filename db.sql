DROP DATABASE IF EXISTS uploader;

CREATE DATABASE uploader;

USE uploader;

CREATE TABLE production(id INT NOT NULL AUTO_INCREMENT,title VARCHAR(20) BINARY,author VARCHAR(20) BINARY,comment VARCHAR(200) BINARY,filename VARCHAR(20),PRIMARY KEY(id)) CHARACTER SET utf8;
CREATE TABLE event(id INT NOT NULL AUTO_INCREMENT,name VARCHAR(20),deadline DATETIME,PRIMARY KEY(id)) CHARACTER SET utf8;