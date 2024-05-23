<?php
session_start();

define("DBHOST", "LocalHost");
define("DBUSERNAME", "root");
define("DBPASSWORD", "1234");
define("DBNAME", "formulario-joao");
function getConexao()
{
    $conexao = new mysqli(DBHOST, DBUSERNAME, DBPASSWORD, DBNAME);

    // Verifica a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    return $conexao;
}
