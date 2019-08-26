<?php

$host = "localhost"; //Host
$user = "root";//Nome de usuario do banco de dados
$pass = ""; //Senha do banco de dados
$db   = "social_look"; //Banco de Dados

//conexao

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);