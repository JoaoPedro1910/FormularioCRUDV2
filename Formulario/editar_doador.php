<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Formulário | João</title>
</head>

<body>
    <?php
    require_once 'config.php';
    if (isset($_GET['id'])) {
        $conexao = getConexao();
        $id = intval($_GET['id']); // Garantir que o id seja um número inteiro
        $sql = "SELECT * FROM doadores WHERE id = $id";
        $resultado = $conexao->query($sql);

        if ($resultado && $resultado->num_rows > 0) {
            $doador = $resultado->fetch_assoc();
            ?>

            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="salvar_doador.php" method="POST">
                            <fieldset>
                                <legend class="mb-4"><b>Fórmulário de Doadores</b></legend>
                                <div class="form-group">
                                    <label for="nome">Nome completo</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                        value="<?php echo htmlspecialchars($doador['nome']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo htmlspecialchars($doador['email']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="tel" class="form-control" id="telefone" name="telefone"
                                        value="<?php echo htmlspecialchars($doador['telefone']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <p>Sexo:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="feminino" name="genero"
                                            value="feminino" <?php echo ($doador['sexo'] == 'feminino') ? 'checked' : ''; ?>
                                            required>
                                        <label class="form-check-label" for="feminino">Feminino</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="masculino" name="genero"
                                            value="masculino" <?php echo ($doador['sexo'] == 'masculino') ? 'checked' : ''; ?>
                                            required>
                                        <label class="form-check-label" for="masculino">Masculino</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="outro" name="genero" value="outro"
                                            <?php echo ($doador['sexo'] == 'outro') ? 'checked' : ''; ?> required>
                                        <label class="form-check-label" for="outro">Outro</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tipo_sanguineo">Selecione seu tipo sanguíneo</label>
                                    <select class="form-control" id="tipo_sanguineo" name="tipo_sanguineo" required>
                                        <option value="" selected disabled>Selecione</option>
                                        <option value="O Positivo" <?php echo ($doador['tipo_sanguineo'] == 'O Positivo') ? 'selected' : ''; ?>>O Positivo</option>
                                        <option value="O Negativo" <?php echo ($doador['tipo_sanguineo'] == 'O Negativo') ? 'selected' : ''; ?>>O Negativo</option>
                                        <option value="A Positivo" <?php echo ($doador['tipo_sanguineo'] == 'A Positivo') ? 'selected' : ''; ?>>A Positivo</option>
                                        <option value="A Negativo" <?php echo ($doador['tipo_sanguineo'] == 'A Negativo') ? 'selected' : ''; ?>>A Negativo</option>
                                        <option value="B Positivo" <?php echo ($doador['tipo_sanguineo'] == 'B Positivo') ? 'selected' : ''; ?>>B Positivo</option>
                                        <option value="B Negativo" <?php echo ($doador['tipo_sanguineo'] == 'B Negativo') ? 'selected' : ''; ?>>B Negativo</option>
                                        <option value="AB Positivo" <?php echo ($doador['tipo_sanguineo'] == 'AB Positivo') ? 'selected' : ''; ?>>AB Positivo</option>
                                        <option value="AB Negativo" <?php echo ($doador['tipo_sanguineo'] == 'AB Negativo') ? 'selected' : ''; ?>>AB Negativo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                        value="<?php echo htmlspecialchars($doador['data_nasc']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade"
                                        value="<?php echo htmlspecialchars($doador['cidade']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado"
                                        value="<?php echo htmlspecialchars($doador['estado']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco"
                                        value="<?php echo htmlspecialchars($doador['endereco']); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-danger">Enviar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        } else {
            echo "<div class='container mt-5'><div class='alert alert-danger'>Doador não encontrado.</div></div>";
        }
    } else {
        echo "<div class='container mt-5'><div class='alert alert-danger'>ID não especificado.</div></div>";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>