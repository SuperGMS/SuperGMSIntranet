<?php
if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
}
?>
<div class="padding">
    <div class="box" style="border-radius:10px 10px;">
        <div class="box-header">
            <h2>Beschikbare Vacatures</h2>
        </div>
        <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
            <table class="table table-striped b-t b-b">
                <thead>
                    <tr>
                        <th>Titel:</th>
                        <th>Uitleg:</th>
                        <th>Datum aangemaakt:</th>
                        <th>Open / Gesloten</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
</div>