-- Campos para recuperação de senha
    reset_token_hash VARCHAR(64) NULL DEFAULT NULL UNIQUE,
    reset_token_expires_at DATETIME NULL DEFAULT NULL,