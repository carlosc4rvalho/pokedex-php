<?php
require '../processar/recuperarSenha.php';

// Verifica a ação do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo'])) {
    // Verificar o código e redirecionar para a tela de nova senha se for válido
    if (verificarCodigoRecuperacao($_POST['codigo'], $conn)) {
        header("Location: novaSenha.php?codigo={$_POST['codigo']}");
        exit;
    } else {
        echo "Código inválido.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Recuperar Senha - Digitar Código</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Digite o Código de Recuperação</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="codigo">Código:</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required>
            </div>
            <button type="submit" class="btn btn-primary">Verificar Código</button>
        </form>
    </div>
</body>
</html>
