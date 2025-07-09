-- ================================
-- INSERÇÃO DE DADOS NA TABELA USÚARIOS
-- ================================
INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha, doador, ong, adm, status
) VALUES (
    'Gean Augusto',
    '00100200305',
    '2003-07-28',
    'https://avatars.githubusercontent.com/u/172551721?v=4',
    'gean@organizer.com',
    '67991202907',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);


INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha, doador, ong, adm, status
) VALUES (
    'Filipe Correia',
    '00000012345',
    '1993-11-03',
    'https://avatars.githubusercontent.com/u/161078050?v=4',
    'filipe@organizer.com',
    '67991233362',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);


INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha, doador, ong, adm, status
) VALUES (
    'Daniel',
    '07825982185',
    '2025-06-15',
    'https://avatars.githubusercontent.com/u/177282034?v=4',
    'daniel@organizer.com',
    '67992240987',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);


INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha, doador, ong, adm, status
) VALUES (
    'Bruna Cavalheiro Borges',
    '07999339105',
    '2007-05-26',
    'https://avatars.githubusercontent.com/u/172551770?v=4',
    'bruna@organizer.com',
    '67999232384',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);

INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha, doador, ong, adm, status
) VALUES (
    'Duda Tawany',
    '13297423322',
    '2007-04-20',
    'https://avatars.githubusercontent.com/u/172551684?v=4',
    'duda@organizer.com',
    '67992163882',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);

INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha, doador, ong, adm, status
) VALUES (
    'Vitor Coronel',
    '10000980000',
    '2004-01-01',
    'https://avatars.githubusercontent.com/u/177282041?v=4',
    'vitor@organizer.com',
    '67982175519',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);


INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha,
    doador, ong, adm, status
) VALUES (
    'Adercio Barbuio Junior',
    '12345677700',
    '1974-10-26',
    'https://avatars.githubusercontent.com/u/62699659?s=60&v=4',
    'adercio@organizer.com',
    '67992663558',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);


INSERT INTO usuarios (
    nome, cpf, data_nascimento, foto_perfil, email, telefone, senha,
    doador, ong, adm, status
) VALUES (
    'Eduardo Silva Oliveira Filho',
    '11111113245',
    '2007-11-28',
    'https://avatars.githubusercontent.com/u/177282096?v=4',
    'eduardo@organizer.com',
    '67111111111',
    '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
    TRUE,
    FALSE,
    TRUE,
    'ATIVO'
);



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

-- ================================
-- INSERÇÃO DE DADOS NA TABELA ONGS
-- ================================
INSERT INTO ongs (
    nome, cnpj, responsavel_id, telefone, email,
    cep, rua, bairro, cidade,
    banco_id, agencia, conta_numero, tipo_conta,
    logo_url, descricao, status
) VALUES (
    'Associação Amigos do Bem',
    '12.345.678/0001-90',
    1,
    '67991202907',
    'gean@organizer.com',
    '01001-001',
    'Rua da Solidariedade',
    'Centro',
    'São Paulo',
    3,
    '1234-5',
    '45645-68',
    'POUPANÇA',
    'https://www.portaladesso.com.br/images/noticia/img_3671_foto_2.jpg',
    'A Associação Amigos do Bem é uma organização não governamental sem fins lucrativos que atua há mais de 20 anos na promoção da inclusão social e no combate à pobreza em regiões de extrema vulnerabilidade. Nossa missão é transformar vidas por meio da educação, saúde, geração de renda e acesso à cidadania. Desenvolvemos projetos sustentáveis que impactam milhares de pessoas, promovendo o desenvolvimento humano e a autonomia das comunidades atendidas. Com uma equipe dedicada e parcerias com empresas e voluntários, acreditamos que é possível construir um futuro mais justo, solidário e com oportunidades para todos.',
    'ATIVO'
);

INSERT INTO ongs (
    nome, cnpj, responsavel_id, telefone, email,
    cep, rua, bairro, cidade,
    banco_id, agencia, conta_numero, tipo_conta,
    logo_url, descricao, status
) VALUES (
    'Associação Esperança para Todos',
    '11111111111111',
    2,
    '67198765432',
    'contato@esperancatodos.org',
    '79002-390',
    'Rua Rui Barbosa, 1436',
    'Centro',
    'Campo Grande',
    1,
    '1234-5',
    '67890-12',
    'CORRENTE',
    'https://sasp.com.br/wp-content/uploads/2020/04/acaosocial.jpg',
    'Somos uma organização sem fins lucrativos dedicada a promover o acesso à educação de qualidade para crianças e adolescentes em situação de vulnerabilidade social. Atuamos por meio de oficinas, reforço escolar e programas de incentivo à leitura.',
    'ATIVO'
);


