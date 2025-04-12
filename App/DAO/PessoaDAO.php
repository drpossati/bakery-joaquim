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
        $sql = "SELECT * FROM pessoa";

        $stmt = $this->acesso_banco->prepare($sql);
        $stmt->execute();

        // array de objetos
        return $stmt->fetchAll(PDO::FETCH_CLASS);

    }

    public function insert(PessoaModel $model)
    {
        $sql = "INSERT INTO pessoa (nome, email, telefone) VALUES (?, ?, ?)";

        $stmt = $this->acesso_banco->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->telefone);

        $stmt->execute();

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
        $sql = "UPDATE pessoa SET nome = ?, email = ?, telefone = ? WHERE id = ?" ;

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