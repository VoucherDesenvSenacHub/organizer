-- TABELA DOS BANCOS
CREATE TABLE bancos (
    banco_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE,
    codigo VARCHAR(10) NOT NULL UNIQUE
);
INSERT INTO bancos (nome, codigo) VALUES
('Banco do Brasil', '001'),
('Bradesco', '237'),
('Caixa Econômica Federal', '104'),
('Itaú Unibanco', '341'),
('Santander', '033');


INSERT INTO usuarios (nome, cpf, data_nascimento, foto_perfil, email, telefone, senha, tipo_usuario)
VALUES 
('Ana Souza', '12345678901', '1990-05-12', 'ana.jpg', 'ana@example.com', '(11)91234-5678', 'senha123', 'DOADOR'),
('Carlos Lima', '23456789012', '1985-08-23', 'carlos.jpg', 'carlos@example.com', '(21)98765-4321', 'senha123', 'ONG'),
('Fernanda Alves', '34567890123', '1993-11-03', 'fernanda.jpg', 'fernanda@example.com', '(31)99876-5432', 'senha123', 'DOADOR'),
('Marcos Silva', '45678901234', '1978-03-30', 'marcos.jpg', 'marcos@example.com', '(41)97654-3210', 'senha123', 'ADM');


INSERT INTO ongs (cnpj, responsavel_id, descricao, telefone, email, cep, rua, bairro, cidade, banco_id, agencia, conta, tipo_conta) VALUES
('12.345.678/0001-90', 1, 'ONG dedicada a combater a fome em comunidades carentes.', '11999998888', 'contato@fomezero.org', '01001-000', 'Rua das Esperanças', 'Centro', 'São Paulo', 1, '1234', '00012345-6', 'CORRENTE'),
('23.456.789/0001-01', 2, 'Apoio à educação de crianças em situação de vulnerabilidade.', '21988887777', 'educa@futuro.org', '20040-001', 'Av. do Saber', 'Copacabana', 'Rio de Janeiro', 2, '5678', '00023456-7', 'POUPANÇA'),
('34.567.890/0001-12', 3, 'Abrigo e cuidado de animais abandonados.', '31977776666', 'contato@amigopet.org', '30140-110', 'Rua dos Bichos', 'Savassi', 'Belo Horizonte', 3, '4321', '00034567-8', 'CORRENTE'),
('45.678.901/0001-23', 4, 'ONG que atua em desastres naturais com doações e suporte.', '41966665555', 'ajuda@emergencia.org', '80010-020', 'Rua do Socorro', 'Centro Cívico', 'Curitiba', 4, '8765', '00045678-9', 'CORRENTE'),
('56.789.012/0001-34', 5, 'Promoção da saúde e bem-estar em comunidades rurais.', '51955554444', 'saude@bem.org', '90010-000', 'Av. da Saúde', 'Menino Deus', 'Porto Alegre', 5, '6789', '00056789-0', 'POUPANÇA');


INSERT INTO projetos (nome, descricao, meta, status, ong_id) VALUES
('Alimento para Todos', 'Projeto focado em arrecadar alimentos para famílias carentes.', 5000.00, 'ATIVO', 1),
('Educação para o Futuro', 'Campanha de doação de materiais escolares para crianças.', 3000.00, 'ATIVO', 2),
('Cuidando dos Animais', 'Apoio financeiro para um abrigo de animais abandonados.', 4500.00, 'INATIVO', 3),
('Ajuda às Vítimas de Enchentes', 'Projeto para fornecer roupas e abrigo a vítimas de desastres naturais.', 10000.00, 'FINALIZADO', 4),
('Saúde e Bem-Estar', 'Distribuição de kits de higiene e saúde em comunidades vulneráveis.', 7000.00, 'ATIVO', 5);