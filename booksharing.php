<?php
    require_once 'connessione.php';

    $query ="SELECT * FROM libro";
    $result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>booksharing </title>
    </head>
    <body>
        <h1> Booksharing </h1>   

        <form action="login.php" method="GET">
            <input type="submit" value="Login">
        </form>

        <a href="crea_utente.php">
            <button type="button">New Account</button>
        </a>

        <br>

        <form action=".php" method="POST">
            <label>titolo libro:</label>
            <input type="text" name="titolo" required><br><br>

            <input type="submit" value="Cerca ">
        </form>

        <?php
            // Mostra tutti i libri
            echo "<h2> Tutti i libri disponibili: </h2>";
            while($row = $result->fetch(PDO::FETCH_OBJ)) {
                echo "<div>";
                echo "<p>" . htmlspecialchars($row->id_libro) . " ";
                echo  htmlspecialchars($row->titolo) . " ";
                echo  htmlspecialchars($row->autore) . "</p>";
                echo "</div>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // Controlla se ci sono risultati
    if($result->rowCount() == 0) {
        echo "<p>Nessun libro trovato nel database.</p>";
    }
    ?>




    </body>
</html>