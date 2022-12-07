<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Vacatures</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Home</a>
            </li>
            <li class="active">
                <strong>Vacatures</strong>
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
                <h3 style="text-align:center">Beschikbare Vacatures</h3>
            </div>
            <table class="table" style="color:black">
                <tr>
                    <th>Titel:</th>
                    <th>Uitleg:</th>
                    <th>Datum:</th>
                    <th>Open / Gesloten</th>
                </tr>
                <?php
                $getAanvraag = $db->query("SELECT * FROM vacatures ORDER BY date");
                while ($fetchAanvraag = $getAanvraag->fetch_array()) {
                ?>
                    <tr onclick="location.href='<?php echo $site; ?>/vacature-lezen/<?php echo $fetchAanvraag['id']; ?>'">
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
            </table>
        </div>
    </div>
</div>