<?php
include "../includes/conexao.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $verificaEmail = "SELECT id FROM usuarios WHERE email = '$email'";
    $resultVerificaEmail = $conn->query($verificaEmail);

    if ($resultVerificaEmail->num_rows > 0) {
        $mensagem = "Erro: O email já está em uso. Escolha outro email.";
    } else {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $inserirUsuario = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senhaHash')";
        if ($conn->query($inserirUsuario) === TRUE) {
            $mensagem = "Cadastro bem-sucedido!";
        } else {
            $mensagem = "Erro: Não foi possível cadastrar. Tente novamente.";
        }
    }
}

$conn->close();
?>
