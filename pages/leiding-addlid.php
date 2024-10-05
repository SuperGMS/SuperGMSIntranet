<?php
// Check if user has access
if ($leiding != 1) {
    echo 'Geen toegang!';
    exit; // It's good to stop the script if there's no access
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['voegLidToe'])) {

    // Include database connection
    include_once("class.database.php");

    // Prepare and sanitize form inputs
    $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
    $achternaam = filter_input(INPUT_POST, 'achternaam', FILTER_SANITIZE_STRING);
    $leeftijd = filter_input(INPUT_POST, 'leeftijd', FILTER_SANITIZE_NUMBER_INT);
    $geboortedatum = filter_input(INPUT_POST, 'geboortedatum', FILTER_SANITIZE_STRING); // You may want to validate the date format separately
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefoon = filter_input(INPUT_POST, 'telefoon', FILTER_SANITIZE_STRING);
    $eenheid = filter_input(INPUT_POST, 'eenheid', FILTER_SANITIZE_STRING);
    $roepnummer = filter_input(INPUT_POST, 'roepnummer', FILTER_SANITIZE_STRING);
    $reserve_centralist = filter_input(INPUT_POST, 'reserve_centralist', FILTER_SANITIZE_NUMBER_INT);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
    $specialisatie = filter_input(INPUT_POST, 'specialisatie', FILTER_SANITIZE_STRING);
    $ingewerkt = filter_input(INPUT_POST, 'ingewerkt', FILTER_SANITIZE_NUMBER_INT);
    $porto = filter_input(INPUT_POST, 'porto', FILTER_SANITIZE_NUMBER_INT);
    $opgesprek = filter_input(INPUT_POST, 'opgesprek', FILTER_SANITIZE_NUMBER_INT);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validate required fields
    if ($naam && $achternaam && $leeftijd && $geboortedatum && $email && $username && $password) {

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data using PDO prepared statements
        $sql = "INSERT INTO leden 
                    (naam, achternaam, leeftijd, geboortedatum, email, telefoon, eenheid, roepnummer, reserve_centralist, status, specialisatie, ingewerkt, porto, opgesprek, username, password)
                VALUES 
                    (:naam, :achternaam, :leeftijd, :geboortedatum, :email, :telefoon, :eenheid, :roepnummer, :reserve_centralist, :status, :specialisatie, :ingewerkt, :porto, :opgesprek, :username, :password)";
        $stmt = $db->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->bindParam(':leeftijd', $leeftijd);
        $stmt->bindParam(':geboortedatum', $geboortedatum);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefoon', $telefoon);
        $stmt->bindParam(':eenheid', $eenheid);
        $stmt->bindParam(':roepnummer', $roepnummer);
        $stmt->bindParam(':reserve_centralist', $reserve_centralist);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':specialisatie', $specialisatie);
        $stmt->bindParam(':ingewerkt', $ingewerkt);
        $stmt->bindParam(':porto', $porto);
        $stmt->bindParam(':opgesprek', $opgesprek);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        // Execute query
        if ($stmt->execute()) {
            echo "Lid succesvol toegevoegd!";
        } else {
            echo "Er is een fout opgetreden bij het toevoegen van het lid.";
        }
    } else {
        echo "Vul alle verplichte velden in.";
    }
}
?>

<style>
    .form-control-input {
        width: 100%;
        height: 40px;
        padding-left: 15px;
        border-radius: 10px;
        background: lightgray;
        font-family: 'Poppins';
        font-size: 15px;
        font-weight: 600;
    }

    .form-label-input {
        display: block;
        text-align: left;
        margin-left: 1%;
        margin-bottom: 0.5%;
    }
</style>

<h1>Voeg lid toe</h1>

