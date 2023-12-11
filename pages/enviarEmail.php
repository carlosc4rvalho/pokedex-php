<?php
require '../processar/recuperarSenha.php';

// Verifica a ação do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        // Chamando a função para enviar um código de recuperação
        enviarCodigoRecuperacao($_POST['email'], $conn, $smtpConfig);
        // Mensagem de depuração
        echo "Código enviado para o e-mail.";
        // Redirecionar para a tela de digitar código
        header("Location: verificarCodigo.php");
        exit;
    } else {
        // Mensagem de depuração
        echo "E-mail não definido no formulário.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Recuperar Senha - Digitar E-mail</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Digite seu E-mail</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Código</button>
        </form>
    </div>
</body>
</html>
