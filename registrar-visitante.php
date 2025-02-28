<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "usuario", "senha", "site_pesquisas");

    // Verifica se o email já existe
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows == 0) {
        // Insere o visitante no banco de dados
        $query = "INSERT INTO usuarios (email, tipo) VALUES ('$email', 'visitante')";
        if ($conn->query($query) {
            $_SESSION['email'] = $email;
            $_SESSION['tipo'] = 'visitante';
            header("Location: index.html"));
        } else {
            echo "Erro ao registrar visitante.";
        }
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['tipo'] = 'visitante';
        header("Location: index.html");
    }
}
?>