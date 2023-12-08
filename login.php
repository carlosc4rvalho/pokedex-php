<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Form Login</title>
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
        <form class="d-flex flex-column gap-4" action="config/processarLogin.php" method="post">
            <header class="h1">Login</header>

            <input type="email" id="email" name="email" class="rounded-4 p-3 border-0 bg-light" placeholder="Exemplo@gmail.com" required>

            <input type="password" id="senha" name="senha" class="rounded-4 p-3 border-0 bg-light" placeholder="Sua senha" required>

            <div class="d-flex flex-column gap-4">
                <button class="btn btn-primary rounded-4 p-3 border-0 text-white" type="submit">Entrar</button>
                <a href="#" class="text-primary text-decoration-none">Esqueceu a senha?</a>
            </div>

            <div class="f-5">
                <p class="">Não possui uma conta?</p>
                <a href="cadastro.php" class="text-primary text-decoration-none">Cadastre-se</a>
            </div>
        </form>
    </main>
</body>

</html>
