<?php
declare(strict_types=1);

function validateForm(string $nome, string $email, string $contato, string $endereco, string $cidade, string $matricula): bool
{
    if(strlen($nome) < 3){
        $mensagem = 'Nome invalido';
        include '../src/views/components/erro.phtml';
        return false;
    }

    if(strlen($email) < 3){
        $mensagem = 'Email invalido';
        include '../src/views/components/erro.phtml';
        return false;
    }

    if(strlen($contato) < 3){
        $mensagem = 'Contato invalido';
         include '../src/views/components/erro.phtml';
        return false;
    }

    if(strlen($endereco) < 3){
        $mensagem = 'Endereço invalido';
        include '../src/views/components/erro.phtml';
        return false;
    }

    if(strlen($cidade) < 3){
        $mensagem = 'Cidade invalido';
        include '../src/views/components/erro.phtml';
        return false;
    }

    if(strlen($matricula) < 1){
        $mensagem = 'Matricula invalido';
        include '../src/views/components/erro.phtml';
        return false;
    }

    return true;
}
