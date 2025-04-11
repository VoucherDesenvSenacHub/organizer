-- ORGANIZER
create database organizer;
use organizer;

create table cadprojeto (
	codproj int auto_increment,
	nome varchar(50) not null,
	resumo varchar(190) not null,
	sobre text not null,
	meta decimal(10,2) not null,
	primary key (codproj)
);

INSERT INTO cadprojeto (nome, resumo, sobre, meta) VALUES
('Projeto Esperança', 
'Arrecadação de alimentos para famílias em situação de vulnerabilidade social.', 
'O Projeto Esperança é uma iniciativa solidária que busca atender famílias carentes com a distribuição mensal de cestas básicas. Através de parcerias com mercados e voluntários, o projeto consegue arrecadar, montar e entregar os kits diretamente às residências dos beneficiados, garantindo que a ajuda chegue a quem realmente precisa.', 
5000.00),
('Educar para o Futuro', 
'Reforço escolar gratuito para crianças de 7 a 14 anos em comunidades carentes.', 
'O projeto oferece aulas de reforço escolar em matemática, português e ciências, além de atividades lúdicas e culturais. Com professores voluntários, visa diminuir a evasão escolar e melhorar o desempenho dos alunos. O foco é transformar o futuro dessas crianças por meio da educação de qualidade e da atenção individualizada.', 
8000.00),
('Saúde em Movimento', 
'Atendimento médico itinerante em regiões rurais e de difícil acesso.', 
'O projeto leva equipes médicas voluntárias até comunidades rurais isoladas, oferecendo serviços de atendimento clínico, vacinação, exames preventivos e orientações de saúde. A ação acontece mensalmente e busca garantir o acesso básico à saúde para populações que enfrentam barreiras geográficas e sociais.', 
12000.00),
('Conectando Vidas', 
'Doação de computadores e tablets para escolas públicas sem estrutura tecnológica.', 
'Conectando Vidas combate a exclusão digital promovendo a inclusão tecnológica em escolas públicas. Através da arrecadação de equipamentos novos ou usados e do apoio de empresas parceiras, o projeto monta laboratórios de informática, capacita professores e estimula o uso pedagógico da tecnologia em sala de aula.', 
15000.00),
('Verde Urbano', 
'Reflorestamento de áreas urbanas degradadas com participação comunitária.', 
'O Verde Urbano incentiva o plantio de árvores e a revitalização de espaços públicos abandonados em centros urbanos. Com a participação de moradores, escolas e ONGs, o projeto transforma terrenos ociosos em áreas verdes, promovendo o bem-estar, a biodiversidade e o engajamento social em prol do meio ambiente.', 
7000.00);


select * from cadprojeto;