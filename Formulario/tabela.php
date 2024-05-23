<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Nomes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styletabela.css">
</head>

<body>
    <div class="container">
        <div>

            <div class="d-flex justify-content-between p-5 align-items-center">
                <h2>Registro de Doadores</h2>
                <a href="index.php" class="btn btn-primary">Formulário</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Sexo</th>
                        <th>Tipo Sanguíneo</th>
                        <th>Data de Nascimento</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Endereço</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'config.php';
                    $conexao = getConexao();

                    if ($conexao->connect_error) {
                        die('Conexão falhou: ' . $conexao->connect_error);
                    }
                    // Consulta SQL para selecionar os nomes
                    $sql = "SELECT * FROM doadores";
                    $resultado = $conexao->query($sql);
                    // Verifica se há resultados
                    if ($resultado->num_rows > 0) {
                        // Exibe os resultados em uma tabela
                        $contador = 1;
                        while ($row = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $contador . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['telefone'] . "</td>";
                            echo "<td>" . $row['sexo'] . "</td>";
                            echo "<td>" . $row['tipo_sanguineo'] . "</td>";
                            echo "<td>" . $row['data_nasc'] . "</td>";
                            echo "<td>" . $row['cidade'] . "</td>";
                            echo "<td>" . $row['estado'] . "</td>";
                            echo "<td>" . $row['endereco'] . "</td>";
                            echo '<td><a id="" href="editar_doador.php?id=' . $row['id'] . '" class="btn btn-warning">Editar</button></td>';
                            echo '<td><button id="" idDoador="' . $row['id'] . '" class="btn btn-danger" onclick="confirmarExclusao(' . $row['id'] . ')">Excluir</button></td>';
                            echo "</tr>";
                            $contador++;
                        }
                    } else {
                        echo "<tr><td colspan='10'>Nenhum Doador encontrado.</td></tr>";
                    }

                    // Fecha a conexão com o banco de dados
                    $conexao->close();
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Inclua os arquivos de Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function confirmarExclusao(id) {
                if (confirm("Tem certeza que deseja excluir este registro?")) {
                    // Se o usuário confirmar, redireciona para a página de exclusão
                    window.location.href = "deletar_doador.php?id=" + id;
                }
            }
        </script>
</body>

</html>