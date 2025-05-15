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


create table cadusu (
	codusu primary key int auto_increment,
	nome varchar(100) not null,
	cpf varchar(11) not null unique,
	telefone varchar(20) not null,
	email varchar(100) not null unique,
	senha varchar(100) not null,
	tipo varchar(100) not null
)


create table dados_ong (
	razao_social varchar(100) not null,
	cnpj varchar(14) not null unique,
	descricao varchar(100) not null,
	area_de_atuacao varchar(100) unique,
	endereço varchar(100) not null,
	banco int not null,
	codusu foreign key (cadusu) int not null,
)



