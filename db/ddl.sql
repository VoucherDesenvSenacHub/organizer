CREATE DATABASE organizer;
USE organizer;

-- TABELA DE USÚARIOS
CREATE TABLE usuarios (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
-- Informações pessoais
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    foto_perfil VARCHAR(255),
-- Contato e autenticação
    email VARCHAR(255) UNIQUE NOT null ,
    telefone VARCHAR(20),
    senha VARCHAR(255) NOT NULL,
-- Metadados do sistema
    tipo_usuario ENUM('DOADOR', 'ONG', 'ADM') NOT NULL DEFAULT 'DOADOR',
    ativo BOOLEAN DEFAULT TRUE,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
    email VARCHAR(255) NOT NULL UNIQUE,
-- Endereço
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(200) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
-- Dados bancários
    banco_id INT NOT NULL, (VARCHAR)
    agencia VARCHAR(10) NOT NULL,
    conta VARCHAR(20) NOT NULL,
    tipo_conta ENUM('CORRENTE', 'POUPANÇA') NOT NULL DEFAULT 'CORRENTE',
-- Outros dados
    descricao TEXT NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- Relacionamentos
    CONSTRAINT fk_responsavel FOREIGN KEY (responsavel_id) REFERENCES usuarios(usuario_id),
    CONSTRAINT fk_banco FOREIGN KEY (banco_id) REFERENCES bancos(banco_id)
); 


-- TABELA DE PROJETOS
CREATE TABLE projetos (
    projeto_id INT PRIMARY KEY AUTO_INCREMENT,
-- Informações principais do projeto
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    meta DECIMAL(10, 2) NOT NULL,
-- Status e controle
    status ENUM('ATIVO', 'INATIVO', 'FINALIZADO') NOT NULL DEFAULT 'ATIVO',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- Relacionamento
    ong_id INT NOT NULL,
    CONSTRAINT fk_projeto_ong FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);''