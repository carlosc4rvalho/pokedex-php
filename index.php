<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            height: 100vh;
        }

        .btn-primary {
            background-color: green !important;
        }

        .bg-light {
            background-color: aliceblue !important;
        }

        button:hover {
            opacity: .8;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center bg-light fs-5">
    <main class="bg-white rounded-4 p-4">



        <form action="processar_cadastro.php" method="POST" class="d-flex flex-column gap-4">
            <header class="h1">Cadastro</header>

            <input type="text" id="nome" name="nome" class="rounded-4 p-3 border-0 bg-light" placeholder="🙎Nome" required>

            <input type="email" id="email" name="email" class="rounded-4 p-3 border-0 bg-light" placeholder="✉️ Email" required>

            <input type="password" id="senha" name="senha" class="rounded-4 p-3 border-0 bg-light" placeholder="Sua senha" required>

            <button class="btn btn-primary rounded-4 p-3 border-0 text-white" type="submit" name="cadastrar">Cadastrar</button>

            <div class="f-5">
                <p class="">Já possui uma conta?</p>
                <a href="login.php" class="text-primary text-decoration-none">Entrar</a>
            </div>
        </form>
    </main>

</body>
<!-- <body class="container d-flex align-items-center justify-content-center bg-secondary text-light" style="height: 100vh;">
    <div class="col-md-6 bg-dark rounded p-4">
        <h1 class="mb-3 bg-success rounded p-4" style="text-align: center">Cadastro de Usuário</h1>
        <form action="processar_cadastro.php" method="POST">
            <div class="mb-3 bg-secondary rounded p-2">
                <label for="nome" class="form-label">🙎Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3 bg-secondary rounded p-2">
                <label for="email" class="form-label">✉️ Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 bg-secondary rounded p-2">
                <label for="senha" class="form-label">🔒 Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-success" style="display: flex; justify-content: center; align-items: center;">Cadastrar-se 📝</button>
            <p class="mt-5">Já tem uma conta? <a href="login.php" class="text-info">👉Faça login aqui👈</a></p>


        </form>

</body> -->

</html>