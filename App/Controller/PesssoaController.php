<?php

include_once "/var/www/bakery-joaquim/App/Model/PessoaModel.php";

class PessoaController
{

    public static function index()
    {
        include '/var/www/bakery-joaquim/App/View/PessoaView.php';
    }

    public static function listagem()
    {
        $model = new PessoaModel();

        $linhas = $model->retornaLinhas();

        include '/var/www/bakery-joaquim/App/View/modulos/pessoa/ListaPessoa.php';
    }
    public static function cadastro()
    {
        $model = new PessoaModel();

        $id = (int) $_GET['id'];

        $linha = $model->retornarId($id);

        include '/var/www/bakery-joaquim/App/View/modulos/pessoa/FormPessoa.php';
    }

    public static function salvarC()
    {
        $model = new PessoaModel();

        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->email = $_POST['email'];
        $model->telefone = $_POST['telefone'];

        $model->salvarM();

        header("Location: /pessoa");
    }

    public static function apagar()
    {
        $model = new PessoaModel();

        $model->deletar((int) $_GET['id']);

        header("Location: /pessoa");
    }
}
