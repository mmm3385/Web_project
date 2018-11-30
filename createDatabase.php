<?php
$db = new PDO('mysql:host=localhost','root','root33');
$db->exec("create database if not exists Orders_med");
$db->exec("use Orders_med");
$db->exec("create table if not exists user_information (name varchar(30),mail varchar(30),phone varchar(30) primary key,address varchar(100))engine=innodb");
$db->exec("create table if not exists medicines (name varchar(30),type varchar(30),quantity varchar(30),phone varchar(30),foreign key(phone) references user_information (phone) on delete cascade on update cascade)engine=innodb; ");
$db->exec("create table if not exists owners (id int auto_increment not null primary key, user_name varchar(30),password varchar(30))");
$db->exec("insert into owners (user_name,password) values('mostafa',123),('ali',333),('mohamed',246); ");
//$db->exec("drop database Orders_med");
?>