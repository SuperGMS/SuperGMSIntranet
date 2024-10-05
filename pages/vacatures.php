<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
    exit; // Ensure script stops after redirect
}

// Placeholder to avoid undefined variable error if $informatienognietafgemaakt is not defined
$informatienognietafgemaakt = isset($informatienognietafgemaakt) ? $informatienognietafgemaakt : '';
?>

<h1>Vacatures</h1>

<?= htmlspecialchars($informatienognietafgemaakt) ?>

<!-- Hier nieuwe code onder -->

<div class="recent-orders">
    <table>
        <thead>
            <tr>
                <th style="width:10%">Titel:</th>
                <th style="width:25%">Kleine uitleg:</th>
                <th style="width:15%">Datum aangemaakt:</th>
                <th style="width:10%">Status</th>
            </tr>
            <tr>
                <th colspan="4">
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Secure the query by using prepared statements
            $getAanvraag = $db->query("SELECT * FROM vacatures ORDER BY date DESC");
            $vacatures = $getAanvraag->fetchAll(PDO::FETCH_ASSOC);

            if (count($vacatures) > 0) {
                foreach ($vacatures as $fetchAanvraag) {
                    ?>
                    <tr onclick="window.location.href='<?php echo $site; ?>/vacature-lezen?id=<?php echo $fetchAanvraag['id']; ?>'">
                        <td><?php echo htmlspecialchars($fetchAanvraag['titel']); ?></td>
                        <td><?php echo htmlspecialchars(substr($fetchAanvraag['text'], 0, 25)) . '..'; ?></td>
                        <td><?php echo htmlspecialchars($fetchAanvraag['date']); ?></td>
                        <td>
                            <?php if ($fetchAanvraag['status'] == 1) {
                                echo '<span class="label label-primary">Open</span>';
                            } else {
                                echo '<span class="label label-danger">Gesloten</span>';
                            } ?>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="4" style="text-align:center">Geen vacatures gevonden!</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Oude Code -->
