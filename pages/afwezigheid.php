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
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Afwezigheid bekijken</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Dashboard</a>
            </li>
            <li class="active">
                <strong>Afwezigheid</strong>
            </li>
        </ol>
    </div>
</div>
<br />
<style>
    tr {
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
        grid-template-rows: auto;
    }

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

    .aanwezigheid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr
    }

    .aanwezigheid>h3 {
        text-align: center
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins example222" style="background:white">
            <div class="ibox-title example333">
                <h3 style="text-align:center">Bekijk hier het aantal keer dat je afwezig bent geweest!</h3>
                <br />
                <div class="aanwezigheid">
                    <h3 class="success">Totaal keer geoorloofd: <?php echo $countAfwezigheidGeoorloofd ?></h3>
                    <h3 class="table">Totaal aantal keer absent: <?php echo $countAfwezigheid ?></h3>
                    <h3 class="danger">Totaal keer ongeoorloofd: <?php echo $countAfwezigheidOngeoorloofd ?></h3>
                </div>
            </div>
            <br />
            <br />
            <br />
            <table class="table" style="color:black">
                <tr>
                    <th>#</th>
                    <th>Gemeld door</th>
                    <th>Reden</th>
                    <th>Datum</th>
                </tr>
                <?php
                while ($fetchAfwezigheid = $getAfwezigheid->fetch_array()) {
                    $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchAfwezigheid['made_uid'] . "'");
                    $fetchUsername = $getUsername->fetch_assoc();
                ?>
                    <tr>
                        <td>
                            <h4><?php echo $fetchAfwezigheid['id']; ?></h4>
                        </td>
                        <td>
                            <h4><?php echo $fetchUsername['username']; ?></h4>
                        </td>
                        <?php
                        if ($fetchAfwezigheid['reden'] == '1') { ?>
                            <td class="warning">
                                <h4>
                                    Te laat
                                </h4>
                            </td>
                        <?php }
                        if ($fetchAfwezigheid['reden'] == '2') { ?>
                            <td class="danger">
                                <h4>
                                    Absent
                                </h4>
                            </td>
                        <?php } else if ($fetchAfwezigheid['reden'] == '3') { ?>
                            <td class="success">
                                <h4>
                                    Geoorloofd absent
                                </h4>
                            </td>
                        <?php } else if ($fetchAfwezigheid['reden'] == '4') { ?>
                            <td class="success">
                                <h4>
                                    Verlof
                                </h4>
                            </td>
                        <?php } ?>
                        <td>
                            <h4><?php echo $fetchAfwezigheid['date']; ?></h4>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php
            if ($countAfwezigheid <= 0) { ?>
                <h3 style="text-align:center">Geweldig, je bent nog 0 keer absent geweest!</h3>
                <br />
            <?php } ?>
        </div>
    </div>
</div>