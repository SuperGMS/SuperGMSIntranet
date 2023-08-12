<?php
if ($instructeur != 1) {
    echo 'Geen toegang!';
} else {
?>

    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <?php
    if ($userFetch['opgesprek'] == '1') {
        header("Location: opgesprek");
    }

    $getAfwezigheid = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $userFetch['id'] . "'");
    $countAfwezigheid = $getAfwezigheid->num_rows;

    $getAfwezigheidOngeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $userFetch['id'] . "' AND reden = '1' OR uid = '" . $userFetch['id'] . "' AND reden = '2'");
    $countAfwezigheidOngeoorloofd = $getAfwezigheidOngeoorloofd->num_rows;

    $getAfwezigheidGeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $userFetch['id'] . "' AND reden = '3' OR uid = '" . $userFetch['id'] . "' AND reden = '4'");
    $countAfwezigheidGeoorloofd = $getAfwezigheidGeoorloofd->num_rows;
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
<?php
}
?>