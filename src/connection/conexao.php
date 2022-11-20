<?php

function abrirConexao(): PDO
{
    $Host = 'localhost';
    $UserName = 'root';
    $Password = '';
    $DataBase = 'db';

    $conexao = new PDO("mysql:host={$Host};dbname={$DataBase}", $UserName, $Password);
    return $conexao;
}
