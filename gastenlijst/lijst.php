<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aangemelde Gasten</title>
    <link rel="stylesheet" href="../css/aanmeld.css"> <!-- Gebruik je bestaande CSS voor consistentie -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="topnav">
        <a href="../Home/homepage.php" href="homepage.php">Home</a>
        <a href="../Aanmelden/aanmeld.php">Aanmelden</a>
        <a href="../gastenlijst/lijst.php">Gasten</a>
      </div>

    <div class="container">
        <div class="content">
            <h1>Onze Gastenlijst</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>E-mailadres</th>
                    <th>Telefoonnummer</th>
                    <th>Aanmeld Datum</th>
                </tr>
                <?php
                // Database configuratie
                $servername = "localhost";
                $username = "root";  // Aanpassen indien nodig
                $password = "";      // Aanpassen indien nodig
                $dbname = "aanmeldingen";

                // Maak verbinding met de database
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Controleer de verbinding
                if ($conn->connect_error) {
                    die("Verbinding mislukt: " . $conn->connect_error);
                }

                // SQL-query om alle gasten op te halen
                $sql = "SELECT id, naam, email, telefoon, aanmeld_datum FROM aanmeldingen";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Data uit elke rij halen
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"]. "</td>
                                <td>" . $row["naam"]. "</td>
                                <td>" . $row["email"]. "</td>
                                <td>" . $row["telefoon"]. "</td>
                                <td>" . $row["aanmeld_datum"]. "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Geen gasten gevonden</td></tr>";
                }

                // Sluit de databaseverbinding
                $conn->close();
                ?>
            </table>
        </div>
    </div>

</body>
</html>
