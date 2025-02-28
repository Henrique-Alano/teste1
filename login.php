<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "usuario", "senha", "site_pesquisas");

    // Verifica se o usuário existe
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND tipo = 'pesquisador'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['email'] = $email;
            $_SESSION['tipo'] = 'pesquisador';
            header("Location: dashboard.php");
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Email não encontrado ou não é um pesquisador.";
    }
}
?>
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