<?php

function abrirConexao(): PDO
{
    $Host = 'localhost';
    $UserName = 'root';
    $Password = '@2018#2227';
    $DataBase = 'db';

    $conexao = new PDO("mysql:host={$Host};dbname={$DataBase}", $UserName, $Password);
    return $conexao;
}
