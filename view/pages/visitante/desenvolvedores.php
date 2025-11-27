<?php
$acesso = 'visitante';
$tituloPagina = 'Desenvolvedores | Organizer';
$cssPagina = ['visitante/desenvolvedores.css'];
require_once '../../components//layout/base-inicio.php';

$lista = [
    [
        'nome' => 'Eduardo Silva Oliveira Filho',
        'descricao' => 'Desenvolvedor especializado em desenvolvimento Front-end e Back-end.',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/Eduardo28110.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/eduardo-filho-b46434333/',
        'github' => 'https://github.com/Eduardo28110'
    ],
    [
        'nome' => 'Luiz Felipe Mariano Bonfim',
        'descricao' => 'Desenvolvedor especializado em desenvolvimento Front-end e Back-end.',
        'cargo' => 'Full Stack Developer',
        'foto' => 'https://github.com/Luizfelipereal007.png?size=600',
        'linkedin' => '',
        'github' => 'https://github.com/Luizfelipereal007',
        'insta' => 'https://www.instagram.com/lzfmb/'
    ],
    [
        'nome' => 'Eduarda Tawany Souza',
        'descricao' => 'Desenvolvedor Front-end.',
        'cargo' => 'Desenvolvedor front-end',
        'foto' => 'https://github.com/TawanyDuda.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/eduarda-tawany-souza-937503323/',
        'github' => 'https://github.com/TawanyDuda'
    ],
    [
        'nome' => 'Carlos Gabryel Rumiatto Costa Pfeiffer',
        'descricao' => 'Designer Web de Branding',
        'cargo' => 'Desenvolvedor front-end',
        'foto' => 'https://github.com/gabryel2008.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/carlos-gabryel-rumiatto-costa-pfeiffer-550780392/',
        'github' => 'https://github.com/gabryel2008'
    ],
    [
        'nome' => 'Giovana V. Gomes',
        'descricao' => 'Designer especialista em experiência do usuário e design de interfaces',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/GiovanaGomessz.png?size=600',
        'linkedin' => '',
        'github' => 'https://github.com/GiovanaGomessz'
    ],
    [
        'nome' => 'Bruna Cavalheiro Borges',
        'descricao' => 'Desenvolvedora web com foco em front-end e banco de dados.',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/BrunaBorgs.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/bruna-cavalheiro-borges-21b5942ab?trk=contact-info',
        'github' => 'https://github.com/BrunaBorgs'
    ],
    [
        'nome' => 'Thiago dos Santos Godoy Ferreira',
        'descricao' => 'Desenvolvedor especializado em desenvolvimento Front-end.',
        'cargo' => 'Desenvolvedor front-end',
        'foto' => 'https://github.com/ThiagoSantos-del.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/thiago-santos-505804392?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app',
        'github' => 'https://github.com/ThiagoSantos-del'
    ],
    [
        'nome' => 'Vitor dos Santos C. Ribeiro',
        'descricao' => 'Especialista Full Stack com atuação no desenvolvimento de interfaces responsivas, criação e integração de APIs, modelagem e otimização de bancos de dados, práticas de DevOps (Docker, CI/CD) e foco em qualidade por meio de testes, segurança e documentação.',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/rrbeirop.png?size=600',
        'linkedin' => 'https://github.com/rrbeirop',
        'github' => 'https://github.com/rrbeirop'
    ],
    [
        'nome' => 'Daniel Dourado Mota',
        'descricao' => 'Desenvolvedor Full Stack.',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/danieldmota.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/danieldmota',
        'github' => 'https://github.com/danieldmota'
    ],
    [
        'nome' => 'Adercio Barbuio Junior',
        'descricao' => 'Desenvolvedor Full Stack e embarcados',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/barbuiojr.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/adercio-barbuio-junior-173ba4164/',
        'github' => 'https://github.com/barbuiojr'
    ],
    [
        'nome' => 'Caio Fagundes Mendonça Oliveira',
        'descricao' => 'Desenvolvedor capaz de atuar em todas as camadas de um sistema web, desde a interface visual até a lógica de servidor e banco de dados.',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/Caio373.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/caio-fagundes-mendon%C3%A7a-oliveira-81838629a/',
        'github' => 'https://github.com/Caio373'
    ],
    [
        'nome' => 'Luiz Fernando Ferreira Mendes',
        'descricao' => 'Especialista em desenvolvimento em front-end.',
        'cargo' => 'Desenvolvedor front-end',
        'foto' => 'https://github.com/l2fm.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/luiz-fernando-ferreira-mendes-624750212?utm_source=share&utm_content=profile&utm_medium=member_android',
        'github' => 'https://github.com/settings/profile'
    ],
    [
        'nome' => 'Gean Augusto Corrêa Vieira',
        'descricao' => 'Desenvolvedor especializado em sistemas web e estruturas de dados.',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/Geanoff.png?size=600',
        'linkedin' => 'https://www.linkedin.com/in/gean-augusto-480979201?utm_source=share_via&utm_content=profile&utm_medium=member_android',
        'github' => 'https://github.com/Geanoff'
    ],
    [
        'nome' => 'Filipe Martins Correia',
        'descricao' => 'Desenvolver especializado em desenvolvimento Front-end e Back-end.',
        'cargo' => 'Desenvolvedor full stack',
        'foto' => 'https://github.com/FilipeMatins.png?size=600',
        'linkedin' => 'https://www.linkedin.com/public-profile/settings',
        'github' => 'https://github.com/FilipeMatins'
    ]
];
?>
<main class="container">
    <section class="top">
        <h1>NOSSOS DESENVOLVEDORES</h1>
        <p>Conheça a equipe de desenvolvedores responsável por transformar nossa visão em uma plataforma digital robusta e funcional. Conheça quem torna tudo isso possível.</p>
    </section>
    <section class="desenvolvedores">
        <h3><i class="fa-solid fa-laptop-code"></i> EQUIPE DE DESENVOLVIMENTO</h3>
        <div class="grid-desenvolvedores">
            <?php foreach ($lista as $dev): ?>
                <div class="card-desenvolvedor">
                    <div class="foto-dev">
                        <img src="<?= $dev['foto'] ?>" alt="<?= htmlspecialchars($dev['nome']) ?>" class="foto">
                        <div class="social-links">
                            <?php if (!empty($dev['linkedin'])): ?>
                                <a href="<?= $dev['linkedin'] ?>" target="_blank" class="social-icon">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($dev['insta'])): ?>
                                <a href="<?= $dev['insta'] ?>" target="_blank" class="social-icon">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?= $dev['github'] ?>" target="_blank" class="social-icon">
                                <i class="fa-brands fa-github"></i>
                            </a>
                        </div>
                    </div>
                    <div class="texto">
                        <h4><?= htmlspecialchars($dev['nome']) ?></h4>
                        <p class="cargo"><?= htmlspecialchars($dev['cargo']) ?></p>
                        <p class="descricao"><?= htmlspecialchars($dev['descricao']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="feedback-devs">
        <div class="conteudo-feedback">
            <h3><i class="fa-solid fa-code-branch"></i> NOSSA MISSÃO TÉCNICA</h3>
            <p>Desenvolvemos esta plataforma com foco na experiência do usuário, performance e segurança. Cada linha de código foi escrita com dedicação para criar uma ferramenta que realmente faça a diferença no terceiro setor.</p>
            <div class="stats">
                <div class="stat-item">
                    <span class="stat-number">14</span>
                    <span class="stat-label">Desenvolvedores</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2,000+</span>
                    <span class="stat-label">Horas de Desenvolvimento</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">99.9%</span>
                    <span class="stat-label">Uptime Garantido</span>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
$jsPagina = [];
require_once '../../components/layout/footer/footer-visitante.php';
?>