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

<!-- Hier nieuwe code onder -->
<h1>Afwezigheid</h1>
<div class="recent-orders">
        <table>
            <thead>
                <tr>
                    <th>
                    </th>
                </tr>
                <tr>
                    <th>
                    </th>
                </tr>
                <tr>

                        <th style="width:5%">#</th>
                        <th style="width:19%">Gemeld door</th>
                        <th style="width:19%">Reden</th>
                        <th style="width:19%">Datum</th>
                </tr>
                
                <tr>
                <th colspan="5"><hr size="4" width="100%" style="margin-bottom:1rem;" color="red"></th>
                </tr>
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
                    <?php } ?>
                
            </thead>
        </table>


    </div>

<!-- Oude Code -->
