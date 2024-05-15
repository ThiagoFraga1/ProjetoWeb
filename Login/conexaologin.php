<?php
// Configurações do banco de dados
$servername = "localhost"; // ou o endereço do servidor MySQL
$username = "seu_usuario"; // seu nome de usuário do MySQL
$password = "sua_senha"; // sua senha do MySQL
$dbname = "cadastro_db"; // nome do banco de dados criado

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtendo os dados do formulário de login
$email = $_POST['email'];
$password = $_POST['password']; // Supondo que você criptografe a senha antes de armazená-la no banco de dados

// Consulta SQL para verificar se o usuário existe
$sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuário autenticado com sucesso
    echo "Login bem-sucedido!";
} else {
    // Falha na autenticação
    echo "Email ou senha incorretos.";
}

// Fechando a conexão
$conn->close();
?>
