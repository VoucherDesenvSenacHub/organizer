-- Guardar uma descrição da empresa parceira
ALTER TABLE parcerias 
ADD COLUMN descricao VARCHAR(255) NULL AFTER telefone;