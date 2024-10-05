<?php
include("class.database.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = array(
    'success' => false,
    'message' => 'POST NOT successful'
);

// Helper function to prepare and execute queries
function executeQuery($pdo, $query, $params = []) {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt;
}

if (isset($_POST['postBeheerRank'])) {
    $user = $_POST['username'];
    $rank = $_POST['rank'];

    if ($user == 0) {
        echo 'Er ging iets mis!';
    } else {
        // Check if a row with the given uid already exists
        $result = executeQuery($db, "SELECT * FROM user_rank WHERE uid = ?", [$user]);
        if ($result->rowCount() > 0) {
            // If a row exists, update it with the new rank
            executeQuery($db, "UPDATE user_rank SET rank_id = ? WHERE uid = ?", [$rank, $user]);
        } else {
            // If no row exists, insert a new row with the uid and rank
            executeQuery($db, "INSERT INTO user_rank (uid, rank_id) VALUES (?, ?)", [$user, $rank]);
        }

        $response['success'] = true;
        $response['message'] = 'Machtiging succesvol aangepast';
    }
}

if (isset($_POST['wijzigAddons'])) {
    $query = "UPDATE Configuratie SET 
                    ServerIP = ?, 
                    ServerPort = ?, 
                    ServerSocketPort = ?, 
                    ServerRConPassword = ?, 
                    UseLivemap = ?, 
                    UseRoute = ?";
    executeQuery($db, $query, [
        $_POST['ServerIP'],
        $_POST['ServerPort'],
        $_POST['ServerSocketPort'],
        $_POST['ServerRConPassword'],
        $_POST['UseLivemap'],
        $_POST['UseRoute']
    ]);
    $response['success'] = true;
    $response['message'] = 'Wijziging succesvol doorgevoerd';
}

if (isset($_POST['postTraining'])) {
    $query = "INSERT INTO formtraining (uid, training, bericht, chosendate, date, eenheid) VALUES (?, ?, ?, ?, NOW(), ?)";
    executeQuery($db, $query, [
        $_POST['naamid'],
        $_POST['type'],
        $_POST['opmerking'],
        $_POST['tijd'],
        $_POST['afdeling']
    ]);
    $response['success'] = true;
    $response['message'] = 'Formulier succesvol aangevraagd';
}

if (isset($_POST["bewerkConfiguratieSpecialisatie1"])) {
    $query = "UPDATE gms_eenheden_aanvullend SET naam = ?, value = ? WHERE id = ?";
    executeQuery($db, $query, [$_POST['specialisatienaam'], $_POST['specialisatienaam'], $_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Waarde succesvol aangepast';
}

if (isset($_POST["voegConfiguratieSpecialisatie"])) {
    $query = "INSERT INTO gms_eenheden_aanvullend (naam, value) VALUES (?, ?)";
    executeQuery($db, $query, [$_POST['column1'], $_POST['column1']]);
    $response['success'] = true;
    $response['message'] = 'Aanvullende afdeling succesvol toegevoegd';
}

if (isset($_POST["postCreerVacature"])) {
    $query = "INSERT INTO vacatures (titel, text, date, status) VALUES (?, ?, ?, ?)";
    executeQuery($db, $query, [
        $_POST['vacatureNaam'],
        $_POST['uitleg'],
        date("Y/m/d"),
        '1'
    ]);
    $response['success'] = true;
    $response['message'] = 'Vacature succesvol toegevoegd';
}

if (isset($_POST["voegLidToe"])) {
    $class = new User($db);
    $salt = $class->generateSalt();  // Call the generateSalt method
    $password = crypt($_POST['password'], $salt);
    $query = "INSERT INTO users (eenheid, salt, password, naam, username, achternaam, leeftijd, geboortedatum, email, telefoon, roepnummer, ingewerkt, specialisatie, Status, porto, reserve_centralist, opgesprek) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    executeQuery($db, $query, [
        $_POST['eenheid'],
        $salt,
        $password,
        $_POST['naam'],
        $_POST['username'],
        $_POST['achternaam'],
        $_POST['leeftijd'],
        $_POST['geboortedatum'],
        $_POST['email'],
        $_POST['telefoon'],
        $_POST['roepnummer'],
        $_POST['ingewerkt'],
        $_POST['specialisatie'],
        $_POST['status'],
        $_POST['porto'],
        $_POST['reserve_centralist'],
        $_POST['opgesprek']
    ]);
    $response['success'] = true;
    $response['message'] = 'Lid succesvol toegevoegd';
}

if (isset($_POST["BewerkGebruiker"])) {
    $query = "UPDATE users SET naam = ?, achternaam = ?, leeftijd = ?, geboortedatum = ?, email = ?, telefoon = ?, eenheid = ?, roepnummer = ?, reserve_centralist = ?, status = ?, specialisatie = ?, ingewerkt = ?, porto = ?, opgesprek = ? WHERE id = ?";
    executeQuery($db, $query, [
        $_POST['naam'],
        $_POST['achternaam'],
        $_POST['leeftijd'],
        $_POST['geboortedatum'],
        $_POST['email'],
        $_POST['telefoon'],
        $_POST['eenheid'],
        $_POST['roepnummer'],
        $_POST['reserve_centralist'],
        $_POST['status'],
        $_POST['specialisatie'],
        $_POST['ingewerkt'],
        $_POST['porto'],
        $_POST['opgesprek'],
        $_POST['id']
    ]);
    $response['success'] = true;
    $response['message'] = 'Lid succesvol bewerkt';
}

if (isset($_POST["VerwijderGebruiker"])) {
    $query = "DELETE FROM users WHERE id = ?";
    executeQuery($db, $query, [$_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Gebruiker succesvol verwijderd';
}

if (isset($_POST["bewerkConfiguratieSpecialisatie2"])) {
    $query = "DELETE FROM gms_eenheden_aanvullend WHERE id = ?";
    executeQuery($db, $query, [$_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Waarde succesvol verwijderd';
}

if (isset($_POST['postTraining2'])) {
    $query = "UPDATE formtraining SET Instructeur = ?, stat = '1' WHERE id = ?";
    executeQuery($db, $query, [$_POST['naam'], $_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Training succesvol ingepland';
}

if (isset($_POST['postTraining3'])) {
    $query = "UPDATE formtraining SET Instructeur = ?, stat = '4' WHERE id = ?";
    executeQuery($db, $query, [$_POST['naam'], $_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Training succesvol afgewezen';
}

if (isset($_POST['postTraining5'])) {
    $query = "UPDATE formtraining SET Instructeur = ?, stat = '2' WHERE id = ?";
    executeQuery($db, $query, [$_POST['naam'], $_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Training succesvol voltooid';
}

if (isset($_POST['postTraining6'])) {
    $query = "UPDATE formtraining SET Instructeur = ?, stat = '3' WHERE id = ?";
    executeQuery($db, $query, [$_POST['naam'], $_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Training succesvol afgezegd';
}

if (isset($_POST['postTraining4'])) {
    $query = "UPDATE formtraining SET Instructeur = ?, stat = '3' WHERE id = ?";
    executeQuery($db, $query, [$_POST['naam'], $_POST['id']]);
    $response['success'] = true;
    $response['message'] = 'Training succesvol gewijzigd';
}

if (isset($_POST["opslaanGebruikGMS"])) {
    $query = "UPDATE Configuratie SET gebruikGMS = ?";
    executeQuery($db, $query, [$_POST['test']]);
    $response['success'] = true;
    $response['message'] = 'Optie succesvol aangepast';
}

header('Content-Type: application/json');
echo json_encode($response);
