<?php
$tituloPagina = 'Busca de Projetos e ONGs'; // Definir o título da página
$cssPagina = ['visitante/busca.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/header.php';
?>
<div class="Busca-page-container">
        <div class="Busca-principal">
            <div class="busca-container">
                <div class="busca-sidebar">
                    <h2 class="busca-sidebar-title">Filtros:</h2>
                    <div class="busca-filter-group">
                        <div class="busca-select-wrapper">
                            <select id="tipo">
                                <option value="" disabled selected>Tipo</option>
                                <option value="todos">Todos</option>
                                <option value="projeto">Projeto</option>
                                <option value="ong">ONG</option>
                            </select>
                            <div class="busca-select-arrow">&#9662;</div>
                        </div>
                    </div>

                    <div class="busca-filter-group">
                        <div class="busca-select-wrapper">
                            <select id="status">
                                <option value="" disabled selected>Status</option>
                                <option value="todos">Todos</option>
                                <option value="ativo">Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                            <div class="busca-select-arrow">&#9662;</div>
                        </div>
                    </div>

                    <div class="busca-filter-group">
                        <div class="busca-select-wrapper">
                            <select id="regiao">
                                <option value="" disabled selected>Região</option>
                                <option value="todas">Todas</option>
                                <option value="norte">Norte</option>
                                <option value="nordeste">Nordeste</option>
                                <option value="centro-oeste">Centro-Oeste</option>
                                <option value="sudeste">Sudeste</option>
                                <option value="sul">Sul</option>
                            </select>
                            <div class="busca-select-arrow">&#9662;</div>
                        </div>
                    </div>

                    <div class="busca-filter-group">
                        <div class="busca-select-wrapper">
                            <select id="categoria">
                                <option value="" disabled selected>Categoria</option>
                                <option value="todas">Todas</option>
                                <option value="saude">Saúde</option>
                                <option value="ambiente">Ambiente</option>
                                <option value="esporte">Esporte</option>
                                <option value="educacao">Educação</option>
                            </select>
                            <div class="busca-select-arrow">&#9662;</div>
                        </div>
                    </div>
                </div>

                <!-- Conteúdo principal -->
                <div class="busca-main-content">
                    <div class="busca-search-container">
                        <input
                            type="text"
                            id="search-input"
                            placeholder="Busque por Projetos ou Ongs"
                            class="busca-search-input">
                        <button id="search-button" class="busca-search-button">Buscar</button>
                    </div>

                    <div id="results-container" class="busca-results-container busca-hidden">
                        <div class="busca-results-header">
                            <h2 class="busca-results-title">Resultados Encontrados</h2>
                            <button id="clear-button" class="busca-clear-button">
                                <span class="busca-x-icon">✕</span> Limpar
                            </button>
                        </div>

                        <div id="results-grid" class="busca-results-grid">
                            <!-- Os resultados aparece aqui pelo JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
$jsPagina = ['busca.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
require_once '../../components/footer.php';
?>