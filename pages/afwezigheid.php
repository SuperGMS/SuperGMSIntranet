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
            <h2>Afwezigheid bekijken</h2>
        </div>
        <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
            <table class="table table-striped b-t b-b">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Gemeld door</th>
                        <th>Reden</th>
                        <th>Datum</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fetchAfwezigheid = $getAfwezigheid->fetch_array()) {
                        $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchAfwezigheid['made_uid'] . "'");
                        $fetchUsername = $getUsername->fetch_assoc();
                    ?>
                        <tr role="row" class="odd">
                            <td class="sorting_1"><?php echo $fetchAfwezigheid['id']; ?></td>
                            <td><?php echo $fetchUsername['username']; ?></td>
                            <?php
                            if ($fetchAfwezigheid['reden'] == '1') { ?>
                                <td class="warning" style="border-radius:10px;">
                                    Te laat
                                </td>
                            <?php }
                            if ($fetchAfwezigheid['reden'] == '2') { ?>
                                <td class="danger" style="border-radius:10px;">
                                    Absent
                                </td>
                            <?php } else if ($fetchAfwezigheid['reden'] == '3') { ?>
                                <td class="success" style="border-radius:10px;">
                                    Geoorloofd absent
                                </td>
                            <?php } else if ($fetchAfwezigheid['reden'] == '4') { ?>
                                <td class="success" style="border-radius:10px;">
                                    Verlof
                                </td>
                            <?php } ?>
                            <td><?php echo $fetchAfwezigheid['date']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>