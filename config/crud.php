<?php
include "conexao.php";

function inserirPokemon($nome, $tipo) {
    global $conn;

    $sql = "INSERT INTO pokedex (nome, tipo) VALUES ('$nome', '$tipo')";

    $conn->query($sql);
}

function atualizarPokemon($id, $nome, $tipo) {
    global $conn;

    $sql = "UPDATE pokedex SET nome='$nome', tipo='$tipo' WHERE id=$id";

    $conn->query($sql);
}

function excluirPokemon($id) {
    global $conn;

    $sql = "DELETE FROM pokedex WHERE id=$id";

    $conn->query($sql);
}

function listarPokemons() {
    global $conn;

    $sql = "SELECT * FROM pokedex";
    $result = $conn->query($sql);

    echo "<table class='table table-bordered'>
            <thead class='thead-light'>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nome"] . "</td>
                    <td>" . $row["tipo"] . "</td>
                    <td>
                        <button class='btn btn-primary' onclick='exibirFormularioEdicao(" . $row["id"] . ", \"" . $row["nome"] . "\", \"" . $row["tipo"] . "\")'>Editar</button>
                        <form action='main.php' method='post' style='display: inline;'>
                            <input type='hidden' name='id_pokemon' value='" . $row["id"] . "'>
                            <button class='btn btn-danger' type='submit' name='excluir'>Excluir</button>
                        </form>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "</tbody></table>";
        echo "<p class='text-muted'>Nenhum Pokémon encontrado na Pokédex.</p>";
    }
}
?>
