<?php
include "../includes/conexao.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            session_start();
            $_SESSION["usuario_id"] = $row["id"];
            $_SESSION["usuario_nome"] = $row["nome"];
            header("Location: /carlos/pages/main.php");
            exit();
        } else {
            header("Location: login.html?erro=senha");
            exit();
        }
    } else {
        header("Location: login.html?erro=email");
        exit();
    }
}

$conn->close();
?>
