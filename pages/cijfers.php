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
            <h2>Bekijk hier al je cijfers die je hebt behaald!</h2>
        </div>
        <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
            <table class="table table-striped b-t b-b">
                <tr>
                    <th>#</th>
                    <th>Titel</th>
                    <th>Punten</th>
                    <th>Cijfer</th>
                    <th>Door</th>
                </tr>
                <?php
                $getCijfers = $db->query("SELECT * FROM cijfers WHERE uid = '" . $userFetch['id'] . "'");
                $countCijfer = $getCijfers->num_rows;
                if ($countCijfer <= 0) {
                    echo '<tr><td></td><td>Geen cijfers gevonden!</td></tr>';
                }
                while ($fetchCijfers = $getCijfers->fetch_array()) {
                    $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchCijfers['by_uid'] . "'");
                    $fetchUsername = $getUsername->fetch_assoc();
                ?>
                    <tr class="<?php if ($fetchCijfers['cijfer'] >= 5.5) {
                                    echo 'success';
                                } else {
                                    echo 'danger';
                                } ?>">
                        <td><?php echo $fetchCijfers['id']; ?></td>
                        <td><?php echo $fetchCijfers['title']; ?></td>
                        <td><?php echo $fetchCijfers['punten']; ?></td>
                        <td><?php echo $fetchCijfers['cijfer']; ?></td>
                        <td><?php echo $fetchUsername['username']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>