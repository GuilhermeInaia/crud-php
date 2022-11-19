<?php

$rota = explode('?', $_SERVER['REQUEST_URI']);
$rota = $rota[0];

// usando o require_once pq esse arquivo é importante, e não pode ser duplicado
require_once '../src/controller/alunoController.php';
require_once '../src/connection/conexao.php';
require_once '../src/repository/alunoReposotory.php';
require_once '../src/validation/alunoValidator.php';

$paginas = [
    '/' => 'inicio',
    '/listar' => 'listar',
    '/novo' => 'novo',
    '/editar' => 'editar',
    '/excluir' => 'excluir',
];

include '../src/views/menu.phtml';

if (false === isset($paginas[$rota])){
    echo '../srs/controller/erro404.phtml';
    exit;
};

echo $paginas[$rota](); //inicio