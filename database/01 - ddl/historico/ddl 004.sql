-- Guardar o ID da transação de doação
ALTER TABLE doacoes_projetos 
ADD COLUMN transacao_id VARCHAR(255) NOT NULL AFTER usuario_id;