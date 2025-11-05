<?php
require_once __DIR__ . "/../config/database.php";

class UsuarioModel
{
    private $tabela = 'usuarios';
    private $pdo;

    public function __construct()
    {
        global $pdo;
        $this->pdo = $pdo;
        $this->pdo->exec("SET time_zone = '-04:00'");
    }

    function login($email)
    {
        $query = "SELECT usuario_id, status, nome, email, senha, doador, ong, adm, i.caminho
        FROM $this->tabela 
        LEFT JOIN imagens i USING(imagem_id)
        WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Verificar se o usuário tem uma ONG!
    function buscarOngUsuario($usuarioId)
    {
        $query = "SELECT ong_id FROM ongs WHERE responsavel_id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $usuarioId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    function cadastro($dados)
    {
        try {
            $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);

            $query = "INSERT INTO $this->tabela (nome, cpf, data_nascimento, email, telefone, senha)
                  VALUES (:nome, :cpf, :data_nascimento, :email, :telefone, :senha)";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':senha', $senhaHash);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // qualquer erro retorna false
        }
    }

    function primeiroAcesso($usuarioId, $escolha)
    {
        $query = "UPDATE $this->tabela SET $escolha = 1 WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $usuarioId, PDO::PARAM_INT);
        return $stmt->execute();
    }


    // Listagem para o ADM
    function listar(string $tipo = '', $valor = [])
    {
        $params = [];
        $limit = $valor['limit'] ?? 14;
        $pagina = $valor['pagina'] ?? 1;
        $offset = ($pagina - 1) * $limit;

        switch ($tipo) {
            // Buscar usuários pelo nome
            case 'pesquisa':
                $query = "SELECT u.*, i.caminho FROM $this->tabela u
                LEFT JOIN imagens i USING(imagem_id)
                WHERE nome LIKE :nome";
                $params[':nome'] = "%{$valor['pesquisa']}%";
                break;
            default:
                $query = "SELECT u.*, i.caminho FROM $this->tabela u
                LEFT JOIN imagens i USING(imagem_id)";
        }

        $query .= " LIMIT {$limit} OFFSET {$offset}";

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function buscar_perfil($id)
    {
        $query = "SELECT u.*, i.caminho FROM $this->tabela u
        LEFT JOIN imagens i USING(imagem_id)
        WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    function buscarNome($nome)
    {
        $query = "SELECT u.*, i.caminho FROM $this->tabela u
        LEFT JOIN imagens i USING(imagem_id)
        WHERE nome LIKE :nome";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':nome', "%{$nome}%", PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function paginacaoUsuarios(string $tipo = '', $valor = [])
    {
        $params = [];
        switch ($tipo) {
            case 'pesquisa':
                $query = "SELECT COUNT(*) AS total FROM $this->tabela WHERE nome LIKE :nome";
                $params[':nome'] = "%{$valor['pesquisa']}%";
                break;
            default:
                $query = "SELECT COUNT(*) AS total FROM $this->tabela";
        }

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $resultado['total'];
    }

    function update($id, $nome, $telefone, $cpf, $data, $email)
    {
        try {
            $query = "UPDATE $this->tabela 
                      SET nome = :nome, telefone = :telefone, cpf = :cpf, data_nascimento = :data, email = :email
                      WHERE usuario_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            return false;
        }
    }

    function updatesenha($id, $senha)
    {
        try {
            $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
            $query = "UPDATE $this->tabela 
                      SET senha = :senha
                      WHERE usuario_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':senha', $hashSenha);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    function calcularIdade($dataNascimento)
    {
        $dataNascimento = new DateTime($dataNascimento);
        $hoje = new DateTime();
        $idade = $hoje->diff($dataNascimento)->y;
        return $idade;
    }
    public function atualizarImagem($usuarioId, $imagemId)
    {
        if ($imagemId === null) {
            $sql = "UPDATE usuarios SET imagem_id = NULL WHERE usuario_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':id', $usuarioId, PDO::PARAM_INT);
        } else {
            $sql = "UPDATE usuarios SET imagem_id = :imagem_id WHERE usuario_id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':imagem_id', $imagemId, PDO::PARAM_INT);
            $stmt->bindValue(':id', $usuarioId, PDO::PARAM_INT);
        }

        $stmt->execute();

        // força retorno "positivo" mesmo se imagem_id já estava null
        return true;
    }


    public function salvarImagemUsuario($usuarioId, $caminho)
    {
        // 1️⃣ Salvar caminho na tabela imagens
        $sql = "INSERT INTO imagens (caminho) VALUES (:caminho)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':caminho', $caminho);
        $stmt->execute();
        $idImagem = $this->pdo->lastInsertId();

        // 2️⃣ Atualizar usuário com imagem_id
        $this->atualizarImagem($usuarioId, $idImagem);

        return $idImagem;
    }

    public function removerImagem($idUsuario)
    {
        $sql = "UPDATE usuarios SET imagem_id = NULL WHERE usuario_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
