-- create database organizer;
use organizer;

create table cadprojeto (
	codproj int auto_increment,
	nome varchar(50) not null,
	resumo varchar(190) not null,
	sobre text not null,
	meta decimal(10, 2) not null,
	data timestamp default current_timestamp,
	primary key (codproj)
);