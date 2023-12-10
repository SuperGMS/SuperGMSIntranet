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

<h1>Cijfers</h1>

<div class="recent-orders">
    <table>
        <thead>
            <tr>
                <th style="width:5%">#</th>
                <th style="width:19%">Titel</th>
                <th style="width:19%">Punten</th>
                <th style="width:19%">Cijfer</th>
                <th style="width:19%">Door</th>
            </tr>
            <tr>
                <th colspan="5">
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                </th>
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

        </thead>
    </table>


</div>

<!-- oud systeem -->