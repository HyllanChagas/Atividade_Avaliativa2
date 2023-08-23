<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
 </style>
    <div class="container">
    <?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "avali";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$query = "SELECT * FROM avali WHERE nome='$nome' AND senha='$senha'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $_SESSION['nome'] = $nome;
    header("Location: dashboard.php");
} else {
    echo "Credenciais inválidas.";
}

$conn->close();
?>
    </div>
</body>
</html>