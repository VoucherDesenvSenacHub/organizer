CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE
)


CREATE TABLE categorias_projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    projeto_id INT NOT NULL,
    id_categoria INT NOT NULL,
    FOREIGN KEY (projeto_id) REFERENCES projetos(projeto_id) ON DELETE CASCADE,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria) ON DELETE CASCADE,
    UNIQUE (projeto_id, id_categoria)
)
