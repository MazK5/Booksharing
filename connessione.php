<?php
$servername = "localhost";
$dbname = "booksharing"; 
$userDB = "root";
$passwordDB = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $userDB, $passwordDB);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connessione fallita: " . $e->getMessage());
}
?>