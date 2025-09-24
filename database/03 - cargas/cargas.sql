    -- ================================
    -- INSERÇÃO DE IMAGENS PARA OS (PROJETOS - NOTÍCIAS - ONGS - USÚARIOS)
    -- ================================
    INSERT INTO imagens (caminho) values
    -- IMAGENS PARA PROJETOS
    ('upload/images/projetos/educacao001.webp'),
    ('upload/images/projetos/educacao002.jpg'),
    ('upload/images/projetos/educacao003.jpg'),
    ('upload/images/projetos/vida_sustentavel001.webp'),
    ('upload/images/projetos/vida_sustentavel002.webp'),
    ('upload/images/projetos/vida_sustentavel003.jpg'),
    ('upload/images/projetos/cuidando001.jpg'),
    ('upload/images/projetos/tecnologia001.webp'),
    ('upload/images/projetos/biblioteca.png'),
    ('upload/images/projetos/campanha_alimento001.jpg'),
    ('upload/images/projetos/conecta_jovem.png'),
    ('upload/images/projetos/higiene_bucal001.jpg'),
    -- IMAGENS PARA NOTÍCIAS
    ('upload/images/noticias/doacao_livros001.jpg'),
    ('upload/images/noticias/doacao_livros002.jpg'),
    ('upload/images/noticias/doacao_livros003.jpg'),
    ('upload/images/noticias/coleta_lixo001.jpg'),
    ('upload/images/noticias/coleta_lixo002.jpg'),
    ('upload/images/noticias/doe-alimentos001.jpg'),
    -- IMAGENS PARA ONGS
    ('https://www.portaladesso.com.br/images/noticia/img_3671_foto_2.jpg'),
    ('https://sasp.com.br/wp-content/uploads/2020/04/acaosocial.jpg'),
    ('https://img.freepik.com/vetores-premium/sustentabilidade-salve-a-terra-proteja-o-planeta-dia-do-meio-ambiente_822713-79.jpg'),
    ('https://imagens.ebc.com.br/0iaeH_3bqaOnsrNzoGjkZuz01pE=/754x0/smart/https://radios.ebc.com.br/sites/default/files/thumbnails/image/sementes_0.jpg'),
    ('https://sosenchentes.rs.gov.br/upload/recortes/202309/19160547_1450_GD.png'),
    ('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh8KZO_tHfb95xYL3TiffzHtiA1lahqwnrPofiZD6GV51reFIakWZjnsJlpiuFl1pJcwi0fSk0K9PaNdcfpQ-gC6J-AMvVc4zMesed2sTfJ0-MvCLPSutx5mvDt6Umol92nU3OnzzQRqm0/s1600/marca+funda%25C3%25A7%25C3%25A3o+michel-01.jpg'),
    -- IMAGENS PARA USÚARIOS
    ('https://avatars.githubusercontent.com/u/172551721?v=4'),
    ('https://avatars.githubusercontent.com/u/161078050?v=4'),
    ('https://avatars.githubusercontent.com/u/177282034?v=4'),
    ('https://avatars.githubusercontent.com/u/172551770?v=4'),
    ('https://avatars.githubusercontent.com/u/172551684?v=4'),
    ('https://avatars.githubusercontent.com/u/177282041?v=4'),
    ('https://avatars.githubusercontent.com/u/62699659?s=60&v=4'),
    ('https://avatars.githubusercontent.com/u/172556334?v=4');



    -- ================================
    -- INSERÇÃO DE DADOS NA TABELA CATEGORIAS
    -- ================================
    INSERT INTO categorias (nome, cor) VALUES
    ('Educação', '#2196F3'),
    ('Saúde', '#EF6EB1'),
    ('Meio Ambiente', '#30AD1A'),
    ('Tecnologia e Inovação', '#9C27B0'),
    ('Cultura e Artes', '#FF9800'),
    ('Esporte e Lazer', '#FFC107'),
    ('Assistência Social', '#F44336'),
    ('Direitos Humanos', '#1976D2'),
    ('Segurança e Defesa', '#616161');


    -- ================================
    -- INSERÇÃO DE DADOS NA TABELA USÚARIOS
    -- ================================
    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha, doador, ong, adm, status
    ) VALUES (
        'Gean Augusto',
        '00100200305',
        '2003-07-28',
        25,
        'gean@organizer.com',
        '67991202907',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        TRUE,
        TRUE,
        TRUE,
        'ATIVO'
    );

    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha, doador, ong, adm, status
    ) VALUES (
        'Filipe Correia',
        '00000012345',
        '1993-11-03',
        26,
        'filipe@organizer.com',
        '67991233362',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        TRUE,
        TRUE,
        TRUE,
        'ATIVO'
    );

    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha, doador, ong, adm, status
    ) VALUES (
        'Daniel',
        '07825982185',
        '2025-06-15',
        27,
        'daniel@organizer.com',
        '67992240987',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        TRUE,
        TRUE,
        TRUE,
        'ATIVO'
    );

    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha, doador, ong, adm, status
    ) VALUES (
        'Bruna Cavalheiro Borges',
        '07999339105',
        '2007-05-26',
        28,
        'bruna@organizer.com',
        '67999232384',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        TRUE,
        TRUE,
        TRUE,
        'ATIVO'
    );

    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha, doador, ong, adm, status
    ) VALUES (
        'Duda Tawany',
        '13297423322',
        '2007-04-20',
        29,
        'duda@organizer.com',
        '67992163882',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        TRUE,
        TRUE,
        TRUE,
        'ATIVO'
    );

    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha, doador, ong, adm, status
    ) VALUES (
        'Vitor Coronel',
        '10000980000',
        '2004-01-01',
        30,
        'vitor@organizer.com',
        '67982175519',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        TRUE,
        TRUE,
        TRUE,
        'ATIVO'
    );

    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha,
        doador, ong, adm, status
    ) VALUES (
        'Adercio Barbuio Junior',
        '12345677700',
        '1974-10-26',
        31,
        'adercio@organizer.com',
        '67992663558',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        FALSE,
        FALSE,
        FALSE,
        'ATIVO'
    );

    INSERT INTO usuarios (
        nome, cpf, data_nascimento, imagem_id, email, telefone, senha,
        doador, ong, adm, status
    ) VALUES (
        'Giovana Vitória Gomes',
        '70149596464',
        '2008-10-10',
        32,
        'giovana@organizer.com',
        '67998047393',
        '$2y$10$AJjK477ZpcxLxe9jowzCJuxBLs8nsYgHsU2QF41BauggY3vfxmDSG',
        FALSE,
        FALSE,
        FALSE,
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
        cep, rua, numero, bairro, cidade, estado,
        banco_id, agencia, conta_numero, tipo_conta,
        imagem_id, descricao, status
    ) VALUES (
        'Associação Amigos do Bem',
        '12345678000190',
        1,
        '67991202907',
        'gean@organizer.com',
        '01001-001',
        'Praça da Sé',
        '29',
        'Sé',
        'São Paulo',
        'SP',
        3,
        '1234-5',
        '45645-68',
        'POUPANÇA',
        19,
        'A Associação Amigos do Bem é uma organização não governamental sem fins lucrativos que atua há mais de 20 anos na promoção da inclusão social e no combate à pobreza em regiões de extrema vulnerabilidade. Nossa missão é transformar vidas por meio da educação, saúde, geração de renda e acesso à cidadania. Desenvolvemos projetos sustentáveis que impactam milhares de pessoas, promovendo o desenvolvimento humano e a autonomia das comunidades atendidas. Com uma equipe dedicada e parcerias com empresas e voluntários, acreditamos que é possível construir um futuro mais justo, solidário e com oportunidades para todos.',
        'ATIVO'
    );

    INSERT INTO ongs (
        nome, cnpj, responsavel_id, telefone, email,
        cep, rua, numero, bairro, cidade, estado,
        banco_id, agencia, conta_numero, tipo_conta,
        imagem_id, descricao, status
    ) VALUES (
        'Associação Esperança para Todos',
        '11111111111111',
        2,
        '67198765432',
        'contato@esperancatodos.org',
        '79002-390',
        'Rua Padre João Crippa',
        '829',
        'Centro',
        'Campo Grande',
        'MS',
        1,
        '1234-5',
        '67890-12',
        'CORRENTE',
        20,
        'Somos uma organização sem fins lucrativos dedicada a promover o acesso à educação de qualidade para crianças e adolescentes em situação de vulnerabilidade social. Atuamos por meio de oficinas, reforço escolar e programas de incentivo à leitura.',
        'ATIVO'
    );

    INSERT INTO ongs (
        nome, cnpj, responsavel_id, telefone, email,
        cep, rua, numero, bairro, cidade, estado,
        banco_id, agencia, conta_numero, tipo_conta,
        imagem_id, descricao, status
    ) VALUES (
        'Planeta em Harmonia',
        '89997777777777',
        3,
        '67992240989',
        'harmoniaplaneta@gmail.com',
        '79065-082',
        'Rua Pacavira',
        '542',
        'Vila Moreninha II',
        'Campo Grande',
        'MS',
        2,
        '8000-0',
        '88888-88',
        'CORRENTE',
        21,
        'Planeta em Harmonia é uma organização sem fins lucrativos dedicada à promoção da sustentabilidade ambiental e à conscientização ecológica. Nossa missão é inspirar ações que preservem os recursos naturais, promovam a educação ambiental e incentivem práticas responsáveis que contribuam para um futuro equilibrado entre o ser humano e a natureza. Acreditamos que um planeta saudável começa com pequenas atitudes e grandes propósitos.',
        'ATIVO'
    );

    INSERT INTO ongs (
        nome, cnpj, responsavel_id, telefone, email,
        cep, rua, numero, bairro, cidade, estado,
        banco_id, agencia, conta_numero, tipo_conta,
        imagem_id, descricao, status
    ) VALUES (
        'Instituto Sementes do Amanhã',
        '22334455000166',
        4,
        '11984561234',
        'contato@sementesdoamanha.org',
        '01156-000',
        'Rua Tagipuru',
        '019',
        'Barra Funda',
        'São Paulo',
        'SP',
        2,
        '5678-9',
        '11223-44',
        'POUPANÇA',
        22,
        'O Instituto Sementes do Amanhã é uma entidade sem fins lucrativos que atua na promoção da inclusão social, educação ambiental e desenvolvimento comunitário em áreas urbanas e rurais. Fundado com o propósito de plantar ideias que florescem em oportunidades, o Instituto desenvolve projetos que visam transformar realidades por meio da capacitação de jovens, oficinas de empreendedorismo sustentável, hortas comunitárias e ações educativas voltadas à preservação do meio ambiente.\n\nNossa equipe é formada por profissionais engajados e voluntários apaixonados por fazer a diferença. Acreditamos que cada pessoa tem o potencial de impactar positivamente a sociedade quando lhe são oferecidas as ferramentas certas. Com parcerias públicas e privadas, buscamos fortalecer comunidades e estimular a cidadania ativa. Cada ação do Instituto é guiada pelo compromisso com a ética, a empatia e a sustentabilidade, sempre mirando um futuro mais justo e próspero para todos.',
        'ATIVO'
    );

    INSERT INTO ongs (
        nome, cnpj, responsavel_id, telefone, email,
        cep, rua, numero, bairro, cidade, estado,
        banco_id, agencia, conta_numero, tipo_conta,
        imagem_id, descricao, status
    ) VALUES (
        'SOS Rio Grande do Sul',
        '44556677000188',
        5,
        '51997453321',
        'contato@sosrs.org',
        '90010-120',
        'Avenida Presidente João Goulart',
        '1293',
        'Centro Histórico',
        'Porto Alegre',
        'RS',
        4,
        '4321-0',
        '55443-21',
        'CORRENTE',
        23,
        'A SOS Rio Grande do Sul é uma organização humanitária sem fins lucrativos criada com o objetivo de prestar assistência imediata e contínua às vítimas de desastres naturais, especialmente enchentes e temporais que atingem diversas regiões do estado. Surgida a partir da solidariedade de voluntários e profissionais comprometidos, a ONG atua com agilidade na arrecadação e distribuição de donativos, alimentos, roupas, kits de higiene e materiais de limpeza para famílias desalojadas e comunidades afetadas.\n\nAlém da ajuda emergencial, a SOS RS também desenvolve projetos de reconstrução de moradias, apoio psicológico às vítimas e capacitação de lideranças comunitárias para enfrentamento de futuras crises. Acreditamos que a união, a empatia e a ação coordenada são fundamentais para superar momentos difíceis e reconstruir vidas com dignidade. Com o apoio da população e de instituições parceiras, seguimos firmes na missão de cuidar de quem mais precisa em tempos de calamidade.',
        'ATIVO'
    );

    INSERT INTO ongs (
        nome, cnpj, responsavel_id, telefone, email, 
        cep, rua, numero, bairro, cidade, estado,
        banco_id, agencia, conta_numero, tipo_conta, 
        imagem_id, descricao, status
    ) VALUES (
        'Fundação Beija Flor',
        '70981237000144',
        6,
        '67998765544',
        'contato@patasdobem.org',
        '79080-120',
        'Rua Aliança',
        '059',
        'Jardim América',
        'Campo Grande',
        'MS',
        1,
        '2020-9',
        '112233-44',
        'CORRENTE',
        24,
        'A Patas do Bem é uma organização sem fins lucrativos voltada para a proteção, acolhimento e reabilitação de animais abandonados, vítimas de maus-tratos e negligência. Nossa missão é garantir dignidade, cuidado e um novo lar para cães e gatos em situação de vulnerabilidade. Atuamos com resgates, atendimentos veterinários, vacinação, castração e adoção responsável. Também desenvolvemos campanhas de conscientização sobre posse responsável, combate ao abandono e bem-estar animal. Com a ajuda de voluntários e doadores, mantemos um abrigo seguro, amoroso e estruturado para dezenas de animais. Acreditamos que todo animal merece carinho, respeito e uma segunda chance. Se cada um fizer um pouco, juntos podemos transformar muitas vidas — de quatro patas.',
        'ATIVO'
    );



    -- ================================
    -- INSERÇÃO DE DADOS NA TABELA PROJETOS
    -- ================================
    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Educação para Todos',
        'Nosso projeto visa democratizar o acesso à educação de qualidade para comunidades em situação de vulnerabilidade social. Serão oferecidas aulas de reforço escolar, oficinas de leitura, inclusão digital e apoio psicológico. A ONG contará com voluntários especializados e parcerias com escolas locais para garantir uma educação mais justa e inclusiva.',
        15000.00,
        1,
        'ATIVO',
        1
    );

    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Vida Sustentável',
        'O projeto Vida Sustentável tem como objetivo conscientizar e capacitar famílias de baixa renda sobre práticas sustentáveis no dia a dia. Através de oficinas sobre reciclagem, hortas comunitárias, compostagem e economia de água e energia, buscamos promover uma transformação ambiental e social nas comunidades atendidas.',
        5000.00,
        3,
        'ATIVO',
        1
    );

    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Cuidando de Quem Cuida',
        'Com foco no apoio a cuidadores de idosos e pessoas com deficiência, este projeto oferece capacitações, suporte psicológico, grupos de apoio e atividades de lazer. A iniciativa reconhece a importância dos cuidadores e busca melhorar sua qualidade de vida, saúde emocional e valorização dentro do contexto familiar e social.',
        30000.00,
        2,
        'ATIVO',
        1
    );

    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Tecnologia para o Bem',
        'A proposta deste projeto é oferecer cursos gratuitos de programação, robótica, e outras tecnologias para jovens em situação de risco social. Além das aulas, os participantes terão acesso a mentorias, eventos de tecnologia e oportunidades de estágio em empresas parceiras, abrindo portas para um futuro promissor no mercado de TI.',
        13000.00,
        4,
        'ATIVO',
        1
    );

    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Biblioteca Comunitária Esperança',
        'Nosso projeto visa montar uma biblioteca comunitária em Campo Grande, oferecendo acesso gratuito a livros, oficinas de leitura e contação de histórias para crianças e adolescentes da comunidade. Com sua ajuda, poderemos adquirir livros, estantes e materiais didáticos.',
        3000.00,
        7,
        'ATIVO',
        2
    );

    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Alimenta Comunidade',
        'O projeto Alimenta Comunidade tem como objetivo distribuir cestas básicas mensalmente para 100 famílias em situação de vulnerabilidade. Além dos alimentos, oferecemos oficinas sobre aproveitamento integral dos alimentos e nutrição básica. Sua doação fará a diferença no prato de muitas famílias!',
        8000.00,
        8,
        'ATIVO',
        2
    );

    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Conecta Jovem',
        'O Conecta Jovem oferece cursos gratuitos de informática básica, introdução à programação e internet segura para adolescentes de comunidades periféricas. A meta é capacitar 60 jovens em 3 meses, preparando-os para oportunidades no mercado digital. Com sua ajuda, compraremos computadores, pagaremos instrutores e garantiremos acesso à internet.',
        2000.00,
        6,
        'ATIVO',
        3
    );

    INSERT INTO projetos (
        nome, descricao, meta, categoria_id, status, ong_id
    ) VALUES (
        'Sorrisos na Melhor Idade',
        'Este projeto tem como objetivo arrecadar fundos para realizar uma tarde de cuidados, lazer e atividades para 40 idosos em um lar de acolhimento. Com a verba, vamos oferecer corte de cabelo, manicure, música ao vivo, lanche especial e lembrancinhas personalizadas.\n\nQueremos proporcionar momentos de carinho e atenção para quem tantas vezes é esquecido. Um pequeno gesto pode transformar o dia — e a autoestima — de muitos.',
        2300.00,
        2,
        'ATIVO',
        3
    );



    -- ================================
    -- INSERÇÃO DE DADOS NA TABELA NOTÍCIAS
    -- ================================
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



    -- ================================
    -- RELACIONAR IMAGEM AO PROJETO
    -- ================================
    INSERT INTO imagens_projetos (projeto_id, imagem_id) VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (2, 4),
    (2, 5),
    (2, 6),
    (3, 7),
    (4, 8),
    (5, 9),
    (6, 10),
    (7, 11),
    (8, 12);

    -- ================================
    -- RELACIONAR IMAGEM A NOTÍCIA
    -- ================================
    INSERT INTO imagens_noticias (noticia_id, imagem_id) VALUES
    (1, 13),
    (1, 14),
    (1, 15),
    (2, 16),
    (2, 17),
    (3, 18);



    -- ================================
    -- INSERÇÃO DE DOAÇÕES PARA A TABELA DOACOES_PROJETO
    -- ================================
    -- Doações de Gean (usuario_id = 1)
    INSERT INTO doacoes_projetos (projeto_id, usuario_id, valor, data_doacao) VALUES
    (1, 1, 500.00, NOW()),
    (1, 1, 3000.00, NOW() + INTERVAL 5 SECOND),
    (1, 1, 150.00, NOW() + INTERVAL 10 SECOND),
    (2, 1, 3000.00, NOW() + INTERVAL 15 SECOND);

    -- Doações de Bruna (usuario_id = 2)
    INSERT INTO doacoes_projetos (projeto_id, usuario_id, valor, data_doacao) VALUES
    (3, 2, 11000.00, NOW() + INTERVAL 20 SECOND),
    (1, 2, 100.00, NOW() + INTERVAL 25 SECOND);

    -- Doações de Daniel (usuario_id = 3)
    INSERT INTO doacoes_projetos (projeto_id, usuario_id, valor, data_doacao) VALUES
    (5, 3, 2800.00, NOW() + INTERVAL 30 SECOND),
    (2, 3, 250.00, NOW() + INTERVAL 35 SECOND);

    -- Doações de Filipe (usuario_id = 4)
    INSERT INTO doacoes_projetos (projeto_id, usuario_id, valor, data_doacao) VALUES
    (4, 4, 1300.00, NOW() + INTERVAL 40 SECOND),
    (6, 4, 120.00, NOW() + INTERVAL 45 SECOND);

    -- Doações de Duda (usuario_id = 5)
    INSERT INTO doacoes_projetos (projeto_id, usuario_id, valor, data_doacao) VALUES
    (7, 5, 300.00, NOW() + INTERVAL 50 SECOND),
    (3, 5, 310.00, NOW() + INTERVAL 55 SECOND);



    -- ================================
    -- INSERÇÃO DE EMPRESAS PARCEIRAS
    -- ================================
    INSERT INTO parcerias (nome, cnpj, email, telefone, descricao, mensagem, status) VALUES
    ('Nubank', '12345678000101', 'contato@nubank.com', '1140028922', 'Banco digital focado em experiência do usuário', 'Temos interesse em parcerias estratégicas.', 'APROVADA'),
    ('Faber-Castell', '23456789000102', 'parcerias@faber-castell.com', '1134567890', 'Fabricante de materiais de escrita e artísticos', 'Gostaríamos de apoiar projetos educacionais e culturais.', 'APROVADA'),
    ('Cielo', '34567890000103', 'contato@cielo.com', '1121003200', 'Empresa de soluções de pagamento eletrônico', 'Interessados em iniciativas de inclusão financeira.', 'APROVADA'),
    ('Pedigree', '45678900000104', 'parcerias@pedigree.com', '11998765432', 'Marca de ração e produtos para cães', 'Podemos colaborar com projetos de proteção animal.', 'PENDENTE'),
    ('Coral', '56789000000105', 'contato@coral.com', '1133445566', 'Fabricante de tintas e soluções para pintura', 'Queremos apoiar projetos de melhoria de espaços comunitários.', 'PENDENTE'),
    ('Guaraná Antarctica', '67890000000106', 'parcerias@guarana.com', '11987654321', 'Bebida brasileira de renome nacional', 'Interessados em patrocínios e parcerias promocionais.', 'APROVADA');