<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

include "config/conexao.php";
include "config/crud.php";

// Lógica para processar o cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastrar"])) {
    $nomePokemon = $_POST["nome_pokemon"];
    $tipoPokemon = $_POST["tipo_pokemon"];

    inserirPokemon($nomePokemon, $tipoPokemon);
}

// Lógica para processar a edição
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
    $idPokemon = $_POST["id_pokemon"];
    $nomePokemon = $_POST["nome_pokemon"];
    $tipoPokemon = $_POST["tipo_pokemon"];

    atualizarPokemon($idPokemon, $nomePokemon, $tipoPokemon);
}

// Lógica para processar a exclusão
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
    $idPokemon = $_POST["id_pokemon"];

    excluirPokemon($idPokemon);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Main</title>
    <script>
        const exibirFormularioEdicao = (id, nome, tipo) => {
            document.getElementById('id_pokemon_edit').value = id;
            document.getElementById('nome_pokemon_edit').value = nome;
            document.getElementById('tipo_pokemon_edit').value = tipo;

            document.getElementById('formCadastro').classList.add('d-none');
            document.getElementById('formEdicao').classList.remove('d-none');
        }

        const exibirFormularioCadastro = () => {
            document.getElementById('formCadastro').classList.remove('d-none');
            document.getElementById('formEdicao').classList.add('d-none');
        }
    </script>
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

<body class="d-flex flex-column justify-content-center align-items-center bg-light fs-5">
    <!-- <header class="d-flex gap-5">
        <div>
            <h3>
                Bem-vindo,
                <?php echo $_SESSION["usuario_nome"]; ?>
            </h3>
        </div>
        <div>
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </header> -->

    <div class="d-flex justify-content-center w-100 gap-5">

        <div>

            <form class="d-flex flex-column gap-4" id="formCadastro" action="main.php" method="post">
                <header>
                    <h3>Cadastrar Pokémon</h3>
                </header>

                <div>
                    <input type="text" class="rounded-4 p-3 border-0 bg-white" placeholder="Nome do pokemon"
                        id="nome_pokemon" name="nome_pokemon" required>
                </div>

                <div>
                    <input type="text" class="rounded-4 p-3 border-0 bg-white" placeholder="Seu tipo" id="tipo_pokemon"
                        name="tipo_pokemon" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary rounded-4 p-3 border-0 text-white w-100"
                        name="cadastrar">Cadastrar</button>
                </div>
            </form>

            <form class="d-flex flex-column gap-4 d-none" id="formEdicao" action="main.php" method="post">
                <header>
                    <h3>Atualizar Pokémon</h3>
                </header>

                <input type="hidden" id="id_pokemon_edit" name="id_pokemon">

                <div>
                    <input type="text" class="rounded-4 p-3 border-0 bg-white" placeholder="Nome do pokemon"
                        id="nome_pokemon_edit" name="nome_pokemon" required>
                </div>

                <div>
                    <input type="text" class="rounded-4 p-3 border-0 bg-white" placeholder="Seu Tipo"
                        id="tipo_pokemon_edit" name="tipo_pokemon" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary rounded-4 p-3 border-0 text-white" name="editar">Salvar
                        Edição</button>
                    <button type="button" class="btn btn-danger rounded-4 p-3 border-0 text-white"
                        onclick="exibirFormularioCadastro()">Cancelar
                        Edição</button>
                </div>
            </form>
        </div>

        <div>
            <?php listarPokemons(); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>