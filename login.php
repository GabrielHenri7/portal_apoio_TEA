<?php
include('../includes/db_connect.php');

// Recebe dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica no banco de dados
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verifica a senha
    if (password_verify($senha, $user['senha'])) {
        echo "Login bem-sucedido!";
        // Volta ou cria sessão
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}

$conn->close();
?>