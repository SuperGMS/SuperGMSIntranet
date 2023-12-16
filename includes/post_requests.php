<?php
include("class.database.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = array(
    'success' => false,
    'message' => 'POST NOT successful'
);

if (isset($_POST['postBeheerRank'])) {
    $user = $db->real_escape_string($_POST['username']);
    $rank = $db->real_escape_string($_POST['rank']);

    if ($user == 0) {
        echo 'Er ging iets mis!';
    } else {
        // Check if a row with the given uid already exists
        $result = $db->query("SELECT * FROM user_rank WHERE uid = '$user'");
        if ($result->num_rows > 0) {
            // If a row exists, update it with the new rank
            $query = $db->query("UPDATE user_rank SET rank_id = '$rank' WHERE uid = '$user'");
        } else {
            // If no row exists, insert a new row with the uid and rank
            $query = $db->query("INSERT INTO user_rank (uid, rank_id) VALUES ('$user', '$rank')");
        }

        if ($query) {
            $response['success'] = true;
            $response['message'] = 'Machtiging succesvol aangepast';
        } else {
            $response['success'] = false;
            $response['message'] = 'Er is iets fout gegaan';
        }
    }
}

if (isset($_POST['wijzigAddons'])) {
    $ServerIP = $db->real_escape_string($_POST['ServerIP']);
    $ServerPort = $db->real_escape_string($_POST['ServerPort']);
    $ServerSocketPort = $db->real_escape_string($_POST['ServerSocketPort']);
    $ServerRConPassword = $db->real_escape_string($_POST['ServerRConPassword']);
    $UseLivemap = $db->real_escape_string($_POST['UseLivemap']);
    $UseRoute = $db->real_escape_string($_POST['UseRoute']);

    $query = $db->query("UPDATE Configuratie SET 
                    ServerIP='" . $ServerIP . "',
                    ServerPort='" . $ServerPort . "',
                    ServerSocketPort='" . $ServerSocketPort . "',
                    ServerRConPassword='" . $ServerRConPassword . "',
                    UseLivemap='" . $UseLivemap . "',
                    UseRoute='" . $UseRoute . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Wijziging succesvol doorgevoerd';
    } else {
        $response['success'] = false;
        $response['message'] = 'Er is iets fout gegaan';
    }
}

if (isset($_POST['postTraining'])) {
    $naam = $_POST['naamid'];
    $afdeling = $_POST['afdeling'];
    $type = $_POST['type'];
    $opmerking = $_POST['opmerking'];
    $tijd = $_POST['tijd'];

    $query = $db->query("INSERT INTO formtraining (uid,training,bericht,chosendate,date,eenheid) VALUES (
            '" . $naam . "',
            '" . $type . "',
            '" . $opmerking . "',
            '" . $tijd . "',
            NOW(),
            '" . $afdeling . "'
            )");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Formulier succesvol aangevraagd';
    }
}

if (isset($_POST["bewerkConfiguratieSpecialisatie1"])) {
    $specialisatienaam = $_POST['specialisatienaam'];
    $ID = $_POST['id'];

    $query = $db->query("UPDATE gms_eenheden_aanvullend SET naam='" . $specialisatienaam . "', value='" . $specialisatienaam . "' WHERE id='" . $ID . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Waarde succesvol aangepast';
    }
}

if (isset($_POST["voegConfiguratieSpecialisatie"])) {
    $column1 = $_POST['column1'];

    $query = $db->query("INSERT INTO gms_eenheden_aanvullend (naam,value) VALUES ('$column1','$column1')");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Aanvullende afdeling succesvol toegevoegd';
    } else {
        $response['success'] = false;
        $response['message'] = 'Aanvullende afdeling niet succesvol toegevoegd';
    }
}

if (isset($_POST["postCreerVacature"])) {
    $Uitleg = $_POST['Uitleg'];
    $vacatureNaam = $_POST['vacatureNaam'];
    $date = date("Y/m/d");

    $query = $db->query("INSERT INTO vacatures (titel,text,date,status) VALUES ('$vacatureNaam','$Uitleg','$date','1')");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Vacature succesvol toegevoegd';
    } else {
        $response['success'] = false;
        $response['message'] = 'Vacature niet succesvol toegevoegd';
    }
}

if (isset($_POST["voegLidToe"])) {
    $eenheid = $db->real_escape_string($_POST['eenheid']);
    $naam = $db->real_escape_string($_POST['naam']);
    $username = $db->real_escape_string($_POST['username']);
    $achternaam = $db->real_escape_string($_POST['achternaam']);
    $leeftijd = $db->real_escape_string($_POST['leeftijd']);
    $geboortedatum = $db->real_escape_string($_POST['geboortedatum']);
    $email = $db->real_escape_string($_POST['email']);
    $opgesprek = $db->real_escape_string($_POST['opgesprek']);
    $telefoon = $db->real_escape_string($_POST['telefoon']);
    $roepnummer = $db->real_escape_string($_POST['roepnummer']);
    $ingewerkt = $db->real_escape_string($_POST['ingewerkt']);
    $specialisatie = $db->real_escape_string($_POST['specialisatie']);
    $status = $db->real_escape_string($_POST['status']);
    $porto = $db->real_escape_string($_POST['porto']);
    $reserve_centralist = $db->real_escape_string($_POST['reserve_centralist']);
    $salt = generateSalt();
    $password = crypt($_POST['password'], $salt);

    $query = $db->query("INSERT INTO users SET 
                                        eenheid='" . $eenheid . "',
                                        salt='" . $salt . "',
                                        password='" . $password . "',
                                        naam='" . $naam . "',
                                        username='" . $username . "',
                                        achternaam='" . $achternaam . "',
                                        leeftijd='" . $leeftijd . "',
                                        geboortedatum='" . $geboortedatum . "',
                                        email='" . $email . "',
                                        telefoon='" . $telefoon . "',
                                        roepnummer='" . $roepnummer . "',
                                        ingewerkt='" . $ingewerkt . "',
                                        specialisatie='" . $specialisatie . "', 
                                        Status='" . $status . "',
                                        porto='" . $porto . "',
                                        reserve_centralist='" . $reserve_centralist . "',
                                        opgesprek='" . $opgesprek . "'");

    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Lid succesvol toegevoegd';
    }
}

