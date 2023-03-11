drop database if exists dbfinal;
create database dbfinal;
use dbfinal;

create table usuario(
	id_usuario INT NOT NULL AUTO_INCREMENT, 
    nome varchar(100) not null,
    email varchar(100) not null unique,
    senha varchar(32) not null,
	primary key(id_usuario)
);

create table filme(
	id_filme int not null auto_increment,
    id_usuario int not null,
    titulo varchar(100) not null,
    diretor varchar(100) not null,
    ano int not null,
    foreign key (id_usuario) references usuario(id_usuario),
    primary key(id_filme)
);

SELECT * FROM usuario;