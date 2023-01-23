create database usuario;

use usuario;

create table cadastroUsuario(
email varchar(255) not null primary key,
senha varchar(20) not null,
nome varchar(100) not null,
datanascimento date not null,
genero varchar(12) not null,
telefone char(11) not null,
plataforma varchar(20) not null,
apelido varchar(30) not null
);

create table perfil(
cod_perfil int not null primary key auto_increment,
foto_perfil mediumblob not null,
nome_arquivo varchar(150) not null,
descricao_perfil varchar(100) null,
email varchar(255) not null,
foreign key (email) references cadastroUsuario (email)
);

create table postagens(
cod_postagens int not null primary key auto_increment,
imagem_post mediumblob not null,
descricao varchar(255) null,
nome_arquivo varchar(150) not null,
email varchar(255) not null,
foreign key (email) references cadastroUsuario (email)
);