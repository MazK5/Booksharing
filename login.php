<?php
session_start();

$message = '';
if (isset($_GET['message']) && $_GET['message'] == 'sessione_scaduta') {
    $message = "La tua sessione è scaduta. Effettua di nuovo il login.";
}

if (isset($_SESSION['nome'])) {
    header("Location: welcome.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>

<?php if ($message) { echo "<p style='color:red;'>$message</p>"; } ?>

<form action="login_check.php" method="POST">
    <label>nome:</label>
    <input type="text" name="username" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

</body>
</html>