<form id="voegLidToe" action="" method="POST">
    <div class="recent-orders">
        <table class="table">
            <th>
                <h2 style="text-align:center">Persoonsgegevens</h2>
                <div class="form-group">
                    <label for="naam" class="form-label-input">Naam:</label>
                    <input type="text" name="naam" class="form-control-input" required />
                </div>
                <br />
                <div class="form-group">
                    <label for="achternaam" class="form-label-input">Achternaam:</label>
                    <input type="text" name="achternaam" class="form-control-input" required />
                </div>
                <br />

                <div class="form-group">
                    <label for="leeftijd" class="form-label-input">Leeftijd:</label>
                    <input type="text" name="leeftijd" class="form-control-input" required />
                </div>
                <br />

                <div class="form-group">
                    <label for="geboortedatum" class="form-label-input">Geboortedatum:</label>
                    <input type="text" name="geboortedatum" class="form-control-input" required />
                </div>

                <br />
                <div class="form-group">
                    <label for="email" class="form-label-input">E-mail:</label>
                    <input type="text" name="email" class="form-control-input" required />
                </div>

                <br />
                <div class="form-group">
                    <label for="telefoon" class="form-label-input">Telefoon:</label>
                    <input type="text" name="telefoon" class="form-control-input" />
                </div>
                <br />
                <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                <h2 style="text-align:center">Clan gerelateerd</h2>
                <div class="form-group">
                    <label class="form-label-input">Eenheid</label>
                    <select name="eenheid" class="form-control-input">
                        <option value="Politie">Politie</option>
                        <option value="Handhaving">Handhaving</option>
                        <option value="Koninklijke Marechaussee">Koninklijke Marechaussee</option>
                        <option value="Brandweer">Brandweer</option>
                        <option value="Ambulance">Ambulance</option>
                        <option value="Meldkamer">Meldkamer</option>
                        <option value="Zadkine Veiligheidsacademie">Zadkine Veiligheidsacademie</option>
                    </select>
                </div>
                <br />

                <div class="form-group">
                    <label for="roepnummer" class="form-label-input">Roepnummer:</label>
                    <input type="text" name="roepnummer" class="form-control-input" />
                </div>
                <br />

                <div class="form-group">
                    <label for="reserve_centralist" class="form-label-input">Reserve Centralist:</label>
                    <select name="reserve_centralist" class="form-control-input">
                        <option value="0">Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <br />

                <div class="form-group">
                    <label for="status" class="form-label-input">Status:</label>
                    <select name="status" class="form-control-input">
                        <option value="0">Actief</option>
                        <option value="1">Inactief</option>
                        <option value="3">Geschorst</option>
                    </select>
                </div>
                <br />

                <div class="form-group">
                    <label for="specialisatie" class="form-label-input">Specialisatie(s):</label>
                    <input type="text" name="specialisatie" class="form-control-input" />
                </div>
                <br />

                <div class="form-group">
                    <label for="ingewerkt" class="form-label-input">Ingewerkt:</label>
                    <select name="ingewerkt" class="form-control-input">
                        <option value="0">Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <br />

                <div class="form-group">
                    <label for="porto" class="form-label-input">GMS toegang:</label>
                    <select name="porto" class="form-control-input">
                        <option value="0">Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <br />

                <div class="form-group">
                    <label for="opgesprek" class="form-label-input">Op gesprek:</label>
                    <select name="opgesprek" class="form-control-input">
                        <option value="0">Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <br />
                <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                <h2 style="text-align:center">Accountgegevens</h2>

                <div class="form-group">
                    <label for="username" class="form-label-input">Gebruikersnaam</label>
                    <input type="text" name="username" class="form-control-input" required />
                </div>
                <br />
                <div class="form-group">
                    <label for="password" class="form-label-input">Wachtwoord</label>
                    <input type="password" name="password" class="form-control-input" required />
                </div>
                <br />
                <input type="submit" style="width:100%" name="voegLidToe" value="Voeg account toe" class="btn-success btn" />
            </th>
        </table>
    </div>
</form>
