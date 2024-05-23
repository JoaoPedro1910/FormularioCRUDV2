<?php

require_once 'config.php';
$conexao = getConexao();

if ($conexao->connect_error) {
    die('Conexão falhou: ' . $conexao->connect_error);
}

// Obtém o ID do registro a ser excluído
$id = $_GET['id'];

// Prepara a query SQL para excluir o registro
$sql = "DELETE FROM doadores WHERE id = $id";

// Executa a query
if ($conexao->query($sql) === TRUE) {
    echo "Registro excluído com sucesso!";
} else {
    echo "Erro ao excluir o registro: " . $conexao->error;
}

if ($conexao->query($sql) === TRUE) {
    $_SESSION['flash_message'] = "Registro deletado com sucesso!";
} else {
    $_SESSION['flash_message'] = "Erro: " . $sql . "<br>" . $conexao->error;
}
// Fecha a conexão com o banco de dados
$conexao->close();
header("Location: tabela.php");
exit();


