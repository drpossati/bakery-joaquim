<?php

class PessoaDAO
{
    private $acesso_banco;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost:3306; dbname=bakery_joaquim';

        try {

            $this->acesso_banco = new PDO($dsn, 'possati', '123456');

        } catch (PDOException $e) {

            //Tratando o erro
            die('Erro de Conexão: ' . $e->getMessage());
        }

    }

    public function select()
    {
        $sql = "SELECT pessoa.nome as nome, pessoa.email as email, pessoa.telefone as telefone, user.senha_hash as senha FROM pessoa INNER JOIN user ON pessoa.id = user.pessoa_id"; 

        $stmt = $this->acesso_banco->prepare($sql);
        $stmt->execute();

        // array de objetos
        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    // Função para gerar salt aleatório
    private function gerarSalt($length = 64)
    {
        return bin2hex(random_bytes($length / 2));
    }

    // Função para gerar hash SHA-512 da senha
    private function gerarHash($salt, $senha)
    {
        return hash('sha512', $senha . $salt);
    }

    public function insert(PessoaModel $model)
    {
        /* Usando transações para salvar dados em duas tabelas diferentes */
        try {

            //Inicio da transação
            $this->acesso_banco->beginTransaction();

            // Insert tabela pessoa

            $sql_pessoa = "INSERT INTO pessoa (nome, email, telefone) VALUES (?, ?, ?)";

            $stmt_pessoa = $this->acesso_banco->prepare($sql_pessoa);

            $stmt_pessoa->bindValue(1, $model->nome);
            $stmt_pessoa->bindValue(2, $model->email);
            $stmt_pessoa->bindValue(3, $model->telefone);

            $stmt_pessoa->execute();

            // Obtém o id do último registro inserido em pessoa
            $pessoa_id = $this->acesso_banco->lastInsertId();

            $sql_user = "INSERT INTO user (pessoa_id, senha_hash, salt) VALUES (?, ?, ?)";

            $salt = $this->gerarSalt();
            $senha_hash = $this->gerarHash($salt, $model->senha);

            $stmt_user = $this->acesso_banco->prepare($sql_user);
            $stmt_user->bindValue(1, $pessoa_id);
            $stmt_user->bindValue(2, $senha_hash);
            $stmt_user->bindValue(3, $salt);

            $stmt_user->execute();

            // Confirma as alterações no banco de dados
            $this->acesso_banco->commit();

        } catch (PDOException $e) {
            // Em caso de erro, reverte tudo
            $this->acesso_banco->rollBack();
            echo "Erro: " . $e->getMessage();
        }
    }

    public function selectId(int $id)
    {
        $sql = "SELECT * FROM pessoa WHERE id = ?";

        $stmt = $this->acesso_banco->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        // array de elementos associados
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(PessoaModel $model)
    {
        $sql = "UPDATE pessoa SET nome = ?, email = ?, telefone = ? WHERE id = ?";

        $stmt = $this->acesso_banco->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->id);

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ?";

        $stmt = $this->acesso_banco->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}