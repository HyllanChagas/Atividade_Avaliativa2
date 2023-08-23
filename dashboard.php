<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

$nome = $_SESSION['nome'];


$host = "localhost";
$username = "root";
$password = "";
$database = "avali";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


$query = "SELECT * FROM avali WHERE nome='$nome'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $emailAtual = $row['email'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $novoNome = $_POST['novo_nome'];
    $novoEmail = $_POST['novo_email'];
    $novaSenha = $_POST['nova_senha'];

   
    if (strlen($novaSenha) < 8 && !empty($novaSenha)) {
        echo "A nova senha deve ter no mínimo 8 caracteres.";
    } else {
        
        $update_query = "UPDATE avali SET nome='$novoNome', email='$novoEmail', senha='$novaSenha' WHERE nome='$nome'";
        if ($conn->query($update_query) === TRUE) {
            echo "Dados atualizados com sucesso!";
            
            $_SESSION['nome'] = $novoNome;
            $nome = $novoNome;
        } else {
            echo "Erro ao atualizar dados: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color:burlywood;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 300px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 1.0);
}

form {
    display: flex;
    flex-direction: column;
}

input {
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    background-color:burlywood;
    color: white;
    border: none;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color:burlywood;
}
    </style>
    <div class="container">
    <font face="Times New Roman"><h2>Dashboard</h2></font>
    <p>Olá <?php echo $nome; ?></p>
    <form action="log.php">
        <button type="submit">Deslogar</button>
    </form>

    <h3>Editar Dados</h3>
    <form method="post" action="dashboard.php">
        <input type="text" name="novo_nome" placeholder="Novo Nome" required><br><br>
        <input type="email" name="novo_email" placeholder="Novo Email" required><br><br>
        <input type="password" name="nova_senha" placeholder="Nova Senha (opcional)"><br><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>