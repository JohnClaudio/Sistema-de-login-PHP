create database login_system;

use login_system;

create table usuario(
id_user int(11) auto_increment,
nome_user varchar (50) not null,
email_user varchar(70) unique not null,
senha varchar(80) not null,
primary key(id_user));