<?php
if ($teamleider != 1) {
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

    <h1>Aanvragen beheren</h1>

    <div class="recent-orders">
        <table>
            <th>
                <h2>Openstaande aanvragen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table>
            <thead>
                <tr>
                    <th>
                    </th>
                </tr>
                <tr>
                    <th style="width:5%">#</th>
                    <th style="width:19%">Door</th>
                    <th style="width:19%">Type</th>
                    <th style="width:19%">Gewenste datum</th>
                    <th style="width:19%">Afdeling</th>
                    <th style="width:19%">Datum aanvraag</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getAanvraag = $db->query("SELECT * FROM formtraining WHERE stat = '0' AND eenheid='" . $userFetch['eenheid'] . "' ORDER BY date");
                $countAgenda = $getAanvraag->num_rows;
                while ($fetchAanvraag = $getAanvraag->fetch_array()) {
                    $getUser = $db->query("SELECT username, eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchUsername = $getUser->fetch_assoc();
                    $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchAfdeling = $getAfdeling->fetch_assoc();
                ?>
                    <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                        <td><?php echo $fetchAanvraag['id']; ?></td>
                        <td><?php echo $fetchUsername['username']; ?></td>
                        <td><?php if ($fetchAanvraag['training'] == "1") {
                                echo "Inwerktraining";
                            }
                            if ($fetchAanvraag['training'] == "2") {
                                echo "Verdiepingstraining";
                            }
                            if ($fetchAanvraag['training'] == "3") {
                                echo "Specialisatietraining";
                            }
                            if ($fetchAanvraag['training'] == "4") {
                                echo "Vuurwapentraining";
                            }
                            if ($fetchAanvraag['training'] == "5") {
                                echo "Examen";
                            } ?></td>
                        <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                        <td><?php echo $fetchUsername['eenheid']; ?></td>
                        <td><?php echo $fetchAanvraag['date']; ?></td>
                    </tr>
                <?php } ?>
        </table>
        </tbody>
        </table>
    </div>

    <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

    <div class="recent-orders">
        <table>
            <th>
                <h2>Ingeplande aanvragen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table>
            <thead>
                <tr>
                    <th>
                    </th>
                </tr>
                <tr>
                    <th style="width:5%">#</th>
                    <th style="width:19%">Door</th>
                    <th style="width:19%">Type</th>
                    <th style="width:19%">Gewenste datum</th>
                    <th style="width:19%">Afdeling</th>
                    <th style="width:19%">Datum aanvraag</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getAanvraag = $db->query("SELECT * FROM formtraining WHERE stat = '1' AND eenheid='" . $userFetch['eenheid'] . "' ORDER BY date");
                $countAgenda = $getAanvraag->num_rows;
                while ($fetchAanvraag = $getAanvraag->fetch_array()) {
                    $getUser = $db->query("SELECT username, eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchUsername = $getUser->fetch_assoc();
                    $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchAfdeling = $getAfdeling->fetch_assoc();
                ?>
                    <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                        <td><?php echo $fetchAanvraag['id']; ?></td>
                        <td><?php echo $fetchUsername['username']; ?></td>
                        <td><?php if ($fetchAanvraag['training'] == "1") {
                                echo "Inwerktraining";
                            }
                            if ($fetchAanvraag['training'] == "2") {
                                echo "Verdiepingstraining";
                            }
                            if ($fetchAanvraag['training'] == "3") {
                                echo "Specialisatietraining";
                            }
                            if ($fetchAanvraag['training'] == "4") {
                                echo "Vuurwapentraining";
                            }
                            if ($fetchAanvraag['training'] == "5") {
                                echo "Examen";
                            } ?></td>
                        <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                        <td><?php echo $fetchUsername['eenheid']; ?></td>
                        <td><?php echo $fetchAanvraag['date']; ?></td>
                    </tr>
                <?php } ?>
        </table>
        </tbody>
        </table>
    </div>

    <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

    <div class="recent-orders">
        <table>
            <th>
                <h2>Voltooide aanvragen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table>
            <thead>
                <tr>
                    <th>
                    </th>
                </tr>
                <tr>
                    <th style="width:5%">#</th>
                    <th style="width:19%">Door</th>
                    <th style="width:19%">Type</th>
                    <th style="width:19%">Gewenste datum</th>
                    <th style="width:19%">Afdeling</th>
                    <th style="width:19%">Datum aanvraag</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getAanvraag = $db->query("SELECT * FROM formtraining WHERE stat = '2' AND eenheid='" . $userFetch['eenheid'] . "' ORDER BY date");
                $countAgenda = $getAanvraag->num_rows;
                while ($fetchAanvraag = $getAanvraag->fetch_array()) {
                    $getUser = $db->query("SELECT username, eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchUsername = $getUser->fetch_assoc();
                    $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchAfdeling = $getAfdeling->fetch_assoc();
                ?>
                    <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                        <td><?php echo $fetchAanvraag['id']; ?></td>
                        <td><?php echo $fetchUsername['username']; ?></td>
                        <td><?php if ($fetchAanvraag['training'] == "1") {
                                echo "Inwerktraining";
                            }
                            if ($fetchAanvraag['training'] == "2") {
                                echo "Verdiepingstraining";
                            }
                            if ($fetchAanvraag['training'] == "3") {
                                echo "Specialisatietraining";
                            }
                            if ($fetchAanvraag['training'] == "4") {
                                echo "Vuurwapentraining";
                            }
                            if ($fetchAanvraag['training'] == "5") {
                                echo "Examen";
                            } ?></td>
                        <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                        <td><?php echo $fetchUsername['eenheid']; ?></td>
                        <td><?php echo $fetchAanvraag['date']; ?></td>
                    </tr>
                <?php } ?>
        </table>
        </tbody>
        </table>
    </div>

    <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

    <div class="recent-orders">
        <table>
            <th>
                <h2>Afgezegde aanvragen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table>
            <thead>
                <tr>
                    <th>
                    </th>
                </tr>
                <tr>
                    <th style="width:5%">#</th>
                    <th style="width:19%">Door</th>
                    <th style="width:19%">Type</th>
                    <th style="width:19%">Gewenste datum</th>
                    <th style="width:19%">Afdeling</th>
                    <th style="width:19%">Datum aanvraag</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getAanvraag = $db->query("SELECT * FROM formtraining WHERE stat = '3' AND eenheid='" . $userFetch['eenheid'] . "' ORDER BY date");
                $countAgenda = $getAanvraag->num_rows;
                while ($fetchAanvraag = $getAanvraag->fetch_array()) {
                    $getUser = $db->query("SELECT username, eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchUsername = $getUser->fetch_assoc();
                    $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                    $fetchAfdeling = $getAfdeling->fetch_assoc();
                ?>
                    <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                        <td><?php echo $fetchAanvraag['id']; ?></td>
                        <td><?php echo $fetchUsername['username']; ?></td>
                        <td><?php if ($fetchAanvraag['training'] == "1") {
                                echo "Inwerktraining";
                            }
                            if ($fetchAanvraag['training'] == "2") {
                                echo "Verdiepingstraining";
                            }
                            if ($fetchAanvraag['training'] == "3") {
                                echo "Specialisatietraining";
                            }
                            if ($fetchAanvraag['training'] == "4") {
                                echo "Vuurwapentraining";
                            }
                            if ($fetchAanvraag['training'] == "5") {
                                echo "Examen";
                            } ?></td>
                        <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                        <td><?php echo $fetchUsername['eenheid']; ?></td>
                        <td><?php echo $fetchAanvraag['date']; ?></td>
                    </tr>
                <?php } ?>
        </table>
        </tbody>
        </table>
    </div>

<hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

<div class="recent-orders">
    <table>
        <th>
            <h2>Geweigerde aanvragen</h2>
        </th>
    </table>
</div>

<div class="recent-orders">
    <table>
        <thead>
            <tr>
                <th>
                </th>
            </tr>
            <tr>
                <th style="width:5%">#</th>
                <th style="width:19%">Door</th>
                <th style="width:19%">Type</th>
                <th style="width:19%">Gewenste datum</th>
                <th style="width:19%">Afdeling</th>
                <th style="width:19%">Datum aanvraag</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $getAanvraag = $db->query("SELECT * FROM formtraining WHERE stat = '4' AND eenheid='" . $userFetch['eenheid'] . "' ORDER BY date");
            $countAgenda = $getAanvraag->num_rows;
            while ($fetchAanvraag = $getAanvraag->fetch_array()) {
                $getUser = $db->query("SELECT username, eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                $fetchUsername = $getUser->fetch_assoc();
                $getAfdeling = $db->query("SELECT eenheid, id FROM users WHERE id = '" . $fetchAanvraag['uid'] . "'");
                $fetchAfdeling = $getAfdeling->fetch_assoc();
            ?>
                <tr class="clickable-row" data-href="<?php echo $site; ?>/teamleider/aanvraag-beheer/<?php echo $fetchAanvraag['id'] ?>">
                    <td><?php echo $fetchAanvraag['id']; ?></td>
                    <td><?php echo $fetchUsername['username']; ?></td>
                    <td><?php if ($fetchAanvraag['training'] == "1") {
                            echo "Inwerktraining";
                        }
                        if ($fetchAanvraag['training'] == "2") {
                            echo "Verdiepingstraining";
                        }
                        if ($fetchAanvraag['training'] == "3") {
                            echo "Specialisatietraining";
                        }
                        if ($fetchAanvraag['training'] == "4") {
                            echo "Vuurwapentraining";
                        }
                        if ($fetchAanvraag['training'] == "5") {
                            echo "Examen";
                        } ?></td>
                    <td><?php echo $fetchAanvraag['chosendate']; ?></td>
                    <td><?php echo $fetchUsername['eenheid']; ?></td>
                    <td><?php echo $fetchAanvraag['date']; ?></td>
                </tr>
            <?php } ?>
    </table>
    </tbody>
    </table>
</div>
<?php
}
?>