<?php
require '../processar/recuperarSenha.php';

// Verifica a ação do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['novaSenha'])) {
        // Atualizar a senha e redirecionar para onde desejar
        if (atualizarSenha($_POST['novaSenha'], $_POST['codigo'], $conn)) {
            echo "Senha atualizada com sucesso!";
            header("Location: login.php");
        } else {
            echo "Erro ao atualizar a senha.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Recuperar Senha - Nova Senha</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Defina sua Nova Senha</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="novaSenha">Nova Senha:</label>
                <input type="password" class="form-control" id="novaSenha" name="novaSenha" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Senha</button>
        </form>
    </div>
</body>
</html>
