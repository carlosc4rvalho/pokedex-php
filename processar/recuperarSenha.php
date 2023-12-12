<?php
// Carrega a biblioteca PHPMailer
require '../vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pokemon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Usa as classes necessárias do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Configurações do servidor SMTP do Outlook
$smtpConfig = [
    'host' => 'smtp.office365.com',
    'auth' => true,
    'username' => 'carlos561649@outlook.com',
    'password' => '31827727Ce#',
    'secure' => 'tls',
    'port' => 587,
    'senderName' => 'Carlos Eduardo'
];

// Função para enviar e-mail usando o PHPMailer
function enviarEmail($to, $subject, $body, $config)
{
    $mail = new PHPMailer(true);

    try {
        // Configuração do PHPMailer
        $mail->isSMTP();
        $mail->Host = $config['host'];
        $mail->SMTPAuth = $config['auth'];
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        $mail->SMTPSecure = $config['secure'];
        $mail->Port = $config['port'];

        // Configuração do e-mail
        $mail->setFrom($config['username'], $config['senderName']);
        $mail->addAddress($to);

        // Configuração do título e corpo do e-mail
        $mail->Subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
        $mail->Body = $body;
        $mail->CharSet = 'UTF-8';

        // Envia o e-mail
        $mail->send();

        return true;

    } catch (Exception $e) {
        echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        error_log("Erro ao enviar e-mail: {$mail->ErrorInfo}", 0); // Adiciona ao log de erros
        return false;
    }
}

// Função para enviar código de recuperação
function enviarCodigoRecuperacao($email, $conn, $smtpConfig)
{
    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
    date_default_timezone_set('America/Sao_Paulo');
    $dia_hora = date('d/m/Y H:i:s', time());

    // Gerar código de recuperação
    $codigoRecuperacao = substr(md5(uniqid(rand(), true)), 0, 8);

    // Inserir no banco de dados
    $sql = "INSERT INTO recupera_senha (usuario, chave, dia_hora) VALUES ('$email', '$codigoRecuperacao', '$dia_hora')";
    $conn->query($sql);

    // Configurar a codificação do corpo do e-mail
    $body = "Seu código de recuperação é: $codigoRecuperacao";

    // Enviar e-mail
    return enviarEmail($email, 'Recuperação de Senha', $body, $smtpConfig);
}

function verificarCodigoRecuperacao($codigoInserido, $conn)
{
    $sql = "SELECT * FROM recupera_senha WHERE chave = '$codigoInserido'";
    $result = $conn->query($sql);

    $result = $conn->query($sql);

    if (!$result) {
        echo "Erro na consulta SQL: " . $conn->error;
    }


    // if ($result->num_rows > 0) {
    //     $row = $result->fetch_assoc();
    //     $tempoLimite = strtotime($row['dia_hora']) + (10 * 60); // 10 minutos

    //     if (time() <= $tempoLimite) {
    //         return true;
    //     }
    // }

    // return false;
}

function atualizarSenha($novaSenha, $codigo, $conn)
{
    $sql = "SELECT usuario FROM recupera_senha WHERE chave = '$codigo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $usuario = $row['usuario'];
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        $sqlUpdate = "UPDATE usuarios SET senha = '$senhaHash' WHERE email = '$usuario'";

        if ($conn->query($sqlUpdate) === TRUE) {
            return true;
        }
    }

    return false;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>