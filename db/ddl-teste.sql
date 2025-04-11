-- ORGANIZER
create database organizer;
use organizer;

create table cadprojeto (
	codproj int auto_increment,
	nome varchar(50) not null,
	resumo varchar(250) not null,
	sobre text not null,
	meta decimal(10,2) not null,
	primary key (codproj)
);

insert into cadprojeto (nome, descricao, meta) values 
('Projeto Água Limpa', 
 'Iniciativa para levar água potável a comunidades carentes por meio da construção de poços e sistemas de filtragem sustentável.', 
 75000.00),
('Educar para Transformar', 
 'Projeto focado na criação de centros educacionais em áreas rurais, oferecendo acesso à tecnologia e reforço escolar para crianças.', 
 125000.00),
('Saúde em Movimento', 
 'Criação de unidades móveis de atendimento médico e odontológico para regiões afastadas, promovendo saúde preventiva e básica.', 
 98000.00),
('Conexão Verde', 
 'Reflorestamento de áreas degradadas com envolvimento da comunidade local, educação ambiental e geração de emprego sustentável.', 
 185000.00);

select * from cadprojeto;