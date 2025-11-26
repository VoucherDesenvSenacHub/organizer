<?php
$acesso = 'visitante';
$tituloPagina = 'Desenvolvedores | Organizer';
$cssPagina = ['visitante/desenvolvedores.css'];
require_once '../../components//layout/base-inicio.php';

$lista = [
    [
        'nome' => 'Eduardo Silva Oliveira Filho',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Desenvolvedor especializado em desenvolvimento web e sistemas robustos.',
        'foto' => 'https://avatars.githubusercontent.com/Eduardo28110',
        'linkedin' => 'https://www.linkedin.com/in/eduardo-filho-b46434333/',
        'github' => 'https://github.com/Eduardo28110'
    ],
    [
        'nome' => 'Eduarda Tawany',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Especialista em interface do usuário e experiência do usuário.',
        'foto' => 'https://avatars.githubusercontent.com/TawanyDuda',
        'linkedin' => 'https://www.linkedin.com/in/eduarda-tawany-souza-937503323/',
        'github' => 'https://github.com/TawanyDuda'
    ],
    [
        'nome' => 'Carlos Gabryel Rumiatto Costa Pfeiffer',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Especialista em arquitetura de sistemas e desenvolvimento de APIs.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://www.linkedin.com/in/carlos-gabryel-rumiatto-costa-pfeiffer-550780392/',
        'github' => 'https://github.com/gabryel2008'
    ],
    [
        'nome' => 'Giovana Vitória Gomes Fernandes',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Designer especializada em experiência do usuário e design de interfaces.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => '',
        'github' => 'https://github.com/GiovanaGomessz'
    ],
    [
        'nome' => 'Bruna Cavalheiro Borges',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Desenvolvedora com foco em tecnologias web modernas.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://www.linkedin.com/in/bruna-cavalheiro-borges-21b5942ab?trk=contact-info',
        'github' => 'https://github.com/BrunaBorgs'
    ],
    [
        'nome' => 'Thiago dos Santos Godoy Ferreira',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Especialista em interfaces responsivas e frameworks JavaScript.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://www.linkedin.com/in/thiago-santos-505804392?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app',
        'github' => 'https://github.com/ThiagoSantos-del'
    ],
    [
        'nome' => 'Vitor dos Santos C. Ribeiro',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Especialista em infraestrutura e automação de deploy.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://github.com/rrbeirop',
        'github' => 'https://github.com/rrbeirop'
    ],
    [
        'nome' => 'Daniel Dourado Mota',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Especialista em banco de dados e arquitetura de sistemas.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://www.linkedin.com/in/danieldmota',
        'github' => 'https://github.com/danieldmota'
    ],
    [
        'nome' => 'Adercio Barbuio Junior',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Desenvolvedor com experiência em múltiplas tecnologias.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://www.linkedin.com/in/adercio-barbuio-junior-173ba4164/',
        'github' => 'https://github.com/barbuiojr'
    ],
    [
        'nome' => 'Caio Fagundes Mendonça Oliveira',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Especialista em desenvolvimento de aplicações móveis.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://www.linkedin.com/in/caio-fagundes-mendon%C3%A7a-oliveira-81838629a/',
        'github' => 'https://github.com/Caio373'
    ],
    [
        'nome' => 'Luiz Fernando Ferreira Mendes',
        'cargo' => 'Full Stack Developer',
        'descricao' => 'Desenvolvedor com amplo conhecimento em tecnologias web.',
        'foto' => 'user-placeholder.jpg',
        'linkedin' => 'https://www.linkedin.com/in/luiz-fernando-ferreira-mendes-624750212?utm_source=share&utm_content=profile&utm_medium=member_android',
        'github' => 'https://github.com/l2fm'
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
                        <img src="../../assets/images/pages/visitante/<?= $dev['foto'] ?>" alt="<?= htmlspecialchars($dev['nome']) ?>" class="foto">
                        <div class="social-links">
                            <?php if (!empty($dev['linkedin'])): ?>
                                <a href="<?= $dev['linkedin'] ?>" target="_blank" class="social-icon">
                                    <i class="fa-brands fa-linkedin"></i>
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

    <!-- Seção de Feedback dos Desenvolvedores -->
    <section class="feedback-devs">
        <div class="conteudo-feedback">
            <h3><i class="fa-solid fa-code-branch"></i> NOSSA MISSÃO TÉCNICA</h3>
            <p>Desenvolvemos esta plataforma com foco na experiência do usuário, performance e segurança. Cada linha de código foi escrita com dedicação para criar uma ferramenta que realmente faça a diferença no terceiro setor.</p>
            <div class="stats">
                <div class="stat-item">
                    <span class="stat-number">11</span>
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