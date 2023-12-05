<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Form Cadastro</title>
</head>

<body>
    <?php
    include "config/processarCadastro.php";
    
    if ($mensagem != "") {
        echo "<p style='color: " . ($mensagem == "Cadastro bem-sucedido!" ? "green" : "red") . ";'>$mensagem</p>";
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <header>Cadastro</header>
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
</body>

</html>