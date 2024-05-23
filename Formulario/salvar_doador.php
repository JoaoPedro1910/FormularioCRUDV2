<?php
require_once 'config.php';
$conexao = getConexao();

if ($conexao->connect_error) {
    die('Conexão falhou: ' . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $email = $conexao->real_escape_string($_POST['email']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $sexo = $conexao->real_escape_string($_POST['genero']);
    $tipo_sanguineo = $conexao->real_escape_string($_POST['tipo_sanguineo']);
    $data_nascimento = $conexao->real_escape_string($_POST['data_nascimento']);
    $cidade = $conexao->real_escape_string($_POST['cidade']);
    $estado = $conexao->real_escape_string($_POST['estado']);
    $endereco = $conexao->real_escape_string($_POST['endereco']);

    $sql = "INSERT INTO doadores (nome, email, telefone, sexo, tipo_sanguineo, data_nasc, cidade, estado, endereco)
            VALUES ('$nome', '$email', '$telefone', '$sexo', '$tipo_sanguineo', '$data_nascimento', '$cidade', '$estado', '$endereco')
            ON DUPLICATE KEY UPDATE
            nome = VALUES(nome),
            telefone = VALUES(telefone),
            sexo = VALUES(sexo),
            tipo_sanguineo = VALUES(tipo_sanguineo),
            data_nasc = VALUES(data_nasc),
            cidade = VALUES(cidade),
            estado = VALUES(estado),
            endereco = VALUES(endereco)";

    if ($conexao->query($sql) === TRUE) {
        $_SESSION['flash_message'] = "Registro salvo com sucesso!";
    } else {
        $_SESSION['flash_message'] = "Erro: " . $sql . "<br>" . $conexao->error;
    }

    header("Location: index.php");
    exit();
}

$conexao->close();
