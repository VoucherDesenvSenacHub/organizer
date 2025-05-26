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

INSERT INTO ongs (nome, cnpj, responsavel_id, telefone, email, cep, rua, bairro, cidade, banco_id, agencia, conta, tipo_conta, descricao) VALUES 
('ONG Vida Melhor', '12.345.678/0001-90', 1, '11999999999', 'contato@vidamelhor.org', '01001-000', 'Rua da Esperança, 123', 'Centro', 'São Paulo', 1, '1234', '56789-0', 'CORRENTE', 'A ONG Vida Melhor foi fundada com o propósito de promover o bem-estar de comunidades em situação de vulnerabilidade social. Oferecemos atendimento médico gratuito, distribuição de alimentos, suporte psicológico e programas de capacitação profissional. Nosso trabalho impacta milhares de famílias e busca gerar oportunidades reais de transformação social.'),
('Educa Futuro', '98.765.432/0001-11', 2, '21988887777', 'contato@educafuturo.org', '20010-000', 'Av. do Conhecimento, 456', 'Centro', 'Rio de Janeiro', 2, '4321', '12345-6', 'POUPANÇA', 'A Educa Futuro é uma organização sem fins lucrativos dedicada a ampliar o acesso à educação de qualidade para jovens em situação de risco. Atuamos com aulas de reforço, preparação para vestibulares, acesso a bolsas de estudo e oficinas de habilidades socioemocionais. Acreditamos que a educação é o caminho mais eficaz para mudar realidades e construir um futuro mais justo.'),
('Amigos da Natureza', '11.222.333/0001-44', 3, '31977776666', 'contato@natureza.org', '30140-000', 'Rua Verde, 789', 'Savassi', 'Belo Horizonte', 3, '5678', '98765-4', 'CORRENTE', 'Amigos da Natureza nasceu da urgência de preservar os recursos naturais e promover a consciência ambiental. Realizamos campanhas de reflorestamento, mutirões de limpeza de rios, oficinas de educação ambiental em escolas e pesquisas sobre biodiversidade. Nossa missão é mobilizar a sociedade para práticas sustentáveis e proteger o meio ambiente para as próximas gerações.'),
('Sorriso Animal', '55.666.777/0001-55', 4, '47999998888', 'contato@sorrisoanimal.org', '89010-000', 'Rua dos Bichos, 101', 'Centro', 'Blumenau', 4, '8765', '65432-1', 'POUPANÇA', 'A Sorriso Animal é uma ONG dedicada ao resgate, tratamento e adoção de animais abandonados ou vítimas de maus-tratos. Mantemos um abrigo com capacidade para mais de 200 animais, todos assistidos por veterinários e voluntários. Além disso, promovemos feiras de adoção, campanhas de castração e ações educativas sobre a guarda responsável de pets.');

INSERT INTO projetos (nome, descricao, meta, status, ong_id) VALUES
('Alimento para Todos', 'Projeto focado em arrecadar alimentos para famílias carentes.', 5000.00, 'ATIVO', 1),
('Educação para o Futuro', 'Campanha de doação de materiais escolares para crianças.', 3000.00, 'ATIVO', 2),
('Cuidando dos Animais', 'Apoio financeiro para um abrigo de animais abandonados.', 4500.00, 'INATIVO', 3),
('Ajuda às Vítimas de Enchentes', 'Projeto para fornecer roupas e abrigo a vítimas de desastres naturais.', 10000.00, 'FINALIZADO', 3),
('Saúde e Bem-Estar', 'Distribuição de kits de higiene e saúde em comunidades vulneráveis.', 7000.00, 'ATIVO', 3);