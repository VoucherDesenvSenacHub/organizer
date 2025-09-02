
--  Tabela: Categorias de ONGs

CREATE TABLE categorias_ongs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    ong_id INT,
    FOREIGN KEY (ong_id) REFERENCES ongs(ong_id)
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

-- Tabela: Arquivos (Projetos e Notícias)

-- Tabela: Doações para ONG



