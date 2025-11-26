-- Adiciona colunas para motivo e data de finalização do projeto
ALTER TABLE projetos 
ADD COLUMN motivo_finalizado VARCHAR(255) NULL
AFTER status;

ALTER TABLE projetos 
ADD COLUMN data_finalizado TIMESTAMP NULL
AFTER motivo_finalizado;