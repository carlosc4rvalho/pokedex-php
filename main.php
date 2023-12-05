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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Main</title>
    <script>
        const exibirFormularioEdicao = (id, nome, tipo) => {
            document.getElementById('id_pokemon_edit').value = id;
            document.getElementById('nome_pokemon_edit').value = nome;
            document.getElementById('tipo_pokemon_edit').value = tipo;

            document.getElementById('formCadastro').style.display = 'none';
            document.getElementById('formEdicao').style.display = 'block';
        }

        const exibirFormularioCadastro = () => {
            document.getElementById('formCadastro').style.display = 'block';
            document.getElementById('formEdicao').style.display = 'none';
        }
    </script>
</head>

<body>
    <main>
        <header class="d-flex justify-content-between align-items-center">
            <div>
                <h3>
                    Bem-vindo,
                    <?php echo $_SESSION["usuario_nome"]; ?>
                </h3>
            </div>
            <div>
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </header>

        <form class="d-flex flex-column gap-5" id="formCadastro" action="main.php" method="post">
            <header>
                <h3>Cadastrar Pokémon</h3>
            </header>

            <div>
                <label for="nome_pokemon">Nome do Pokémon:</label>
                <input type="text" class="form-control" id="nome_pokemon" name="nome_pokemon" required>
            </div>

            <div>
                <label for="tipo_pokemon">Tipo do Pokémon:</label>
                <input type="text" class="form-control" id="tipo_pokemon" name="tipo_pokemon" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
            </div>
        </form>

        <form id="formEdicao" action="main.php" method="post" style="display: none;">
            <header>
                <h3>Atualizar Pokémon</h3>
            </header>

            <input type="hidden" id="id_pokemon_edit" name="id_pokemon">

            <div>
                <label for="nome_pokemon_edit">Novo Nome:</label>
                <input type="text" class="form-control" id="nome_pokemon_edit" name="nome_pokemon" required>
            </div>

            <div>
                <label for="tipo_pokemon_edit">Novo Tipo:</label>
                <input type="text" class="form-control" id="tipo_pokemon_edit" name="tipo_pokemon" required>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="editar">Salvar Edição</button>
                <button type="button" class="btn btn-secondary" onclick="exibirFormularioCadastro()">Cancelar
                    Edição</button>
            </div>
        </form>

        <?php listarPokemons(); ?>
    </main>
</body>

</html>