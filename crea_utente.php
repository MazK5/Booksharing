<?php
// manca controllo utente con stesso nome 
require_once 'connessione.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (nome, email, password) VALUES (:nome, :email , :password)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();

    echo "Utente creato!<br><a href='login.php'>Vai al login</a>";
    exit;
}
?>

<form method="POST">
    <label>user:</label>
    <input type="text" name="nome" required><br>
    <label>email:</label>
    <input type="email" name="email" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Crea utente">
</form>