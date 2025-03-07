<?php 
    $tituloPagina = 'Perfil Ong'; // Definir o título da página
    $cssPagina = ['ONG/perfil.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div id="principal">
    
  <div class="container">
      <div class="header">
        <h1>Dados da ONG</h1>
        <button class="profile-btn">MEU PERFIL</button>
      </div>
      
      <div class="accordion">
        <!-- Dados da ONG -->
        <div class="accordion-item" data-color="purple">
          <div class="accordion-header">
            <div class="header-content">
              <div class="icon-container purple">
                <i data-lucide="building-2"></i>
              </div>
              <span>Dados Gerais</span>
            </div>
            <i data-lucide="chevron-down" class="chevron"></i>
          </div>
          <div class="accordion-content">
            <div class="form-grid">
              <div class="form-group">
                <label>Razão Social</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="building-2"></i>
                    <span>Salvando o Mundo</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Telefone</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="phone"></i>
                    <span>(00) 00000-0000</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>CNPJ</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="file-text"></i>
                    <span>00.000.000/0000-00</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="mail"></i>
                    <span>ongsave@world.com</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Descrição -->
        <div class="accordion-item" data-color="yellow">
          <div class="accordion-header">
            <div class="header-content">
              <div class="icon-container yellow">
                <i data-lucide="align-left"></i>
              </div>
              <span>Descrição</span>
            </div>
            <i data-lucide="chevron-down" class="chevron"></i>
          </div>
          <div class="accordion-content">
            <div class="form-grid">
              <div class="form-group">
                <label>Descrição</label>
                <div class="input-container textarea-container">
                  <textarea readonly>Lorem ipsum...</textarea>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Áreas de atuação</label>
                <div class="input-container checkbox-container">
                  <div class="checkbox-grid">
                    <div class="checkbox-item">
                      <input type="checkbox" id="saude">
                      <label for="saude">Saúde</label>
                    </div>
                    <div class="checkbox-item">
                      <input type="checkbox" id="esporte">
                      <label for="esporte">Esporte</label>
                    </div>
                    <div class="checkbox-item">
                      <input type="checkbox" id="meio-ambiente">
                      <label for="meio-ambiente">Meio Ambiente</label>
                    </div>
                    <div class="checkbox-item">
                      <input type="checkbox" id="educacao">
                      <label for="educacao">Educação</label>
                    </div>
                    <div class="checkbox-item">
                      <input type="checkbox" id="cultura">
                      <label for="cultura">Cultura</label>
                    </div>
                    <div class="checkbox-item">
                      <input type="checkbox" id="protecao-animal">
                      <label for="protecao-animal">Proteção Animal</label>
                    </div>
                    <div class="checkbox-item">
                      <input type="checkbox" id="tecnologia">
                      <label for="tecnologia">Tecnologia</label>
                    </div>
                    <div class="checkbox-item">
                      <input type="checkbox" id="direitos-humanos">
                      <label for="direitos-humanos">Direitos Humanos</label>
                    </div>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Endereço -->
        <div class="accordion-item" data-color="green">
          <div class="accordion-header">
            <div class="header-content">
              <div class="icon-container green">
                <i data-lucide="map-pin"></i>
              </div>
              <span>Endereço</span>
            </div>
            <i data-lucide="chevron-down" class="chevron"></i>
          </div>
          <div class="accordion-content">
            <div class="form-grid">
              <div class="form-group">
                <label>Rua</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="map-pin"></i>
                    <span>Rui Barbosa, 43</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Bairro</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="map-pin"></i>
                    <span>Centro</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>CEP</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="file-text"></i>
                    <span>79237-231</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Cidade</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="building"></i>
                    <span>Campo Grande</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Responsável -->
        <div class="accordion-item" data-color="red">
          <div class="accordion-header">
            <div class="header-content">
              <div class="icon-container red">
                <i data-lucide="user"></i>
              </div>
              <span>Responsável</span>
            </div>
            <i data-lucide="chevron-down" class="chevron"></i>
          </div>
          <div class="accordion-content">
            <div class="form-grid">
              <div class="form-group">
                <label>Nome</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="user"></i>
                    <span>João</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>CPF</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="credit-card"></i>
                    <span>000.000.000.000</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Telefone</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="phone"></i>
                    <span>(00) 00000-0000</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Email</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="mail"></i>
                    <span>user@gmail.com</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Banco -->
        <div class="accordion-item" data-color="blue">
          <div class="accordion-header">
            <div class="header-content">
              <div class="icon-container blue">
                <i data-lucide="building"></i>
              </div>
              <span>Banco</span>
            </div>
            <i data-lucide="chevron-down" class="chevron"></i>
          </div>
          <div class="accordion-content">
            <div class="form-grid">
              <div class="form-group">
                <label>Agência</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="building"></i>
                    <span>3923-3</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Tipo</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="credit-card"></i>
                    <span>Conta Corrente</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Conta</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="building"></i>
                    <span>23341-34</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Titular</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="building"></i>
                    <span>Nome</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Login -->
        <div class="accordion-item" data-color="orange">
          <div class="accordion-header">
            <div class="header-content">
              <div class="icon-container orange">
                <i data-lucide="lock"></i>
              </div>
              <span>Login</span>
            </div>
            <i data-lucide="chevron-down" class="chevron"></i>
          </div>
          <div class="accordion-content">
            <div class="form-grid">
              <div class="form-group">
                <label>Email</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="mail"></i>
                    <span>ongtop@gmail.com</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
                <label>Senha</label>
                <div class="input-container">
                  <div class="input-with-icon">
                    <i data-lucide="key"></i>
                    <span>********</span>
                  </div>
                  <button class="edit-btn">
                    <i data-lucide="pencil"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="save-button-container">
        <button class="save-button">Salvar Alteração</button>
      </div>
    </div>
</div>

<?php
    $jsPagina = ['perfil-ong.js','https://unpkg.com/lucide@latest']; //Colocar o arquivo .js (exemplo: 'ONG/cadastro.js')
    require_once '../../components/footer.php';
?>