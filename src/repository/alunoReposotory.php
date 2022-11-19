<?php

declare(strict_types=1);


function novoAluno(string $nome, string $email, string $contato, string $endereco, string $cidade, string $matricula): void
{
    $select = "INSERT INTO alunos (nome, email, contato, endereco, cidade, matricula) 
        VALUES (?,?,?,?,?,?)";
    $query = abrirConexao()->prepare($select);
    $query->execute([$nome, $email, $contato, $endereco, $cidade, $matricula]);

}

function buscarAlunos(): iterable
{
    $sql = 'SELECT * FROM alunos';

    $alunos = abrirConexao()->query($sql);

    return $alunos;
}

function buscarUmAluno($id): iterable
{
    $sql = "SELECT * FROM alunos WHERE id='{$id}'";
    $aluno = abrirConexao()->query($sql);
    return $aluno->fetch(PDO::FETCH_ASSOC);
}
function atualizarAluno(string $nome, string $email, string $contato, string $endereco, string $cidade, string  $matricula, string $id): void
{
    $sql = "UPDATE alunos SET nome=?, email=?, contato=?, endereco=?, cidade=?, matricula=? WHERE id=?";
    $query = abrirConexao()->prepare($sql);
    $query->execute([$nome, $email, $contato, $endereco, $cidade, $matricula, $id]);
}

function excluirAlunos(string $id): void
{
    $sql = "DELETE FROM alunos WHERE id='{$id}'";
    abrirConexao()->query($sql);
}
