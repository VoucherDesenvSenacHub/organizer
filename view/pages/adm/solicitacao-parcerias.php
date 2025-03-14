<?php 
    $tituloPagina = ''; // Definir o título da página
    $cssPagina = ['adm/solicitacao-parcerias.css']; //Colocar o arquivo .css (exemplo: 'ONG/cadastro.css')
    require_once '../../components/header.php';
?>
<!-- COMEÇAR SEU CÓDIGO AQUI -->
<div class="principal">
        
        <h1 class="titulo-solicitacao">SOLICITAÇÃO DE <span class="negrito">PARCERIAS</span></h1>

        <table class="table">
        <tbody>
            <tr class="linha-coluna">
                <td class="logo-empresa">
                    <img src="../../assets/images/avatar_logo.png" alt="">
                </td>
                <td class="info-empresa">Coca Cola <br>
                    00.000.000/0000-00
                 </td>
                <td>
                    <img class="icon-visible" id="visualiza-solicitacao" src="../../assets/images/visualizar.png" alt="">
                </td>
                <td>
                    <button class="btn-aceitar" id="btn-aceita-solicitacao">Aceitar</button>
                
                    <button class="btn-recusar" id="btn-recusa-solicitacao">Recusar</button>
                </td>
            </tr>
            <tr class="linha-coluna">
                <td class="logo-empresa">
                    <img src="../../assets/images/avatar_logo.png" alt="">
                </td>
                <td class="info-empresa">Coca Cola <br>
                    00.000.000/0000-00
                 </td>
                <td>
                    <img class="icon-visible" id="visualiza-solicitacao" src="../../assets/images/visualizar.png" alt="">
                </td>
                <td>
                    <button class="btn-aceitar" id="btn-aceita-solicitacao">Aceitar</button>
                
                    <button class="btn-recusar" id="btn-recusa-solicitacao">Recusar</button>
                </td>
            </tr>
            <tr class="linha-coluna">
                <td class="logo-empresa">
                    <img src="../../assets/images/avatar_logo.png" alt="">
                </td>
                <td class="info-empresa">Coca Cola <br>
                    00.000.000/0000-00
                 </td>
                <td>
                    <img class="icon-visible" id="visualiza-solicitacao" src="../../assets/images/visualizar.png" alt="">
                </td>
                <td>
                    <button class="btn-aceitar" id="btn-aceita-solicitacao">Aceitar</button>
                
                    <button class="btn-recusar" id="btn-recusa-solicitacao">Recusar</button>
                </td>
            </tr>
            <tr class="linha-coluna">
                <td class="logo-empresa">
                    <img src="../../assets/images/avatar_logo.png" alt="">
                </td>
                <td class="info-empresa">Coca Cola <br>
                    00.000.000/0000-00
                 </td>
                <td>
                    <img class="icon-visible" id="visualiza-solicitacao" src="../../assets/images/visualizar.png" alt="">
                </td>
                <td>
                    <button class="btn-aceitar" id="btn-aceita-solicitacao">Aceitar</button>
                
                    <button class="btn-recusar" id="btn-recusa-solicitacao">Recusar</button>
                </td>
            </tr>
            <tr class="linha-coluna">
                <td class="logo-empresa">
                    <img src="../../assets/images/avatar_logo.png" alt="">
                </td>
                <td class="info-empresa">Coca Cola <br>
                    00.000.000/0000-00
                 </td>
                <td>
                    <img class="icon-visible" id="visualiza-solicitacao" src="../../assets/images/visualizar.png" alt="">
                </td>
                <td>
                    <button class="btn-aceitar" id="btn-aceita-solicitacao">Aceitar</button>
                
                    <button class="btn-recusar" id="btn-recusa-solicitacao">Recusar</button>
                </td>
            </tr>
        </tbody>
        </table>
    
    </div>

    <!-- tela visualiza pedido -->
    <div class="tela-visualiza-solicitacao" id="tela-visualiza-solicitacao">
        <div class="card-visualiza-solicitacao">
        <div class="logo-descricao">
                <div><img src="../../assets/images/avatar_logo.png" alt=""></div>   
                <div><h3>Coca Cola <br> 00.000.000/0000-00</h3></div>
        </div>
        <div>
                <div><p>Somos a Coca-Cola e acreditamos no impacto positivo que seu sistema pode gerar. Estamos interessados em estabelecer uma parceria para apoiar seus projetos e promover juntos um futuro melhor. Aguardamos ansiosamente seu retorno.</p></div>      
        </div>
        </div>
     </div>

    <!-- tela confirmação de pedido aceito -->
    <div class="tela-confirma-solicitacao" id="tela-confirma-solicitacao">
        <div class="card-confirma-solicitacao">
                <div><img src="../../assets/images/parcerias.png" alt=""></div>   
                <div><h1>Parceria Aceita</h1></div>
                <div><p>Um email foi enviado para informar</p></div>      
        </div>
     </div>

     <!-- tela confirmação de pedido recusado -->
    <div class="tela-recusa-solicitacao" id="tela-recusa-solicitacao">
        <div class="card-recusa-solicitacao">
                <div><img src="../../assets/images/parceria-recusada.png" alt=""></div>   
                <div><h1>Parceria Recusada</h1></div>
                <div><p>Um email foi enviado para informar</p></div>      
        </div>
     </div>

<?php
    $jsPagina = ['solicitacao-parcerias-adm.js']; //Colocar o arquivo .js (exemplo: 'cadastro.js')
    require_once '../../components/footer.php';
?>