-- create database organizer;
use organizer;

create table cadnoticias (
	codnot int auto_increment,
	titulo varchar(150) not null,
	subtitulo varchar(150) not null,
	texto text not null,
	subtexto text not null,
	data timestamp default current_timestamp,
	primary key (codnot)
);