INSERT INTO ongs (
    nome, cnpj, responsavel_id, telefone, email,
    cep, rua, bairro, cidade,
    banco_id, agencia, conta_numero, tipo_conta,
    logo_url, descricao, status
) VALUES (
    'Planeta em Harmonia',
    '89997777777777',
    3,
    '67992240989',
    'harmoniaplaneta@gmail.com',
    '79065-082',
    'rua cvcf',
    'centro',
    'Água Clara',
    2,
    '8000-0',
    '88888-88',
    'CORRENTE',
    'https://img.freepik.com/vetores-premium/sustentabilidade-salve-a-terra-proteja-o-planeta-dia-do-meio-ambiente_822713-79.jpg',
    'Planeta em Harmonia é uma organização sem fins lucrativos dedicada à promoção da sustentabilidade ambiental e à conscientização ecológica. Nossa missão é inspirar ações que preservem os recursos naturais, promovam a educação ambiental e incentivem práticas responsáveis que contribuam para um futuro equilibrado entre o ser humano e a natureza. Acreditamos que um planeta saudável começa com pequenas atitudes e grandes propósitos.',
    'ATIVO'
);


INSERT INTO ongs (
    nome, cnpj, responsavel_id, telefone, email,
    cep, rua, bairro, cidade,
    banco_id, agencia, conta_numero, tipo_conta,
    logo_url, descricao, status
) VALUES (
    'Instituto Sementes do Amanhã',
    '22334455000166',
    4,
    '11984561234',
    'contato@sementesdoamanha.org',
    '01156-000',
    'Rua das Palmeiras, 1020',
    'Jardim Esperança',
    'São Paulo',
    2,
    '5678-9',
    '11223-44',
    'POUPANÇA',
    'https://imagens.ebc.com.br/0iaeH_3bqaOnsrNzoGjkZuz01pE=/754x0/smart/https://radios.ebc.com.br/sites/default/files/thumbnails/image/sementes_0.jpg',
    'O Instituto Sementes do Amanhã é uma entidade sem fins lucrativos que atua na promoção da inclusão social, educação ambiental e desenvolvimento comunitário em áreas urbanas e rurais. Fundado com o propósito de plantar ideias que florescem em oportunidades, o Instituto desenvolve projetos que visam transformar realidades por meio da capacitação de jovens, oficinas de empreendedorismo sustentável, hortas comunitárias e ações educativas voltadas à preservação do meio ambiente.\n\nNossa equipe é formada por profissionais engajados e voluntários apaixonados por fazer a diferença. Acreditamos que cada pessoa tem o potencial de impactar positivamente a sociedade quando lhe são oferecidas as ferramentas certas. Com parcerias públicas e privadas, buscamos fortalecer comunidades e estimular a cidadania ativa. Cada ação do Instituto é guiada pelo compromisso com a ética, a empatia e a sustentabilidade, sempre mirando um futuro mais justo e próspero para todos.',
    'ATIVO'
);


INSERT INTO ongs (
    nome, cnpj, responsavel_id, telefone, email,
    cep, rua, bairro, cidade,
    banco_id, agencia, conta_numero, tipo_conta,
    logo_url, descricao, status
) VALUES (
    'SOS Rio Grande do Sul',
    '44556677000188',
    5,
    '51997453321',
    'contato@sosrs.org',
    '90010-120',
    'Rua Bento Gonçalves, 950',
    'Centro Histórico',
    'Porto Alegre',
    4,
    '4321-0',
    '55443-21',
    'CORRENTE',
    'https://sosenchentes.rs.gov.br/upload/recortes/202309/19160547_1450_GD.png',
    'A SOS Rio Grande do Sul é uma organização humanitária sem fins lucrativos criada com o objetivo de prestar assistência imediata e contínua às vítimas de desastres naturais, especialmente enchentes e temporais que atingem diversas regiões do estado. Surgida a partir da solidariedade de voluntários e profissionais comprometidos, a ONG atua com agilidade na arrecadação e distribuição de donativos, alimentos, roupas, kits de higiene e materiais de limpeza para famílias desalojadas e comunidades afetadas.\n\nAlém da ajuda emergencial, a SOS RS também desenvolve projetos de reconstrução de moradias, apoio psicológico às vítimas e capacitação de lideranças comunitárias para enfrentamento de futuras crises. Acreditamos que a união, a empatia e a ação coordenada são fundamentais para superar momentos difíceis e reconstruir vidas com dignidade. Com o apoio da população e de instituições parceiras, seguimos firmes na missão de cuidar de quem mais precisa em tempos de calamidade.',
    'ATIVO'
);


