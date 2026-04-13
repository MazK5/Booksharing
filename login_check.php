<?php
session_start();
require_once 'connessione.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM user WHERE nome = :nome");
        $stmt->bindParam(':nome', $username);
        $stmt->execute();

        $nome = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($nome && password_verify($password, $nome['password'])) {
            $_SESSION['nome'] = $nome['nome'];
            $_SESSION['LAST_ACTIVITY'] = time(); 
            header("Location: welcome.php");
            exit;
        } else {
            echo "username o password errati.";
            echo '<br><a href="login.php">Torna al login</a>';
        }

    } catch(PDOException $e) {
        die("Errore connessione: " . $e->getMessage());
    }

} else {
    header("Location: login.php");
    exit;
}
?>