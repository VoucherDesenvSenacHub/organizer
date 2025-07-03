CREATE DATABASE organizer;
USE organizer;

-- TABELA DOS USÚARIOS
CREATE TABLE usuarios (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
-- Informações pessoais
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    foto_perfil VARCHAR(255),
-- Contato e autenticação
    email VARCHAR(255) UNIQUE NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    senha VARCHAR(255) NOT NULL,
-- Outros dados
    doador BOOLEAN DEFAULT TRUE,
    ong BOOLEAN DEFAULT FALSE,
    adm BOOLEAN DEFAULT FALSE,
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- TABELA DAS AGÊNCIAS BANCARIAS
CREATE TABLE bancos (
    banco_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE,
    codigo VARCHAR(10) NOT NULL UNIQUE
);


-- TABELA DAS ONGS
CREATE TABLE ongs (
-- Identificação da ONG
    ong_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18) NOT NULL UNIQUE,
    responsavel_id INT NOT NULL,
-- Contato
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
-- Endereço
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(200) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
-- Dados bancários
    banco_id INT NOT NULL, (VARCHAR)
    agencia VARCHAR(10) NOT NULL,
    conta_numero VARCHAR(20) NOT NULL,
    tipo_conta ENUM('CORRENTE', 'POUPANÇA') NOT NULL DEFAULT 'CORRENTE',
-- Outros dados
    logo_url VARCHAR(255),
    descricao TEXT NOT NULL,
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
-- Relacionamentos
    CONSTRAINT fk_responsavel FOREIGN KEY (responsavel_id) REFERENCES usuarios(usuario_id),
    CONSTRAINT fk_banco FOREIGN KEY (banco_id) REFERENCES bancos(banco_id)
); 


-- TABELA DOS PROJETOS
CREATE TABLE projetos (
    projeto_id INT PRIMARY KEY AUTO_INCREMENT,
-- Informações principais do projeto
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    meta DECIMAL(10, 2) NOT NULL,
-- Status e controle
    status ENUM('ATIVO', 'INATIVO', 'FINALIZADO') NOT NULL DEFAULT 'ATIVO',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
-- Relacionamento
    ong_id INT NOT NULL,
    CONSTRAINT fk_projeto_ong FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);


-- TABELA DAS NOTÍCIAS
CREATE TABLE noticias (
    noticia_id INT PRIMARY KEY AUTO_INCREMENT,
-- Títulos da notícia
    titulo VARCHAR(90) NOT NULL,
    subtitulo VARCHAR(90) NOT NULL,
-- Textos da notícia
    texto TEXT NOT NULL,
    subtexto TEXT NOT NULL,
-- Status e controle
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
-- Relacionamento
    ong_id INT NOT NULL,
    CONSTRAINT fk_noticia_ong FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);


-- TABELA DE DOAÇÕES PARA O PROJETO
CREATE TABLE doacao_projeto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    projeto_id INT NOT NULL,
    usuario_id INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data_doacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

-- SISTEMA DE FAVORITAR UM PROJETO
CREATE TABLE favoritos_projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    projeto_id INT NOT NULL,
    data_favoritado DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (usuario_id, projeto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id) ON DELETE CASCADE,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id) ON DELETE CASCADE
);

-- SISTEMA DE FAVORITAR UMA ONG
CREATE TABLE favoritos_ongs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    ong_id INT NOT NULL,
    data_favoritado DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (usuario_id, ong_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id) ON DELETE CASCADE,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id) ON DELETE CASCADE
);