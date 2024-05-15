<?php
// Configurações do banco de dados
$servername = "localhost"; // ou o endereço do servidor MySQL
$username = "root"; // seu nome de usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "cadastro_db"; // nome do banco de dados criado

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtendo os dados do formulário de registro
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password']; // Nota: não é uma prática segura salvar senhas em texto plano, use criptografia
$birthday = $_POST['birthday'];

// Preparando a consulta SQL para inserção de dados
$sql = "INSERT INTO usuarios (fullname, email, password, birthday)
VALUES ('$fullname', '$email', '$password', '$birthday')";

if ($conn->query($sql) === TRUE) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
