-- Guardar a cor das categorias
ALTER TABLE categorias 
ADD COLUMN cor VARCHAR(10) NOT NULL AFTER nome;