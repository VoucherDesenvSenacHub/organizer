CREATE DATABASE organizer;
USE organizer;

-- ================================
-- TABELA DOS USUÁRIOS
-- ================================
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
-- Tipos e status de usuário
    doador BOOLEAN DEFAULT TRUE,
    ong BOOLEAN DEFAULT FALSE,
    adm BOOLEAN DEFAULT FALSE,
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
-- Datas de controle
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ================================
-- TABELA DOS BANCOS
-- ================================
CREATE TABLE bancos (
    banco_id INT PRIMARY KEY AUTO_INCREMENT,
-- Identificação do banco
    nome VARCHAR(100) NOT NULL UNIQUE,
    codigo VARCHAR(10) NOT NULL UNIQUE
);

-- ================================
-- TABELA DAS ONGS
-- ================================
CREATE TABLE ongs (
    ong_id INT PRIMARY KEY AUTO_INCREMENT,
-- Identificação da ONG
    nome VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18) NOT NULL UNIQUE,
    responsavel_id INT NOT NULL UNIQUE,
-- Contato da ONG
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
-- Endereço da ONG
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(200) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
-- Dados bancários
    banco_id INT NOT NULL,
    agencia VARCHAR(10) NOT NULL,
    conta_numero VARCHAR(20) NOT NULL,
    tipo_conta ENUM('CORRENTE', 'POUPANÇA') NOT NULL DEFAULT 'CORRENTE',
-- Dados adicionais
    logo_url VARCHAR(255),
    descricao TEXT NOT NULL,
    status ENUM('ATIVO', 'INATIVO') NOT NULL DEFAULT 'ATIVO',
-- Datas de controle
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
-- Relacionamentos
    CONSTRAINT fk_responsavel FOREIGN KEY (responsavel_id) REFERENCES usuarios(usuario_id),
    CONSTRAINT fk_banco FOREIGN KEY (banco_id) REFERENCES bancos(banco_id)
);

-- ================================
-- TABELA DOS PROJETOS
-- ================================
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
-- Relacionamento com ONG
    ong_id INT NOT NULL,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id) ON DELETE CASCADE
);

-- ================================
-- TABELA DAS NOTÍCIAS
-- ================================
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
-- Relacionamento com ONG
    ong_id INT NOT NULL,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id) ON DELETE CASCADE
);

-- ================================
-- TABELA DE DOAÇÕES PARA O PROJETO
-- ================================
CREATE TABLE doacao_projeto (
    id INT PRIMARY KEY AUTO_INCREMENT,
-- Relacionamentos
    projeto_id INT NOT NULL,
    usuario_id INT NOT NULL,
-- Dados da doação
    valor DECIMAL(10, 2) NOT NULL,
    data_doacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- Chaves estrangeiras
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

-- ================================
-- TABELA DE FAVORITOS DE PROJETOS
-- ================================
CREATE TABLE favoritos_projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
-- Relacionamentos
    usuario_id INT NOT NULL,
    projeto_id INT NOT NULL,
-- Controle de data
    data_favoritado DATETIME DEFAULT CURRENT_TIMESTAMP,
-- Restrição de unicidade
    UNIQUE (usuario_id, projeto_id),
-- Chaves estrangeiras
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id) ON DELETE CASCADE,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id) ON DELETE CASCADE
);

-- ================================
-- TABELA DE FAVORITOS DE ONGS
-- ================================
CREATE TABLE favoritos_ongs (
    id INT AUTO_INCREMENT PRIMARY KEY,
-- Relacionamentos
    usuario_id INT NOT NULL,
    ong_id INT NOT NULL,
-- Controle de data
    data_favoritado DATETIME DEFAULT CURRENT_TIMESTAMP,
-- Restrição de unicidade
    UNIQUE (usuario_id, ong_id),
-- Chaves estrangeiras
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id) ON DELETE CASCADE,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id) ON DELETE CASCADE
);

-- ================================
-- TABELA DE IMAGENS DE PROJETOS
-- ================================
CREATE TABLE imagens_projeto (
    id INT AUTO_INCREMENT PRIMARY KEY,
-- Relacionamento com projeto
    projeto_id INT NOT NULL,
-- Imagem
    logo_url VARCHAR(255) NOT NULL,
-- Controle de data
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- Chave estrangeira
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ================================
-- TABELA DE IMAGENS DE NOTÍCIAS
-- ================================
CREATE TABLE imagens_noticia (
    id INT AUTO_INCREMENT PRIMARY KEY,
-- Relacionamento com notícia
    noticia_id INT NOT NULL,
-- Imagem
    logo_url VARCHAR(255) NOT NULL,
-- Controle de data
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
-- Chave estrangeira
    FOREIGN KEY (noticia_id) REFERENCES noticias(noticia_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- ================================
-- TABELA DE APOIOS A PROJETOS
-- ================================
CREATE TABLE apoios_projeto (
    id INT AUTO_INCREMENT PRIMARY KEY,
-- Relacionamentos
    usuario_id INT NOT NULL,
    projeto_id INT NOT NULL,
-- Controle de data
    data_apoio DATETIME DEFAULT CURRENT_TIMESTAMP,
-- Restrição de unicidade
    UNIQUE (usuario_id, projeto_id),
-- Chaves estrangeiras
    CONSTRAINT fk_apoio_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_apoio_projeto FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id) ON DELETE CASCADE ON UPDATE CASCADE
);