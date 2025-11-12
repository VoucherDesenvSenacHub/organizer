-- Campos para recuperação de senha
ALTER TABLE usuarios 
ADD reset_token_hash VARCHAR(64) NULL DEFAULT NULL UNIQUE,
ADD reset_token_expires_at DATETIME NULL DEFAULT NULL,