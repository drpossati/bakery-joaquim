<?php
include 'App/Controller/PessoaController.php';

// Capturando a rota do usuário
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//Encapsulando a rota dentro do switch
switch ($url) {
    case '/':
        PessoaController::index();
        break;

    case '/pessoa':
        PessoaController::listagem();
        break;

    case '/pessoa/cadastro':
        PessoaController::cadastro();
        break;

    case '/pessoa/salvar':
        PessoaController::salvarC();
        break;
    
    case '/pessoa/delete':
        PessoaController::apagar();
        break;

    default:
        PessoaController::naoEncontrado();
        break;
}



