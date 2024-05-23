<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Formulário | João</title>
    <style>
        /* Estilos para a mensagem flash */
        .flash-message {
            position: fixed;
            top: 5%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['flash_message'])) {
        echo '<div class="flash-message alert alert-info" role="alert">' . $_SESSION['flash_message'] . '</div>';
        unset($_SESSION['flash_message']); // Limpar a mensagem da sessão para evitar exibi-la novamente
    }
    ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form action="salvar_doador.php" method="POST">
                    <fieldset>
                        <div class="d-flex justify-content-around p-2">

                            <legend class="mb-4"><b>Fórmulário de Doadores</b></legend>
                            <a href="tabela.php" class="btn btn-primary">Registro De Doadores</a>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="form-group">
                            <p>Sexo:</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="feminino" name="genero"
                                    value="feminino" required>
                                <label class="form-check-label" for="feminino">Feminino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="masculino" name="genero"
                                    value="masculino" required>
                                <label class="form-check-label" for="masculino">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="outro" name="genero" value="outro"
                                    required>
                                <label class="form-check-label" for="outro">Outro</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipo_sanguineo">Selecione seu tipo sanguíneo</label>
                            <select class="form-control" id="tipo_sanguineo" name="tipo_sanguineo" required>
                                <option value="" selected disabled>Selecione</option>
                                <option value="O Positivo">O Positivo</option>
                                <option value="O Negativo">O Negativo</option>
                                <option value="A Positivo">A Positivo</option>
                                <option value="A Negativo">A Negativo</option>
                                <option value="B Positivo">B Positivo</option>
                                <option value="B Negativo">B Negativo</option>
                                <option value="AB Positivo">AB Positivo</option>
                                <option value="AB Negativo">AB Negativo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Enviar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>