INSERT INTO ongs (
    nome, cnpj, responsavel_id, telefone, email, cep, rua, bairro, cidade,
    banco_id, agencia, conta_numero, tipo_conta, logo_url, descricao, status
) VALUES (
    'Fundação Beija Flor',
    '70981237000144',
    5,
    '67998765544',
    'contato@patasdobem.org',
    '79080-120',
    'Rua dos Girassóis',
    'Jardim Moreninha',
    'Campo Grande',
    1,
    '2020-9',
    '112233-44',
    'CORRENTE',
    'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh8KZO_tHfb95xYL3TiffzHtiA1lahqwnrPofiZD6GV51reFIakWZjnsJlpiuFl1pJcwi0fSk0K9PaNdcfpQ-gC6J-AMvVc4zMesed2sTfJ0-MvCLPSutx5mvDt6Umol92nU3OnzzQRqm0/s1600/marca+funda%25C3%25A7%25C3%25A3o+michel-01.jpg',
    'A Patas do Bem é uma organização sem fins lucrativos voltada para a proteção, acolhimento e reabilitação de animais abandonados, vítimas de maus-tratos e negligência. Nossa missão é garantir dignidade, cuidado e um novo lar para cães e gatos em situação de vulnerabilidade. Atuamos com resgates, atendimentos veterinários, vacinação, castração e adoção responsável. Também desenvolvemos campanhas de conscientização sobre posse responsável, combate ao abandono e bem-estar animal. Com a ajuda de voluntários e doadores, mantemos um abrigo seguro, amoroso e estruturado para dezenas de animais. Acreditamos que todo animal merece carinho, respeito e uma segunda chance. Se cada um fizer um pouco, juntos podemos transformar muitas vidas — de quatro patas.',
    'ATIVO'
);



-- PROJETOS
INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Educação para Todos',
    'Nosso projeto visa democratizar o acesso à educação de qualidade para comunidades em situação de vulnerabilidade social. Serão oferecidas aulas de reforço escolar, oficinas de leitura, inclusão digital e apoio psicológico. A ONG contará com voluntários especializados e parcerias com escolas locais para garantir uma educação mais justa e inclusiva.',
    15000.00,
    'ATIVO',
    1
);


INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Vida Sustentável',
    'O projeto Vida Sustentável tem como objetivo conscientizar e capacitar famílias de baixa renda sobre práticas sustentáveis no dia a dia. Através de oficinas sobre reciclagem, hortas comunitárias, compostagem e economia de água e energia, buscamos promover uma transformação ambiental e social nas comunidades atendidas.',
    5000.00,
    'ATIVO',
    1
);


INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Cuidando de Quem Cuida',
    'Com foco no apoio a cuidadores de idosos e pessoas com deficiência, este projeto oferece capacitações, suporte psicológico, grupos de apoio e atividades de lazer. A iniciativa reconhece a importância dos cuidadores e busca melhorar sua qualidade de vida, saúde emocional e valorização dentro do contexto familiar e social.',
    30000.00,
    'ATIVO',
    1
);


INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Tecnologia para o Bem',
    'A proposta deste projeto é oferecer cursos gratuitos de programação, robótica, e outras tecnologias para jovens em situação de risco social. Além das aulas, os participantes terão acesso a mentorias, eventos de tecnologia e oportunidades de estágio em empresas parceiras, abrindo portas para um futuro promissor no mercado de TI.',
    13000.00,
    'ATIVO',
    1
);


INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Biblioteca Comunitária Esperança',
    'Nosso projeto visa montar uma biblioteca comunitária em Campo Grande, oferecendo acesso gratuito a livros, oficinas de leitura e contação de histórias para crianças e adolescentes da comunidade. Com sua ajuda, poderemos adquirir livros, estantes e materiais didáticos.',
    3000.00,
    'ATIVO',
    2
);


INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Alimenta Comunidade',
    'O projeto Alimenta Comunidade tem como objetivo distribuir cestas básicas mensalmente para 100 famílias em situação de vulnerabilidade. Além dos alimentos, oferecemos oficinas sobre aproveitamento integral dos alimentos e nutrição básica. Sua doação fará a diferença no prato de muitas famílias!',
    8000.00,
    'ATIVO',
    2
);

INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Conecta Jovem',
    'O Conecta Jovem oferece cursos gratuitos de informática básica, introdução à programação e internet segura para adolescentes de comunidades periféricas. A meta é capacitar 60 jovens em 3 meses, preparando-os para oportunidades no mercado digital. Com sua ajuda, compraremos computadores, pagaremos instrutores e garantiremos acesso à internet.',
    2000.00,
    'ATIVO',
    3
);


INSERT INTO projetos (
    nome, descricao, meta, status, ong_id
) VALUES (
    'Sorrisos na Melhor Idade',
    'Este projeto tem como objetivo arrecadar fundos para realizar uma tarde de cuidados, lazer e atividades para 40 idosos em um lar de acolhimento. Com a verba, vamos oferecer corte de cabelo, manicure, música ao vivo, lanche especial e lembrancinhas personalizadas.\n\nQueremos proporcionar momentos de carinho e atenção para quem tantas vezes é esquecido. Um pequeno gesto pode transformar o dia — e a autoestima — de muitos.',
    2300.00,
    'ATIVO',
    3
);



-- Imagens dos projetos
INSERT INTO imagens_projeto (projeto_id, logo_url) VALUES
(1, 'https://cdn.slidesharecdn.com/ss_thumbnails/educacaotodos-131202174705-phpapp01-thumbnail.jpg?width=640&height=640&fit=bounds'),
(1, 'https://storage.googleapis.com/atados-v3/user-uploaded/images/3a437f8e-830d-4ebd-9320-eba5033438e5.jpg'),
(1, 'https://www.ubes.org.br/ubesnovo/wp-content/uploads/2018/04/ProblemasDaEducacaoDestaque-1-719x480.jpg'),
(2, 'https://portalsustentabilidade.com/wp-content/uploads/2022/03/Design-sem-nome-5-e1646419237102.jpg'),
(2, 'https://s1.static.brasilescola.uol.com.br/be/conteudo/images/sustentabilidade.jpg'),
(3, 'https://cajamar.sp.gov.br/noticias/wp-content/uploads/sites/2/2020/04/site_cuidando_de_quem_cuida.jpg'),
(4, 'https://s2-redeglobo.glbimg.com/CEVPb42FgioPvuINbIkDu-ielic=/0x0:1600x900/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_b58693ed41d04a39826739159bf600a0/internal_photos/bs/2020/H/h/eFLBbmSLqxIrOAIXyZgQ/istock-1075972590-red.jpg'),
(2, 'https://i.ytimg.com/vi/Qky8NVaAfK8/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBTelxuigbP2nhh0yjAOgqGw-yQeA'),
(6, 'https://lbv.org/wp-content/uploads/2023/12/flat_campanha_alimento-800_0.jpg'),
(5, 'https://mediospublicos.uy/wp-content/uploads/avion-de-papel_16x9.png'),
(7, 'https://static.wixstatic.com/media/e84587_c0672bfc82594f1c8ab9b12db949bf5b~mv2.png/v1/fill/w_1000,h_500,al_c,q_90,usm_0.66_1.00_0.01/e84587_c0672bfc82594f1c8ab9b12db949bf5b~mv2.png'),
(8, 'https://www.crieodontologia.com.br/wp-content/uploads/2018/02/06.02-Artigo-Higiene-bucal-na-terceira-idade-entenda-os-cuidados-necessarios.jpg');



-- NÓTICIAS
INSERT INTO noticias (
    titulo, subtitulo, texto, subtexto, status, ong_id
) VALUES (
    'Campanha arrecada livros para comunidades carentes',
    'A leitura como ponte para transformação social',
    'A ONG Saber para Todos iniciou uma campanha de arrecadação de livros com o objetivo de montar pequenas bibliotecas em comunidades carentes da zona rural. A ação pretende incentivar o hábito da leitura entre crianças e adolescentes, promovendo educação e cidadania através do acesso ao conhecimento.',
    'A campanha conta com o apoio de voluntários e livrarias da região, além de escolas que estão mobilizando alunos para arrecadar exemplares usados. A expectativa é alcançar mais de 2 mil livros em apenas dois meses.',
    'ATIVO',
    1
);


