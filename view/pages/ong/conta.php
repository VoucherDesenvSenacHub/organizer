<?php
$acesso = 'ong';
$tituloPagina = 'Conta da Ong'; // Definir o título da página
$cssPagina = ['ong/conta.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
require_once '../../components/layout/base-inicio.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div class="ONG-page-container">
  <div class="ONG-principal">
    <div class="ONG-container">
      <div class="ONG-header">
        <h1>Dados da ONG</h1>
        <button class="ONG-profile-btn">Minha Conta</button>
      </div>

      <div class="ONG-accordion">
        <!-- Dados da ONG -->
        <div class="ONG-accordion-item" data-color="purple">
          <div class="ONG-accordion-header">
            <div class="ONG-header-content">
              <div class="ONG-icon-container purple">
                <i data-lucide="building-2"></i>
              </div>
              <span>Dados Gerais</span>
            </div>
            <i data-lucide="chevron-down" class="ONG-chevron"></i>
          </div>
          <div class="ONG-accordion-content">
            <div class="ONG-form-grid">
              <div class="ONG-form-group">
                <label>Razão Social</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="building-2"></i>
                    <span>Salvando o Mundo</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Telefone</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="phone"></i>
                    <span>(00) 00000-0000</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>CNPJ</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="file-text"></i>
                    <span>00.000.000/0000-00</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Email</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="mail"></i>
                    <span>ongsave@world.com</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Descrição -->
        <div class="ONG-accordion-item" data-color="yellow">
          <div class="ONG-accordion-header">
            <div class="ONG-header-content">
              <div class="ONG-icon-container yellow">
                <i data-lucide="align-left"></i>
              </div>
              <span>Descrição</span>
            </div>
            <i data-lucide="chevron-down" class="ONG-chevron"></i>
          </div>
          <div class="ONG-accordion-content">
            <div class="ONG-form-grid">
              <div class="ONG-form-group">
                <label>Descrição</label>
                <div class="ONG-input-container ONG-textarea-container">
                  <textarea readonly>Lorem ipsum...</textarea>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Áreas de atuação</label>
                <div class="ONG-input-container ONG-checkbox-container">
                  <div class="ONG-checkbox-grid">
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="saude">
                      <label for="saude">Saúde</label>
                    </div>
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="esporte">
                      <label for="esporte">Esporte</label>
                    </div>
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="meio-ambiente">
                      <label for="meio-ambiente">Meio Ambiente</label>
                    </div>
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="educacao">
                      <label for="educacao">Educação</label>
                    </div>
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="cultura">
                      <label for="cultura">Cultura</label>
                    </div>
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="protecao-animal">
                      <label for="protecao-animal">Proteção Animal</label>
                    </div>
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="tecnologia">
                      <label for="tecnologia">Tecnologia</label>
                    </div>
                    <div class="ONG-checkbox-item">
                      <input type="checkbox" id="direitos-humanos">
                      <label for="direitos-humanos">Direitos Humanos</label>
                    </div>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Endereço -->
        <div class="ONG-accordion-item" data-color="green">
          <div class="ONG-accordion-header">
            <div class="ONG-header-content">
              <div class="ONG-icon-container green">
                <i data-lucide="map-pin"></i>
              </div>
              <span>Endereço</span>
            </div>
            <i data-lucide="chevron-down" class="ONG-chevron"></i>
          </div>
          <div class="ONG-accordion-content">
            <div class="ONG-form-grid">
              <div class="ONG-form-group">
                <label>Rua</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="map-pin"></i>
                    <span>Rui Barbosa, 43</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Bairro</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="map-pin"></i>
                    <span>Centro</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>CEP</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="file-text"></i>
                    <span>79237-231</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Cidade</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="building"></i>
                    <span>Campo Grande</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Responsável -->
        <div class="ONG-accordion-item" data-color="red">
          <div class="ONG-accordion-header">
            <div class="ONG-header-content">
              <div class="ONG-icon-container red">
                <i data-lucide="user"></i>
              </div>
              <span>Responsável</span>
            </div>
            <i data-lucide="chevron-down" class="ONG-chevron"></i>
          </div>
          <div class="ONG-accordion-content">
            <div class="ONG-form-grid">
              <div class="ONG-form-group">
                <label>Nome</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="user"></i>
                    <span>João</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>CPF</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="credit-card"></i>
                    <span>000.000.000.000</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Telefone</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="phone"></i>
                    <span>(00) 00000-0000</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Email</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="mail"></i>
                    <span>user@gmail.com</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banco -->
        <div class="ONG-accordion-item" data-color="blue">
          <div class="ONG-accordion-header">
            <div class="ONG-header-content">
              <div class="ONG-icon-container blue">
                <i data-lucide="building"></i>
              </div>
              <span>Banco</span>
            </div>
            <i data-lucide="chevron-down" class="ONG-chevron"></i>
          </div>
          <div class="ONG-accordion-content">
            <div class="ONG-form-grid">
              <div class="ONG-form-group">
                <label>Agência</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="building"></i>
                    <span>3923-3</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Tipo</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="credit-card"></i>
                    <span>Conta Corrente</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Conta</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="building"></i>
                    <span>23341-34</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Titular</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="building"></i>
                    <span>Nome</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Login -->
        <div class="ONG-accordion-item" data-color="orange">
          <div class="ONG-accordion-header">
            <div class="ONG-header-content">
              <div class="ONG-icon-container orange">
                <i data-lucide="lock"></i>
              </div>
              <span>Login</span>
            </div>
            <i data-lucide="chevron-down" class="ONG-chevron"></i>
          </div>
          <div class="ONG-accordion-content">
            <div class="ONG-form-grid">
              <div class="ONG-form-group">
                <label>Email</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="mail"></i>
                    <span>ongtop@gmail.com</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="ONG-form-group">
                <label>Senha</label>
                <div class="ONG-input-container">
                  <div class="ONG-input-with-icon">
                    <i data-lucide="key"></i>
                    <span>********</span>
                  </div>
                  <button class="ONG-edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ONG-save-button-container">
        <button class="ONG-save-button">Salvar Alteração</button>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/lucide@latest"></script>
<?php
$jsPagina = ['conta-ong.js']; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
require_once '../../components/layout/footer/footer-logado.php';
?>