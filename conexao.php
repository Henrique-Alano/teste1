<?php
$host = "localhost"; // Endereço do servidor MySQL
$usuario = "root"; // Nome de usuário do MySQL (no XAMPP é "root")
$senha = ""; // Senha do MySQL (no XAMPP a senha padrão é vazia)
$banco = "site_pesquisas"; // Nome do banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>