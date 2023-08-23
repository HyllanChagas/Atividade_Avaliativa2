<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
<font face="Times New Roman"><h2>Login</h2></font>
    <form method="post" action="pro_log.php">
        <input type="text" name="nome" placeholder="Nome" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <button type="submit">Login</button>
    </form>
    <a href="cad.php"><button type="submit">Cadastrar</button></a>
</div>
    
</body>
</html>
