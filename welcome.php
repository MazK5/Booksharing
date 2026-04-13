<?php
session_start();

$session_duration = 15 * 60;

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $session_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php?message=sessione_scaduta");
    exit;
}

$_SESSION['LAST_ACTIVITY'] = time();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Benvenuto</title>
</head>
<body>
<h2>Benvenuto <?php echo $_SESSION['nome']; ?>!</h2>
<p>Questa è una pagina protetta.</p>

<a href="logout.php">Logout</a>
</body>
</html>