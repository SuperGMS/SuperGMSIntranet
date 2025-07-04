<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>

    <h1>Aanmeldingsbeheer</h1>

    <div class="recent-orders">
        <table>
            <th>
                <h2>Nieuwe aanmeldingen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Achternaam</th>
                <th>Leeftijd</th>
                <th>E-Mail</th>
                <th>Telefoonnummer</th>
                <th>Afdelingen</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <?php
            $accepted = 0;

            // Prepared statement in mysqli
            $stmt = $db->prepare("SELECT * FROM aanmeldingen WHERE accepted = ? ORDER BY date DESC");
            $stmt->bind_param("i", $accepted);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($aanmeldingNe = $result->fetch_assoc()) {
            ?>
                    <tr onclick="window.location='<?= $site; ?>/leiding/aanmelding/<?= htmlspecialchars($aanmeldingNe['id']); ?>'" class="hovering">
                        <td><?= htmlspecialchars($aanmeldingNe['id']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingNe['naam']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingNe['achternaam']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingNe['leeftijd']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingNe['email']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingNe['telefoon']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingNe['afdeling']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingNe['date']); ?></td>
                    </tr>
                <?php
                }
                $result->free();
            } else {
                ?>
                <h6 style="text-align:center">Geen nieuwe aanmeldingen!!</h6>
                <br />
            <?php
            }
            $stmt->close();
            ?>

        </table>
    </div>

    <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

    <div class="recent-orders">
        <table>
            <th>
                <h2>Geaccepteerde aanmeldingen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Achternaam</th>
                <th>Leeftijd</th>
                <th>E-Mail</th>
                <th>Telefoonnummer</th>
                <th>Afdelingen</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <?php
            $accepted = 1;

            // Prepared statement met mysqli
            $stmt = $db->prepare("SELECT * FROM aanmeldingen WHERE accepted = ? ORDER BY date DESC");
            $stmt->bind_param("i", $accepted);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($aanmeldingGe = $result->fetch_assoc()) {
            ?>
                    <tr onclick="window.location='<?= $site; ?>/leiding/aanmelding/<?= htmlspecialchars($aanmeldingGe['id']); ?>'" class="hovering">
                        <td><?= htmlspecialchars($aanmeldingGe['id']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGe['naam']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGe['achternaam']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGe['leeftijd']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGe['email']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGe['telefoon']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGe['afdeling']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGe['date']); ?></td>
                    </tr>
                <?php
                }
                $result->free();
            } else {
                ?>
                <h6 style="text-align:center">Geen geaccepteerde aanmeldingen!!</h6>
                <br />
            <?php
            }
            $stmt->close();
            ?>

        </table>
    </div>

    <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

    <div class="recent-orders">
        <table>
            <th>
                <h2>Geweigerde aanmeldingen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Achternaam</th>
                <th>Leeftijd</th>
                <th>E-Mail</th>
                <th>Telefoonnummer</th>
                <th>Afdelingen</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <?php
            $accepted = 2;

            // Prepared statement met mysqli
            $stmt = $db->prepare("SELECT * FROM aanmeldingen WHERE accepted = ? ORDER BY date DESC");
            $stmt->bind_param("i", $accepted);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($aanmeldingGew = $result->fetch_assoc()) {
            ?>
                    <tr onclick="window.location='<?= $site; ?>/leiding/aanmelding/<?= htmlspecialchars($aanmeldingGew['id']); ?>'" class="hovering">
                        <td><?= htmlspecialchars($aanmeldingGew['id']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGew['naam']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGew['achternaam']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGew['leeftijd']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGew['email']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGew['telefoon']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGew['afdeling']); ?></td>
                        <td><?= htmlspecialchars($aanmeldingGew['date']); ?></td>
                    </tr>
                <?php
                }
                $result->free();
            } else {
                ?>
                <h6 style="text-align:center">Geen geweigerde aanmeldingen!</h6>
                <br />
            <?php
            }
            $stmt->close();
            ?>

        </table>
    </div>

    <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

    <div class="recent-orders">
        <table>
            <th>
                <h2>Behandelde aanmeldingen</h2>
            </th>
        </table>
    </div>

    <div class="recent-orders">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Achternaam</th>
                <th>Leeftijd</th>
                <th>E-Mail</th>
                <th>Telefoonnummer</th>
                <th>Afdelingen</th>
                <th>Datum</th>
                <th></th>
            </tr>
            <?php
            $accepted = 3;

            $stmt = $db->prepare("SELECT * FROM aanmeldingen WHERE accepted = ? ORDER BY date DESC");
            $stmt->bind_param("i", $accepted);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($aanmelding = $result->fetch_assoc()) {
            ?>
                    <tr onclick="window.location='<?= $site; ?>/leiding/aanmelding/<?= htmlspecialchars($aanmelding['id']); ?>'" class="hovering">
                        <td><?= htmlspecialchars($aanmelding['id']); ?></td>
                        <td><?= htmlspecialchars($aanmelding['naam']); ?></td>
                        <td><?= htmlspecialchars($aanmelding['achternaam']); ?></td>
                        <td><?= htmlspecialchars($aanmelding['leeftijd']); ?></td>
                        <td><?= htmlspecialchars($aanmelding['email']); ?></td>
                        <td><?= htmlspecialchars($aanmelding['telefoon']); ?></td>
                        <td><?= htmlspecialchars($aanmelding['afdeling']); ?></td>
                        <td><?= htmlspecialchars($aanmelding['date']); ?></td>
                    </tr>
                <?php
                }
                $result->free();
            } else {
                ?>
                <h6 style="text-align:center">Geen behandelde aanmeldingen!</h6>
                <br />
            <?php
            }
            $stmt->close();
            ?>

        </table>
    </div>
<?php } ?>