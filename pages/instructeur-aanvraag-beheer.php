<?php
if ($instructeur != 1) {
    echo 'Geen toegang!';
} else {
?>

    <?php
    $getAanvraag = $db->query("SELECT * FROM formtraining WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
    $fetchAanvraag = $getAanvraag->fetch_array();
    $getUser = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
    $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
    $fetchUsername = $getUser->fetch_assoc();
    $fetchAfdeling = $getAfdeling->fetch_assoc();
    $getConfigNaam = $db->query("SELECT Naam, id FROM Configuratie_aanvragen WHERE id = '" . $fetchAanvraag['training'] . "'");
    $fetchConfigNaam = $getConfigNaam->fetch_assoc();
    ?>
    <?php
    if (isset($_POST['AcceptTraining'])) {
        $bericht = $db->real_escape_string($_POST['bericht']);

        if (empty($bericht)) {
            echo 'You have not entered a message!';
        } elseif (empty($chosendate)) {
            echo 'You have not entered a date!';
        } else {
            $query = $db->query("INSERT INTO mailbox (uid_from,name_from,uid_to,title,bericht,date,categorie,important) VALUES (
                    '0',
                    'Instructeur',
                    '" . $fetchAanvraag['uid'] . "',
                    'Resultaat aanvraag',
                    '" . $bericht . "',
                    NOW(),
                    '2',
                    '1'
                    )");
            $query .= $db->query("UPDATE formtraining SET stat = '1' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
            if ($query) {
                echo 'Bericht verzonden!';
            } else {
                echo 'Er is iets fout gegaan!';
            }
        }
    }
    if (isset($_POST['Afwijzen'])) {
        $query = $db->query("DELETE FROM formtraining WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
        $bericht = 'Helaas moeten wij u mededelen dat het verzoek is afgewezen. Wil je weten wat de reden is, neem dan contact op met je instructeur.'; 
        $query .= $db->query("INSERT INTO mailbox (uid_from,name_from,uid_to,title,bericht,date,categorie,important) VALUES (
                    '0',
                    'Instructeur',
                    '" . $fetchAanvraag['uid'] . "',
                    'Resultaat aanvraag',
                    '" . $bericht . "',
                    NOW(),
                    '2',
                    '1'
                    )");
        if ($query) {
            echo 'Rejected!';
        } else {
            echo 'Something went wrong!';
        }
    }
    ?>
    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <h2>Aanvraag</h2>
                        <small><?php echo $fetchAanvraag['bericht']; ?></small>
                    </div>
                    <table class="table" style="color:white">
                        <tr>
                            <th>Naam:</th>
                            <th>Soort:</th>
                            <th>Gewenste datum:</th>
                            <th>Afdeling:</th>
                        </tr>
                        <tr>
                            <td><?php echo $fetchUsername['username']; ?></td>
                            <td><?php echo $fetchConfigNaam['Naam']; ?></td>
                            <td><?php echo $fetchAanvraag['date']; ?></td>
                            <td><?php echo $fetchAfdeling['eenheid']; ?></td>
                        </tr>
                    </table>

                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label style="color:white">Bericht:</label>
                                <textarea class="form-control" name="bericht" rows="5" cols="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label style="color:white">Definitieve datum:</label>
                                <input type="text" value="<?php echo $fetchAanvraag['date']; ?>" name="chosendate" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Accepteren" class="btn btn-primary" name="AcceptTraining">
                                <input type="submit" value="Afwijzen" class="btn btn-danger" name="Afwijzen">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>