use organizer;

create table caddoador (
	coddoador int auto_increment,
	nome varchar(100) not null,
	telefone varchar(20) not null,
	cpf varchar(11) not null unique,
	data_nascimento date not null,
	email varchar(100) not null unique,
	senha varchar(100) not null,
	data timestamp default current_timestamp,
	primary key (coddoador)
)

select * from caddoador;