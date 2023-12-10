<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
}
?>

<h1>Vacatures</h1>

<?= $informatienognietafgemaakt ?>

<!-- Hier nieuwe code onder -->

<div class="recent-orders">
    <h2></h2>
    <table>
        <thead>
            <tr>
                <th style="width:10%">Titel:</th>
                <th style="width:25%">Kleine uitleg:</th>
                <th style="width:5%">Datum aangemaakt:</th>
                <th style="width:5%">Open / Gesloten</th>
            </tr>

            <tr>
                <th colspan="5">
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                </th>
            </tr>
            <?php
            $getAanvraag = $db->query("SELECT * FROM vacatures ORDER BY date");
            while ($fetchAanvraag = $getAanvraag->fetch_array()) {
            ?>
                <tr onclick="location.href='<?php echo $site; ?>/vacature-lezen?id=<?php echo $fetchAanvraag['id']; ?>'">
                    <td><?php echo $fetchAanvraag['titel']; ?></td>
                    <td><?php echo substr($fetchAanvraag['text'], 0, 25) . '..'; ?></td>
                    <td><?php echo $fetchAanvraag['date']; ?></td>
                    <td><?php if ($fetchAanvraag['status'] == 1) {
                            echo '<span class="label label-primary">Open</span></td>';
                        } else {
                            echo '<span class="label label-danger">Gesloten</span></td>';
                        } ?></td>
                </tr>
            <?php } ?>

        </thead>
    </table>


</div>

<!-- Oude Code -->