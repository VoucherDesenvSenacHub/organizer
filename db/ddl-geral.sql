-- Tabela: Bancos

CREATE TABLE bancos (
    banco_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    codigo VARCHAR(20) NOT NULL
);

-- Tabela: ONGs 

--  Tabela: Categorias de ONGs

CREATE TABLE categorias_ongs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    ong_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);

-- Tabela: Usuários

CREATE TABLE usuarios (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    data_nascimento DATE,
    foto_perfil VARCHAR(255),
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    senha VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('admin', 'ong', 'voluntario', 'empresa') NOT NULL,
    ativo BOOLEAN DEFAULT TRUE,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela : Empresas Parceiras 

CREATE TABLE empresas_parceiras (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cnpj VARCHAR(20) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    dt_cadastro DATE,
    status BOOLEAN DEFAULT TRUE
);

-- Tabela : Projetos
CREATE TABLE projetos (
    projeto_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    meta DECIMAL(10,2) NOT NULL,
    status ENUM('ativo', 'inativo', 'concluido', 'cancelado') NOT NULL DEFAULT 'ativo',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ong_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);

--  Tabela: Voluntários (N:N Usuários e Projetos)

CREATE TABLE voluntarios (
    usuario_id INT,
    projeto_id INT,
    PRIMARY KEY (usuario_id, projeto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id)
);

--  Tabela: Notícias

CREATE TABLE noticias (
    noticias_id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    subtitulo VARCHAR(100),
    texto TEXT NOT NULL,
    subtexto TEXT,
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ong_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);

-- Tabela: Arquivos (Projetos e Notícias)

CREATE TABLE arquivos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    foto TEXT NOT NULL,
    projeto_id INT,
    noticias_id INT,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id),
    FOREIGN KEY (noticias_id) REFERENCES noticias(noticias_id)
);

-- Tabela: Fotos de ONGs

CREATE TABLE fotos_ongs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    foto TEXT NOT NULL,
    ong_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);

-- Tabela: Fotos de Projetos

CREATE TABLE fotos_projetos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    foto TEXT NOT NULL,
    projeto_id INT,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id)
);

--  Tabela: Favoritos (ONGs favorited por usuários)

CREATE TABLE favoritos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ong_id INT,
    usuario_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

-- Tabela: Doações para ONGs

CREATE TABLE doacoes_ongs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    valor FLOAT NOT NULL,
    dt_doacao DATE NOT NULL,
    ong_id INT,
    doador_id INT,
    doacao_anonima BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id),
    FOREIGN KEY (doador_id) REFERENCES usuarios(usuario_id)
);
--  Tabela: Doações para Projetos

CREATE TABLE doacoes_projetos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    valor FLOAT NOT NULL,
    dt_doacao DATE NOT NULL,
    doador_id INT,
    projeto_id INT,
    FOREIGN KEY (doador_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id)
);
