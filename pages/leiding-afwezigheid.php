<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else if ($userFetch['opgesprek'] == '1') {
    header("Location: opgesprek");
}
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Afwezigheid bekijken</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $site; ?>/home">Dashboard</a>
            </li>
            <li>
                <a>Leiding</a>
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
        grid-template-columns: 20% 20% 20% 10% 10% 10% 10%;
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

    input[type=checkbox] {
        width: 20px;
        height: 20px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins example222" style="background:white">
            <?php

            $getAfwezigheid = $db->query("SELECT * FROM afwezigheid");
            $countAfwezigheid = $getAfwezigheid->num_rows;

            $getAfwezigheidOngeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE reden = '1' OR reden = '2'");
            $countAfwezigheidOngeoorloofd = $getAfwezigheidOngeoorloofd->num_rows;

            $getAfwezigheidGeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE reden = '3' OR reden = '4'");
            $countAfwezigheidGeoorloofd = $getAfwezigheidGeoorloofd->num_rows;

            $reden = $db->real_escape_string($_POST['reden']);
            $date = $db->real_escape_string($_POST['date']);
            ?>
            <div class="ibox-title example333">
                <h3 style="text-align:center">Bekijk hier het aantal keer dat je afwezig bent geweest!</h3>
                <br />
                <div class="aanwezigheid">
                    <h3 class="success">Waarvan geoorloofd: <?php echo $countAfwezigheidGeoorloofd ?></h3>
                    <h3 class="table">Totaal aantal absent: <?php echo $countAfwezigheid ?></h3>
                    <h3 class="danger">Waarvan ongeoorloofd: <?php echo $countAfwezigheidOngeoorloofd ?></h3>
                </div>
            </div>
            <br />
            <br />
            <br />
            <?php
            $eenRandomNaamMaaktNietEchtUit = 0;
            if (isset($_POST['save'])) {
                foreach ($_POST['uid'] as $index => $uid) {

                    $id = $userFetch['id'];
                    $uid = $_POST['uid'][$index];
                    $reden = $_POST['reden'][$index];
                    $date = $_POST['date'][$index];

                    if (empty($reden)) {
                        echo '';
                    } elseif (empty($uid)) {
                        echo '';
                    } elseif (empty($id)) {
                        echo '';
                    } elseif (empty($date)) {
                        echo '';
                    } else {

                        $kaas = $db->query("SELECT * FROM afwezigheid WHERE uid='" . $uid . "' AND date='" . $date . "'");
                        $query;
                        if ($kaas) {
                            $query = $db->query("INSERT INTO afwezigheid (made_uid, date, uid, reden) VALUES ('" . $id . "','" . $date . "','" . $uid . "','" . $reden . "')");
                        } else {
                            $query = $db->query("UPDATE afwezigheid SET reden='" . $reden . "' WHERE uid='" . $uid . "' AND date='" . $date . "'");
                        }
                        if ($query) {
                            $eenRandomNaamMaaktNietEchtUit++;
                        } else {
                            echo 'Er is iets misgegaan!';
                        }
                    }
                }
            }
            ?>
            <form action="" method="post">
                <?php if ($eenRandomNaamMaaktNietEchtUit) {
                    echo "($eenRandomNaamMaaktNietEchtUit) Zoveel aantal keer geupdate";
                } ?>
                <table class="table" style="color:black">
                    <tr>
                        <th>#</th>
                        <th>( O / G ) Gemeld door</th>
                        <th>Datum</th>
                        <th>AB</th>
                        <th>TL</th>
                        <th>VR</th>
                        <th>VL</th>
                    </tr>
                    <?php
                    $getLeden = $db->query("SELECT * FROM users WHERE opgesprek='0' ORDER BY username ASC");
                    $countLeden = $getLeden->num_rows;
                    $date2 = date("d-m-y");
                    $i = 0;
                    while ($fetchLeden = $getLeden->fetch_assoc()) {
                    ?>
                        <?php
                        $fetchLidAfwezigCount = $db->query("SELECT * FROM afwezigheid WHERE uid='" . $fetchLeden['id'] . "'AND  reden='1' OR uid='" . $fetchLeden['id'] . "'AND  reden='2' ");
                        $CountLidAfwezig = $fetchLidAfwezigCount->num_rows;
                        $fetchLidAfwezigCountGeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid='" . $fetchLeden['id'] . "'AND  reden='3' OR uid='" . $fetchLeden['id'] . "'AND  reden='4' ");
                        $CountLidAfwezigtGeoorloofd = $fetchLidAfwezigCountGeoorloofd->num_rows;
                        $fetchLidAfwezig = $db->query("SELECT reden FROM afwezigheid WHERE uid='" . $fetchLeden['id'] . "' AND date='" . $date2 . "'");
                        $getLidAfwezig = mysqli_fetch_row($fetchLidAfwezig);
                        ?>
                        <tr>
                            <td>
                                <h4><?php echo $fetchLeden['id']; ?></h4>
                                <input type="text" name="uid[]" value="<?php echo $fetchLeden['id']; ?>" hidden></input>
                            </td>
                            <td>
                                <h4>
                                    <?php
                                    if ($CountLidAfwezig <= 10) { ?>
                                        <span style="color:orange">( <?php echo $CountLidAfwezig ?> </span>
                                    <?php } else { ?>
                                        <span style="color:red">10x ongeoorloofd!</span>
                                    <?php } ?><span style="color:orange">/ <?php echo $CountLidAfwezigtGeoorloofd ?> )</span> - <a href="<?php echo $site; ?>/leiding/lid/<?php echo $fetchLeden['id'] ?>"><?php echo $fetchLeden['username']; ?></a>
                                </h4>
                            </td>
                            <td>
                                <h4><?php echo date("d-m-y"); ?></h4>
                                <input type="text" name="date[]" value="<?php echo date("d-m-y"); ?>" hidden></input>
                            </td>
                            <td>
                                <input name="reden[<?php echo $i ?>]" <? if ($getLidAfwezig['0'] == 2) {
                                                                            echo 'checked';
                                                                        } else {
                                                                            echo '';
                                                                        } ?> value="2" type="checkbox">
                            </td>
                            <td>
                                <input name="reden[<?php echo $i ?>]" <? if ($getLidAfwezig['0'] == 1) {
                                                                            echo 'checked';
                                                                        } else {
                                                                            echo '';
                                                                        } ?> value="1" type="checkbox">
                            </td>
                            <td>
                                <input name="reden[<?php echo $i ?>]" <? if ($getLidAfwezig['0'] == 3) {
                                                                            echo 'checked';
                                                                        } else {
                                                                            echo '';
                                                                        } ?> value="3" type="checkbox">
                            </td>
                            <td>
                                <input name="reden[<?php echo $i ?>]" <? if ($getLidAfwezig['0'] == 4) {
                                                                            echo 'checked';
                                                                        } else {
                                                                            echo '';
                                                                        } ?> value="4" type="checkbox">
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </table>
                <input type="submit" name="save" value="Bewerk" class="btn btn-warning">
            </form>
        </div>
    </div>
</div>