INSERT INTO noticias (
    titulo, subtitulo, texto, subtexto, status, ong_id
) VALUES (
    'Projeto ambiental recolhe mais de 5 toneladas de lixo',
    'Ação mobilizou voluntários no último sábado',
    'Em uma ação de impacto ambiental, mais de 300 voluntários participaram de um mutirão de limpeza em praias e parques urbanos. A iniciativa foi promovida pela ONG Verde é Vida, que atua há mais de 10 anos em projetos de preservação ambiental em áreas urbanas e costeiras.',
    'A limpeza teve início às 7h e recolheu principalmente resíduos plásticos, como garrafas, sacolas e canudos, além de pneus e eletrodomésticos descartados de forma irregular. A ONG alertou sobre a importância da reciclagem e descarte correto do lixo.',
    'ATIVO',
    1
);


INSERT INTO noticias (
    titulo, subtitulo, texto, subtexto, status, ong_id
) VALUES (
    'Campanha de Arrecadação de Alimentos Supera Expectativas',
    'Unidos pela Solidariedade',
    'Nossa campanha de arrecadação de alimentos, realizada durante o mês de junho, foi um verdadeiro sucesso! Graças ao apoio de voluntários e doadores, conseguimos coletar mais de 2 toneladas de alimentos não perecíveis, que já estão sendo distribuídos para famílias em situação de vulnerabilidade.\n\nA ação contou com o envolvimento de escolas, empresas parceiras e membros da comunidade, que se uniram por uma causa nobre: combater a fome e promover a solidariedade. Agradecemos a todos os envolvidos por cada contribuição e gesto de carinho.\n\nContinuamos com nosso compromisso social e esperamos realizar novas campanhas nos próximos meses. Fique ligado em nossas redes sociais para acompanhar todas as novidades!',
    'Doações garantiram alimento na mesa de centenas de famílias em situação de risco',
    'ATIVO',
    2
);




INSERT INTO imagens_noticia (noticia_id, logo_url) VALUES
(1, 'https://www.campusvilla.com.br/wp-content/uploads/2019/04/Doacao-Livros_ArmazemLiterario_Villa2019-21.jpg'),
(2, 'https://navegantes.sc.gov.br/wp-content/uploads/2025/03/juntos-pelo-rio-capa-scaled.jpg'),
(1, 'https://www.campusvilla.com.br/wp-content/uploads/2019/04/Doacao-Livros_ArmazemLiterario_Villa2019-22.jpg'),
(1, 'https://www.campusvilla.com.br/wp-content/uploads/2019/04/Doacao-Livros_ArmazemLiterario_Villa2019-29.jpg'),
(2, 'https://navegantes.sc.gov.br/wp-content/uploads/2025/03/IMG_2122-1376x917.jpg'),
(3, 'https://cronos-media.sesisenaisp.org.br/api/media/1-0/files?img=img_4_210324_b0cf7edf-5e5b-475c-8f69-f1f7a03407c6_o.jpg');





-- Doações de Gean (usuario_id = 1)
INSERT INTO doacao_projeto (projeto_id, usuario_id, valor) VALUES
(1, 1, 500.00),
(1, 1, 3000.00),
(1, 1, 150.00),
(2, 1, 3000.00);

-- Doações de Bruna (usuario_id = 2)
INSERT INTO doacao_projeto (projeto_id, usuario_id, valor) VALUES
(3, 2, 11000.00),
(1, 2, 100.00);

-- Doações de Daniel (usuario_id = 3)
INSERT INTO doacao_projeto (projeto_id, usuario_id, valor) VALUES
(5, 3, 2800.00),
(2, 3, 250.00);

-- Doações de Filipe (usuario_id = 4)
INSERT INTO doacao_projeto (projeto_id, usuario_id, valor) VALUES
(4, 4, 1300.00),
(6, 4, 120.00);

-- Doações de Duda (usuario_id = 5)
INSERT INTO doacao_projeto (projeto_id, usuario_id, valor) VALUES
(7, 5, 300.00),
(3, 5, 310.00);
