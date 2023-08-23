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
    <?php

$host = "localhost";
$username = "root";
$password = "";
$database = "avali";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confsenha = $_POST['confsenha'];

if (strlen($senha) < 8) {
    die("A senha deve ter no mínimo 8 caracteres.");
}

$query = "SELECT * FROM avali WHERE nome='$nome' OR email='$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    die("Nome de usuário ou email já cadastrado.");
}

$insert_query = "INSERT INTO avali (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conn->query($insert_query) === TRUE) {
    echo "Cadastro efetuado com sucesso!";
    ?>
<a href="log.php"><button type="submit">Fazer login</button></a><?php

} else {
    echo "Erro ao cadastrar usuário: " . $conn->error;
}

$conn->close();
?>
    </div>
</body>
</html>