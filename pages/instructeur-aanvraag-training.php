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
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Aanvragen </h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo $site; ?>/home">Home</a>
                </li>
                <li>
                    <a>Instructeur</a>
                </li>
                <li class="active">
                    <strong>Aanvragen Bekijken</strong>
                </li>
            </ol>
        </div>
    </div>

    <br />
    <style>
        input[type=submit] {
            border: 0;
            display: block;
            height: 30px;
            width: 100px;
        }

        .example222 {
            border: 3px solid white;
            border-radius: 5px 5px;
        }

        .example333 {
            border: 3px solid white;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins example222" style="background:white">
                <div class="ibox-title example333">
                    <h3 style="text-align:center;">Training aanvragen beheren</h3>
                </div>
                <br />
                <table class="table table-striped table-hover" style="color:black">
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
                        $getUser = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                        $fetchUsername = $getUser->fetch_assoc();
                        $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                        $fetchAfdeling = $getAfdeling->fetch_assoc();
                    ?>
                        <tr class="clickable-row" data-href="<?php echo $site; ?>/instructeur/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                            <td><?php echo $fetchAanvraag['id']; ?></td>
                            <td><?php echo $fetchUsername['username']; ?></td>
                            <td><?php
                                if ($fetchAanvraag['training'] == 1) {
                                    echo 'Inwerking training aanvraag';
                                } elseif ($fetchAanvraag['training'] == 2) {
                                    echo 'Porto cursus aanvraag';
                                } elseif ($fetchAanvraag['training'] == 3) {
                                    echo 'RTGB training aanvraag';
                                } elseif ($fetchAanvraag['training'] == 4) {
                                    echo 'Promotie aanvraag';
                                } elseif ($fetchAanvraag['training'] == 5) {
                                    echo 'EHBO cursus aavnraag';
                                }

                                ?></td>
                            <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                            <td>
                                <?php
                                if ($fetchAfdeling['eenheid'] == 'Koninklijke Marechaussee') {
                                    echo 'Koninklijke Marechaussee';
                                } elseif ($fetchAfdeling['eenheid'] == 'Handhaving') {
                                    echo 'Handhaving';
                                } elseif ($fetchAfdeling['eenheid'] == 'Politie') {
                                    echo 'Politie';
                                } elseif ($fetchAfdeling['eenheid'] == 'Ambulance') {
                                    echo 'Ambulance';
                                } elseif ($fetchAfdeling['eenheid'] == 'Brandweer') {
                                    echo 'Brandweer';
                                } elseif ($fetchAfdeling['eenheid'] == 'Meldkamer') {
                                    echo 'Meldkamer';
                                }
                                ?>
                            </td>
                            <td><?php echo $fetchAanvraag['date']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
                if ($countAgenda <= 0) { ?>
                    <h3 style="text-align:center">Geen agenda inplanningen gevonden!</h3>
                    <br />
                <?php } ?>
            </div>
        </div>
    </div>
<?php
}
?>