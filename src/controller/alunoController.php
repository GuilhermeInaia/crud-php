<?php

// defenindo que nesse arquivo será trabalhado os tipos de dados
declare(strict_types=1);

function redenrizar(string $nomeDoArquivo, mixed $dados = null)
{
    include '../src/views/head.phtml';
    include "../src/views/{$nomeDoArquivo}.phtml";
    $dados;
    include '../src/views/foot.phtml';
}

function redirecionar(string $onde)
{
    header("location: {$onde}");
}

function inicio(): void // estamos declarando que essa função "não tem retorno
{
    redenrizar("inicio");
}
function listar(): void
{
    $alunos = buscarAlunos();
    redenrizar("listar", $alunos);
}
function excluir()
{
    $id = $_GET['id']; // recuperando o id que esta na url
    excluirAlunos($id); //pedindo ao repository pra excluir o aluno(não sabemos)
    redirecionar('/listar'); // redirecionando pra pagina listar
}

function novo(): void
{
    redenrizar("novo");
    //se o usuario preencheu o formulario vai entrar nesse if, o trim retira os espaços dirieta e esquerda
    if (false === empty($_POST)) {
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $contato = trim($_POST['contato']);
        $endereco = trim($_POST['endereco']);
        $cidade = trim($_POST['cidade']);
        $matricula = trim($_POST['matricula']);

        if (true === validateForm($nome, $email, $contato, $endereco, $cidade, $matricula)) {
            novoAluno($nome, $email, $contato, $endereco, $cidade, $matricula);
            redirecionar('/listar');
        }
    }
}

function editar(): void
{
    $id = $_GET["id"];
    $aluno = buscarUmAluno($id);
    redenrizar("editar", $aluno);
    if (false === empty($_POST)) {
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $contato = trim($_POST['contato']);
        $endereco = trim($_POST['endereco']);
        $cidade = trim($_POST['cidade']);
        $matricula = trim($_POST['matricula']);

        if (true === validateForm($nome, $email, $contato, $endereco, $cidade, $matricula)) {
            atualizarAluno($nome, $email, $contato, $endereco, $cidade, $matricula, $id);
            redirecionar('/listar');
        }
    }
}
