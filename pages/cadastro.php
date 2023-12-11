<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Form Cadastro</title>
</head>

<style>
    body {
        height: 100vh;
    }

    .btn-primary {
        background-color: blue !important;
    }

    .bg-light {
        background-color: aliceblue !important;
    }

    button:hover {
        opacity: .8;
    }
</style>

<body class="d-flex justify-content-center align-items-center bg-light fs-5">
    <main class="bg-white rounded-4 p-4">
        <?php
        include "../processar/processarCadastro.php";

        if ($mensagem != "") {
            echo "<p style='color: " . ($mensagem == "Cadastro bem-sucedido!" ? "blue" : "red") . ";'>$mensagem</p>";
        }
        ?>

        <form class="d-flex flex-column gap-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            method="post">
            <header class="h1">Cadastro</header>

            <input type="text" id="nome" name="nome" class="rounded-4 p-3 border-0 bg-light" placeholder="Seu nome"
                required>

            <input type="email" id="email" name="email" class="rounded-4 p-3 border-0 bg-light" placeholder="Seu email"
                required>

            <input type="password" id="senha" name="senha" class="rounded-4 p-3 border-0 bg-light"
                placeholder="Sua senha" required>

            <button class="btn btn-primary rounded-4 p-3 border-0 text-white" type="submit"
                name="cadastrar">Cadastrar</button>

            <div class="f-5">
                <p class="">Já possui uma conta?</p>
                <a href="login.php" class="text-primary text-decoration-none">Entrar</a>
            </div>
        </form>
    </main>
</body>

</html>