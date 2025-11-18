<?php

require_once __DIR__ . "/../utils/EmailUtil.php";
require_once __DIR__ . "/../exceptions/EmailException.php";

class EmailService
{
    private $emailUtil;
    private $templatesPath;

    public function __construct()
    {
        $this->emailUtil = new EmailUtil();
        $this->templatesPath = __DIR__ . "/../emails/";
    }

    /**
     * Carrega template de email
     */
    private function carregarTemplate($nomeTemplate)
    {
        $arquivoTemplate = $this->templatesPath . $nomeTemplate;
        
        if (!file_exists($arquivoTemplate)) {
            throw new EmailException("Template de email não encontrado: " . $nomeTemplate);
        }
        
        return file_get_contents($arquivoTemplate);
    }

    /**
     * Substitui variáveis no template
     */
    private function processarTemplate($conteudo, $variaveis)
    {
        foreach ($variaveis as $chave => $valor) {
            $conteudo = str_replace("{{" . $chave . "}}", $valor, $conteudo);
        }
        
        return $conteudo;
    }

    /**
     * Envia email de redefinição de senha
     */
    public function enviarEmailRedefinirSenha($destinatario, $nome, $link)
    {
        $assunto = "Redefinição de Senha - Organizer";
        $template = $this->carregarTemplate('redefinir-senha.html');
        $mensagem = $this->processarTemplate($template, [
            'NAME' => $nome,
            'LINK' => $link
        ]);

        $this->emailUtil->enviar($destinatario, $assunto, $mensagem);
    }

    /**
     * Envia email de boas-vindas
     */
    public function enviarEmailBoasVindas($destinatario, $nome)
    {
        $assunto = "Bem-vindo ao Organizer!";
        $template = $this->carregarTemplate('boas-vindas.html');
        $mensagem = $this->processarTemplate($template, [
            'NOME' => $nome
        ]);

        $this->emailUtil->enviar($destinatario, $assunto, $mensagem);
    }

    /**
     * Envia email genérico
     */
    public function enviarEmailGenerico($destinatario, $assunto, $mensagem)
    {
        $template = $this->carregarTemplate('email-generico.html');
        $mensagemCompleta = $this->processarTemplate($template, [
            'ASSUNTO' => $assunto,
            'MENSAGEM' => $mensagem
        ]);

        $this->emailUtil->enviar($destinatario, $assunto, $mensagemCompleta);
    }
}