-- ================================
-- VIEW PARA BUSCAR OS CARDS DA ONG
-- ================================
CREATE OR REPLACE VIEW vw_card_ongs AS
    SELECT o.ong_id, o.status, o.nome, o.descricao, o.data_cadastro,
        (SELECT caminho FROM imagens i WHERE i.imagem_id = o.imagem_id) AS caminho,
        (SELECT COUNT(*) FROM projetos p WHERE p.ong_id = o.ong_id) AS total_projetos,
        (SELECT COUNT(*) FROM doacoes_projetos dp JOIN projetos p ON dp.projeto_id = p.projeto_id WHERE p.ong_id = o.ong_id) AS total_doacoes
    FROM ongs o;

-- ================================
-- VIEW PARA BUSCAR OS CARDS DO PROJETO
-- ================================
CREATE OR REPLACE VIEW vw_card_projetos AS
    SELECT p.projeto_id, p.status, p.nome, p.descricao, i.caminho, p.categoria_id, c.nome AS categoria, c.cor,
        ROUND(COALESCE(SUM(dp.valor), 0) / p.meta * 100) AS barra, p.ong_id
    FROM projetos p
        LEFT JOIN imagens i
            ON i.imagem_id = (SELECT ip.imagem_id FROM imagens_projetos ip WHERE ip.projeto_id = p.projeto_id ORDER BY ip.id ASC LIMIT 1)
        LEFT JOIN categorias c USING(categoria_id)
        LEFT JOIN doacoes_projetos dp USING(projeto_id)
    GROUP BY p.projeto_id, p.nome, p.descricao, i.caminho;

-- ================================
-- VIEW PARA BUSCAR OS CARDS DA NOTÍCIA
-- ================================
CREATE OR REPLACE VIEW vw_card_noticias AS
    SELECT n.noticia_id, n.status, n.titulo, n.subtitulo, n.texto, n.subtexto, i.caminho,
        n.data_cadastro AS data_cadastro, o.ong_id, o.nome AS ong_nome
    FROM noticias n
    LEFT JOIN imagens i
        ON i.imagem_id = (SELECT in2.imagem_id FROM imagens_noticias in2 WHERE in2.noticia_id = n.noticia_id ORDER BY in2.id ASC LIMIT 1)
    INNER JOIN ongs o ON n.ong_id = o.ong_id;

-- ================================
-- VIEW PARA BUSCAR AS ATIVIDADES DA ONG
-- ================================
CREATE OR REPLACE VIEW vw_atividades_recentes_ong AS
-- Último projeto
    SELECT 'projeto' AS tipo, p.projeto_id AS id, p.nome,
        p.data_cadastro AS data_registro,
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
        n.data_cadastro, 
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
        d.data_doacao, 
        d.valor, p.ong_id
    FROM doacoes_projetos d
        JOIN projetos p ON p.projeto_id = d.projeto_id
    WHERE d.data_doacao = (
        SELECT MAX(dp.data_doacao)
        FROM doacoes_projetos dp
        JOIN projetos pp ON pp.projeto_id = dp.projeto_id
        WHERE pp.ong_id = p.ong_id
    );
 
-- ================================
-- VIEW PARA BUSCAR AS ATIVIDADES DO DOADOR
-- ================================
CREATE OR REPLACE VIEW vw_atividades_recentes_doador AS
-- Última doação feita pelo doador
    SELECT 'doacao' AS tipo, p.projeto_id AS id, p.nome,
        dp.data_doacao AS data_registro,
        dp.valor AS valor, dp.usuario_id
    FROM doacoes_projetos dp
        JOIN projetos p ON p.projeto_id = dp.projeto_id
    WHERE dp.data_doacao = (
        SELECT MAX(dp2.data_doacao)
        FROM doacoes_projetos dp2
        WHERE dp2.usuario_id = dp.usuario_id
    )
UNION ALL
-- Último apoio realizado pelo doador
    SELECT 'apoio', p.projeto_id, p.nome,
        ap.data_apoio,
        NULL, ap.usuario_id
    FROM apoios_projetos ap
        JOIN projetos p ON p.projeto_id = ap.projeto_id
    WHERE ap.data_apoio = (
        SELECT MAX(ap2.data_apoio)
        FROM apoios_projetos ap2
        WHERE ap2.usuario_id = ap.usuario_id
    )
UNION ALL
-- Última ONG favoritada pelo doador
    SELECT 'ong_favorita', fo.ong_id, o.nome,
        fo.data_favoritado,
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
        fp.data_favoritado,
        NULL, fp.usuario_id
    FROM favoritos_projetos fp 
        JOIN projetos p ON p.projeto_id = fp.projeto_id
    WHERE fp.data_favoritado = (
        SELECT MAX(fp2.data_favoritado)
        FROM favoritos_projetos fp2
        WHERE fp.usuario_id = fp2.usuario_id
    );