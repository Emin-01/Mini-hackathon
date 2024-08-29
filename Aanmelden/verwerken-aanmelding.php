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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = htmlspecialchars($_POST['naam']);
    $email = htmlspecialchars($_POST['email']);
    $telefoon = htmlspecialchars($_POST['telefoon']);

    // SQL-query om gegevens in de database in te voegen
    $sql = "INSERT INTO aanmeldingen (naam, email, telefoon) 
            VALUES ('$naam', '$email', '$telefoon')";

    if ($conn->query($sql) === TRUE) {
        echo "Bedankt voor je aanmelding, $naam!";
    } else {
        echo "Fout bij het opslaan van de aanmelding: " . $conn->error;
    }
}

$conn->close();
?>
