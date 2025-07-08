-- ================================
-- INSERÇÃO DE DADOS NA TABELA BANCOS
-- ================================
INSERT INTO bancos (nome, codigo) VALUES 
('Banco do Brasil S.A.', '001'),
('Banco Bradesco S.A.', '237'),
('Caixa Econômica Federal', '104'),
('Itaú Unibanco S.A.', '341'),
('Banco Santander (Brasil) S.A.', '033'),
('Nubank S.A.', '260'),
('Mercado Pago – Mercado Crédito SEP S.A.', '323'),
('Banco Inter S.A.', '077'),
('C6 Bank S.A.', '336'),
('PagBank – PagSeguro Internet S.A.', '290');


-- Cargas de projeto (TESTE) ! Mudar o ID da ONG
INSERT INTO projetos (nome, descricao, meta, ong_id) VALUES
(
  'Educação para Todos',
  'Este projeto visa democratizar o acesso à educação de qualidade para comunidades em situação de vulnerabilidade social. Serão oferecidas aulas de reforço escolar, oficinas de leitura, inclusão digital e apoio psicológico. A ONG contará com voluntários especializados e parcerias com escolas locais para garantir uma educação mais justa e inclusiva.',
  20000.00,
  1
),
(
  'Vida Sustentável',
  'O projeto Vida Sustentável tem como objetivo conscientizar e capacitar famílias de baixa renda sobre práticas sustentáveis no dia a dia. Através de oficinas sobre reciclagem, hortas comunitárias, compostagem e economia de água e energia, buscamos promover uma transformação ambiental e social nas comunidades atendidas.',
  18000.00,
  1
),
(
  'Cuidando de Quem Cuida',
  'Com foco no apoio a cuidadores de idosos e pessoas com deficiência, este projeto oferece capacitações, suporte psicológico, grupos de apoio e atividades de lazer. A iniciativa reconhece a importância dos cuidadores e busca melhorar sua qualidade de vida, saúde emocional e valorização dentro do contexto familiar e social.',
  15000.00,
  1
),
(
  'Tecnologia para o Bem',
  'A proposta deste projeto é oferecer cursos gratuitos de programação, robótica, e outras tecnologias para jovens em situação de risco social. Além das aulas, os participantes terão acesso a mentorias, eventos de tecnologia e oportunidades de estágio em empresas parceiras, abrindo portas para um futuro promissor no mercado de TI.',
  25000.00,
  1
),
(
  'Mulheres Empreendedoras',
  'Voltado para o empoderamento feminino, este projeto apoia mulheres de comunidades periféricas a desenvolverem habilidades empreendedoras. Com cursos de gestão, marketing, finanças e produção artesanal, o objetivo é incentivar o empreendedorismo como ferramenta de autonomia financeira e superação de ciclos de violência.',
  22000.00,
  1
);


-- Cargas de Notícias (TESTE) ! Mudar o ID da ONG
INSERT INTO noticias (titulo, subtitulo, texto, subtexto, status, ong_id) VALUES
(
  'Campanha arrecada livros para comunidades carentes',
  'A leitura como ponte para transformação social',
  'A ONG Saber para Todos iniciou uma campanha de arrecadação de livros com o objetivo de montar pequenas bibliotecas em comunidades carentes da zona rural. A ação pretende incentivar o hábito da leitura entre crianças e adolescentes, promovendo educação e cidadania através do acesso ao conhecimento.',
  'A campanha conta com o apoio de voluntários e livrarias da região, além de escolas que estão mobilizando alunos para arrecadar exemplares usados. A expectativa é alcançar mais de 2 mil livros em apenas dois meses.',
  'ATIVO',
  1
),
(
  'Projeto ambiental recolhe mais de 5 toneladas de lixo',
  'Ação mobilizou voluntários no último sábado',
  'Em uma ação de impacto ambiental, mais de 300 voluntários participaram de um mutirão de limpeza em praias e parques urbanos. A iniciativa foi promovida pela ONG Verde é Vida, que atua há mais de 10 anos em projetos de preservação ambiental em áreas urbanas e costeiras.',
  'A limpeza teve início às 7h e recolheu principalmente resíduos plásticos, como garrafas, sacolas e canudos, além de pneus e eletrodomésticos descartados de forma irregular. A ONG alertou sobre a importância da reciclagem e descarte correto do lixo.',
  'ATIVO',
  1
),
(
  'Nova sede da ONG Esperança é inaugurada em Belo Horizonte',
  'Espaço vai oferecer apoio social e psicológico',
  'A ONG Esperança celebrou a inauguração da sua nova sede na capital mineira. O novo espaço conta com salas de atendimento psicológico, oficinas de capacitação profissional e um centro comunitário para atividades culturais e esportivas. A proposta é ampliar o impacto social do trabalho já realizado.',
  'Com recursos obtidos por meio de doações e parcerias com empresas privadas, a nova estrutura permitirá atendimento a mais de 500 pessoas por mês. As atividades já começam na próxima semana com oficinas de arte e cursos de informática básica.',
  'ATIVO',
  1
),
(
  'Doações para vítimas das enchentes superam expectativas',
  'Solidariedade mobiliza milhares de brasileiros',
  'Após as fortes chuvas que atingiram o sul do país, a ONG Ajuda Já lançou uma campanha emergencial de arrecadação de alimentos, roupas e produtos de higiene. Em menos de uma semana, a organização recebeu doações suficientes para atender mais de 3 mil famílias desalojadas.',
  'Além das doações materiais, voluntários também estão atuando no acolhimento das vítimas, ajudando na limpeza das casas afetadas e distribuindo refeições. A campanha segue ativa, com pontos de coleta espalhados por várias cidades.',
  'ATIVO',
  1
),
(
  'Crianças recebem atendimento médico gratuito em ação solidária',
  'Mais de 200 crianças foram atendidas em evento de saúde',
  'A ONG Cuidar Bem realizou no último final de semana uma ação comunitária de saúde infantil. Com o apoio de médicos voluntários, foram oferecidas consultas pediátricas, exames básicos e aplicação de vacinas. A ação aconteceu em uma escola pública no bairro Jardim Primavera.',
  'Os pais das crianças destacaram a importância da iniciativa, já que muitos não têm acesso fácil ao sistema público de saúde. A ONG pretende repetir a ação em outras regiões da cidade nos próximos meses.',
  'ATIVO',
  1
);