-- ================================
-- VIEW PARA BUSCAR AS ATIVIDADES DA ONG
-- ================================
CREATE OR REPLACE VIEW vw_atividades_recentes_ong AS
-- Último projeto
    SELECT 'projeto' AS tipo, p.projeto_id AS id, p.nome,
        DATE_FORMAT(p.data_cadastro, '%d/%m/%Y %H:%i') AS data_registro,
        NULL AS valor, p.ong_id
    FROM projetos p
    WHERE p.projeto_id = (
        SELECT projeto_id FROM projetos 
        WHERE ong_id = p.ong_id 
        ORDER BY data_cadastro DESC LIMIT 1
    )
UNION ALL
-- Última notícia
    SELECT 'noticia', n.noticia_id, n.titulo, 
        DATE_FORMAT(n.data_cadastro, '%d/%m/%Y %H:%i'), 
        NULL, n.ong_id
    FROM noticias n
    WHERE n.noticia_id = (
        SELECT noticia_id FROM noticias 
        WHERE ong_id = n.ong_id 
        ORDER BY data_cadastro DESC LIMIT 1
    )
UNION ALL
-- Última doação
    SELECT 'doacao', d.id, p.nome, 
        DATE_FORMAT(d.data_doacao, '%d/%m/%Y %H:%i'), 
        d.valor, p.ong_id
    FROM doacao_projeto d
        JOIN projetos p ON p.projeto_id = d.projeto_id
    WHERE d.data_doacao = (
        SELECT MAX(dp.data_doacao)
        FROM doacao_projeto dp
        JOIN projetos pp ON pp.projeto_id = dp.projeto_id
        WHERE pp.ong_id = p.ong_id
    );
 
-- ================================
-- VIEW PARA BUSCAR AS ATIVIDADES DO DOADOR
-- ================================
CREATE OR REPLACE VIEW vw_atividades_recentes_doador AS
-- Última doação feita pelo doador
    SELECT 'doacao' AS tipo, p.projeto_id AS id, p.nome,
        DATE_FORMAT(dp.data_doacao, '%d/%m/%Y %H:%i') AS data_registro,
        dp.valor AS valor, dp.usuario_id
    FROM doacao_projeto dp
        JOIN projetos p ON p.projeto_id = dp.projeto_id
    WHERE dp.data_doacao = (
        SELECT MAX(dp2.data_doacao)
        FROM doacao_projeto dp2
        WHERE dp2.usuario_id = dp.usuario_id
    )
UNION ALL
-- Último apoio realizado pelo doador
    SELECT 'apoio', p.projeto_id, p.nome,
        DATE_FORMAT(ap.data_apoio, '%d/%m/%Y %H:%i'),
        NULL, ap.usuario_id
    FROM apoios_projeto ap
        JOIN projetos p ON p.projeto_id = ap.projeto_id
    WHERE ap.data_apoio = (
        SELECT MAX(ap2.data_apoio)
        FROM apoios_projeto ap2
        WHERE ap2.usuario_id = ap.usuario_id
    )
UNION ALL
-- Última ONG favoritada pelo doador
    SELECT 'ong_favorita', fo.ong_id, o.nome,
        DATE_FORMAT(fo.data_favoritado, '%d/%m/%Y %H:%i'),
        NULL, fo.usuario_id
    FROM favoritos_ongs fo
        JOIN ongs o ON o.ong_id = fo.ong_id
    WHERE fo.data_favoritado = (
        SELECT MAX(fo2.data_favoritado)
        FROM favoritos_ongs fo2
        WHERE fo.usuario_id = fo2.usuario_id
    )
UNION ALL
-- Último projeto favoritado pelo doador
    SELECT 'projeto_favorito', fp.projeto_id, p.nome,
        DATE_FORMAT(fp.data_favoritado, '%d/%m/%Y %H:%i'),
        NULL, fp.usuario_id
    FROM favoritos_projetos fp 
        JOIN projetos p ON p.projeto_id = fp.projeto_id
    WHERE fp.data_favoritado = (
        SELECT MAX(fp2.data_favoritado)
        FROM favoritos_projetos fp2
        WHERE fp.usuario_id = fp2.usuario_id
    );
