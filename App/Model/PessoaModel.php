<?php
include 'App/DAO/PessoaDAO.php';

class PessoaModel
{
    public $id, $nome, $email, $telefone;

    public function salvarM()
    {
        // Instancia da classe PessoaDAO
        $dao = new PessoaDAO();

        if (empty($this->id)) {
            // Chamando a função insert()
            $dao->insert($this);
        } else {

            $dao->update($this);
        }
    }

    public function retornaLinhas()
    {

        $dao = new PessoaDAO();

        return $dao->select();
    }

    public function retornarId(int $id)
    {
        $dao = new PessoaDAO();

        return $dao->selectId($id);
    }

    public function deletar(int $id) {
        
        $dao = new PessoaDAO();

        $dao->delete($id);
    }
}