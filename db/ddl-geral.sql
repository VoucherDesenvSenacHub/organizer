-- /// TABELA ONG //

CREATE TABLE ongs (
    ong_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cnpj VARCHAR(20) UNIQUE NOT NULL,
    responsavel_id INT,
    telefone VARCHAR(20),
    email VARCHAR(100),
    cep VARCHAR(10),
    rua VARCHAR(100),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    banco_id VARCHAR(20),
    agencia VARCHAR(20),
    conta VARCHAR(20),
    tipo_conta ENUM('corrente', 'poupanca', 'salario') NOT NULL,
    descricao TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fk_responsavel INT,
    fk_banco INT,
    FOREIGN KEY (fk_responsavel) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (fk_banco) REFERENCES bancos(banco_id)
);

-- // TIPOS ONG //
CREATE TABLE tipo_ongs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);


-- // USUARIOS // 

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

-- // EMPRESAS PARCERIAS //

CREATE TABLE empresas_parceiras (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cnpj VARCHAR(20) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    dt_cadastro DATE,
    status BOOLEAN DEFAULT TRUE
);


-- // TABELA VOLUNTARIOS (Relacionamento N:N entre usuários e projetos) //
 
 CREATE TABLE voluntarios (
    usuario_id INT,
    projeto_id INT,
    PRIMARY KEY (usuario_id, projeto_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id)
);

-- // FOTOS ONGS //

CREATE TABLE fotos_ongs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    foto TEXT NOT NULL,
    ong_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);

-- // DOAÇÕES ONGS //

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

-- // DOACOES PROJETOS //

CREATE TABLE doacoes_projetos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    valor FLOAT NOT NULL,
    dt_doacao DATE NOT NULL,
    doador_id INT,
    projeto_id INT,
    FOREIGN KEY (doador_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id)
);

-- // FOTOS PROJETOS //

CREATE TABLE fotos_projetos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    foto TEXT NOT NULL,
    projeto_id INT,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id)
);


-- // ARQUIVOS // 

CREATE TABLE arquivos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    foto TEXT NOT NULL,
    projeto_id INT,
    noticias_id INT,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id),
    FOREIGN KEY (noticias_id) REFERENCES noticias(noticias_id)
);


-- // FAVORITOS // 

CREATE TABLE favoritos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ong_id INT,
    usuario_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);


-- // NOTICIAS //

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


-- // PROJETOS // 

CREATE TABLE projetos (
    projeto_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    meta DECIMAL(10, 2) NOT NULL,
    status ENUM('ativo', 'inativo', 'concluido', 'cancelado') NOT NULL DEFAULT 'ativo',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ong_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
);