if (isset($_POST["BewerkGebruiker"])) {
    $naam = $db->real_escape_string($_POST['naam']);
    $achternaam = $db->real_escape_string($_POST['achternaam']);
    $leeftijd = $db->real_escape_string($_POST['leeftijd']);
    $geboortedatum = $db->real_escape_string($_POST['geboortedatum']);
    $email = $db->real_escape_string($_POST['email']);
    $telefoon = $db->real_escape_string($_POST['telefoon']);

    $eenheid = $db->real_escape_string($_POST['eenheid']);
    $roepnummer = $db->real_escape_string($_POST['roepnummer']);
    $reserve_centralist = $db->real_escape_string($_POST['reserve_centralist']);
    $status = $db->real_escape_string($_POST['status']);
    $specialisatie = $db->real_escape_string($_POST['specialisatie']);
    $ingewerkt = $db->real_escape_string($_POST['ingewerkt']);
    $porto = $db->real_escape_string($_POST['porto']);
    $opgesprek = $db->real_escape_string($_POST['opgesprek']);

    $id = $db->real_escape_string($_POST['id']);

    $query = $db->query("UPDATE users SET 
    naam='" . $naam . "',
    achternaam='" . $achternaam . "',
    leeftijd='" . $leeftijd . "',
    geboortedatum='" . $geboortedatum . "',
    email='" . $email . "',
    telefoon='" . $telefoon . "',
    eenheid='" . $eenheid . "',
    roepnummer='" . $roepnummer . "',
    reserve_centralist='" . $reserve_centralist . "',
    status='" . $status . "',
    specialisatie='" . $specialisatie . "',
    ingewerkt='" . $ingewerkt . "',
    porto='" . $porto . "',
    opgesprek='" . $opgesprek . "' WHERE id='" . $id . "'");

    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Lid succesvol bewerkt';
    }
}

if (isset($_POST["VerwijderGebruiker"])) {
    $ID = $_POST['id'];

    $query = $db->query("DELETE FROM users WHERE id = " . $ID . "");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Gebruiker  succesvol verwijderd';
    }
}

if (isset($_POST["bewerkConfiguratieSpecialisatie2"])) {
    $ID = $_POST['id'];

    $query = $db->query("DELETE FROM gms_eenheden_aanvullend WHERE id = " . $ID . "");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Waarde succesvol verwijderd';
    }
}

if (isset($_POST['postTraining2'])) {
    $Instructeur = $_POST['naam'];
    $ID = $_POST['id'];
    $afdeling = $_POST['afdeling'];
    $type = $_POST['type'];
    $tijd = $_POST['tijd'];

    $query = $db->query("UPDATE formtraining SET Instructeur='" . $Instructeur . "', stat='1' WHERE id='" . $ID . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Training succesvol ingepland';
    }
}

if (isset($_POST['postTraining3'])) {
    $Instructeur = $_POST['naam'];
    $ID = $_POST['id'];

    $query = $db->query("UPDATE formtraining SET Instructeur='" . $Instructeur . "', stat='4' WHERE id='" . $ID . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Training succesvol afgewezen';
    }
}

if (isset($_POST['postTraining5'])) {
    $Instructeur = $_POST['naam'];
    $ID = $_POST['id'];

    $query = $db->query("UPDATE formtraining SET Instructeur='" . $Instructeur . "', stat='2' WHERE id='" . $ID . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Training succesvol voltooid';
    }
}

if (isset($_POST['postTraining6'])) {
    $Instructeur = $_POST['naam'];
    $ID = $_POST['id'];

    $query = $db->query("UPDATE formtraining SET Instructeur='" . $Instructeur . "', stat='3' WHERE id='" . $ID . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Training succesvol afgezegd';
    }
}

if (isset($_POST['postTraining4'])) {
    $Instructeur = $_POST['naam'];
    $ID = $_POST['id'];

    $query = $db->query("UPDATE formtraining SET Instructeur='" . $Instructeur . "', stat='3' WHERE id='" . $ID . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Training succesvol gewijzigd';
    }
}

if (isset($_POST["opslaanGebruikGMS"])) {
    $optie = $_POST['test'];

    $query = $db->query("UPDATE Configuratie SET gebruikGMS='" . $optie . "'");
    if ($query) {
        $response['success'] = true;
        $response['message'] = 'Optie succesvol aangepast';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
