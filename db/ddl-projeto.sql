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
);