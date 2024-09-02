<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanmelden</title>
    <link rel="stylesheet" href="../css/aanmeld.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>

<div class="topnav">
        <img src="../Tech.png" class="logo" alt="">
        <a class="active" href="../Home/homepage.html">Home</a>
        <a href="../Aanmelden/aanmeld.php">Aanmelden</a>
        <a href="../Gasten/gasten.php">Gasten</a>
      </div>

    <div class="container">
        <div class="acontent">
            <h1>Meld je aan voor het technofeest!</h1>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

                    // Haal de gegevens uit het formulier
                    $naam = htmlspecialchars($_POST['naam']);
                    $email = htmlspecialchars($_POST['email']);
                    $telefoon = htmlspecialchars($_POST['telefoon']);

                    // SQL-query om gegevens in de database in te voegen
                    $sql = "INSERT INTO aanmeldingen (naam, email, telefoon) 
                            VALUES ('$naam', '$email', '$telefoon')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Bedankt voor je aanmelding, $naam!</p>";
                    } else {
                        echo "<p>Fout bij het opslaan van de aanmelding: " . $conn->error . "</p>";
                    }

                    // Sluit de databaseverbinding
                    $conn->close();
                }
            ?>
            <form action="aanmeld.php" method="POST" class="signup-form">
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" required>
                
                <label for="email">E-mailadres:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="telefoon">Telefoonnummer:</label>
                <input type="tel" id="telefoon" name="telefoon" required>
                
                <button type="submit">Aanmelden</button>
            </form>
        </div>
    </div>

    <footer>
        <div class="footerContainer">
            <div class="footerNav">
                <ul><li><a href="../Home/homepage.html">Home</a></li>
                    <li><a href="../Aanmelden/aanmeld.php">Aanmelden</a></li>
                    <li><a href="../Gasten/gasten.php">Gasten</a></li>
                </ul>
            </div>
            
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024; Designed by <span class="designer">TechNeon</span></p>
        </div>
    </footer>
</body>
</html>
