<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
?>
    <div class="padding">
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Aanvragen beheren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>#</th>
                        <th>Door</th>
                        <th>Type</th>
                        <th>Gewenste datum</th>
                        <th>Afdeling</th>
                        <th>Datum aanvraag</th>
                    </tr>
                    <?php
                    $getAanvraag = $db->query("SELECT * FROM formtraining WHERE stat = '0' AND eenheid='" . $userFetch['eenheid'] . "' ORDER BY date");
                    $countAgenda = $getAanvraag->num_rows;
                    while ($fetchAanvraag = $getAanvraag->fetch_array()) {
                        $getUser = $db->query("SELECT username, eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                        $fetchUsername = $getUser->fetch_assoc();
                        $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                        $fetchAfdeling = $getAfdeling->fetch_assoc();
                        $getConfigNaam = $db->query("SELECT Naam, id FROM Configuratie_aanvragen WHERE id = '" . $fetchAanvraag['training'] . "'");
                        $fetchConfigNaam = $getConfigNaam->fetch_assoc();
                    ?>
                        <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                            <td><?php echo $fetchAanvraag['id']; ?></td>
                            <td><?php echo $fetchUsername['username']; ?></td>
                            <td><?php echo $fetchConfigNaam['Naam']; ?></td>
                            <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                            <td><?php echo $fetchUsername['eenheid']; ?></td>
                            <td><?php echo $fetchAanvraag['date']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
                if ($countAgenda <= 0) { ?>
                    <h3 style="text-align:center">Geen aanvragen gevonden!</h3>
                    <br />
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="padding">
        <div class="row">
            <div class="col-md-4">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <span class="label label-danger pull-right">
                        </span>
                        <h5>Creëer aanvraag</h5>
                        <small>test</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label style="color:white">Titel</label>
                                <input type="text" name="titel" class="form-control" placeholder="Website Designer">
                            </div>
                            <div class="form-group">
                                <label style="color:white">Uitleg</label>
                                <textarea name="uitleg" class="form-control" placeholder="Website Designer"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="makeVacature" value="Aanmaken" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <span class="label label-danger pull-right">
                        </span>
                        <h5>Alle aanvragen</h5>
                        <small>test</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>#</th>
                                <th>Titel</th>
                                <th>Datum aangemaakt</th>
                                <th>Status</th>
                                <th>Verwijder</th>
                            </tr>
                            <?php
                            $resultaat = $db->query("SELECT * FROM Configuratie_aanvragen ORDER BY id");
                            $countresultaat = $resultaat->num_rows;

                            while ($fetch = $resultaat->fetch_assoc()) {
                                $id = $fetch['id'];
                                $titel = $fetch['Naam'];
                                $date = $fetch['date'];
                                $status = $fetch['Tag'];
                            ?>
                                <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/bekijk/vacature/<?php echo $id ?>">
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $titel ?></td>
                                    <td><?php echo $date ?></td>
                                    <td><?php if ($status == "1") {
                                            echo "Open";
                                        } else {
                                            echo "Gesloten";
                                        } ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="text" name="id" style="display:none;" value="<?php echo $id; ?>">
                                            <input type="submit" style="background: url(https://supergms.nl/assets/img/Delete.png);border: 0;display: block;height: 16px;width: 16px;" value="" name="delTime" style="float:right;">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <?php
                        if ($countresultaat <= 0) { ?>
                            <h3 style="text-align:center">Geen aanvragen gevonden!</h3>
                            <br />
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['delTime'])) {
        $id = $db->real_escape_string($_POST['id']);
        $db->query("DELETE FROM Configuratie_aanvragen WHERE id = '" . $id . "'");
    ?>
        <script>
            location.href = '<?php echo $site; ?>/teamleider/aanvragen';
        </script>
    <?php } ?>
    <?php
    if (isset($_POST['makeVacature'])) {
        $titel = $db->real_escape_string($_POST['titel']);
        $uitleg = $db->real_escape_string($_POST['uitleg']);
        $time = date("Y-m-d H:i:s");;

        if (empty($titel)) {
            echo 'Je bent vergeten een titel in te vullen';
        } elseif (empty($uitleg)) {
            echo 'Je bent vergeten een uitleg in te vullen';
        } else {
            $query = $db->query("INSERT INTO Configuratie_aanvragen (Naam,Beschrijving,Tag,date) VALUES (
                            '" . $titel . "',
                            '" . $uitleg . "',
                            '1',
                            '" . $time . "'
                            )");
            if ($query) {
                echo 'Succesvol de aanvraag aangemaakt!';
            } else {
                echo 'Error bij het maken van de aanvraag';
            }
        }
    ?>
        <script>
            location.href = '<?php echo $site; ?>/teamleider/aanvragen';
        </script>
    <?php } ?>
<?php } ?>