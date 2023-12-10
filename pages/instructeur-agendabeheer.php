<?php
if ($instructeur != 1) {
    echo 'Geen toegang!';
} else {
    if (isset($_GET['id'])) {
        $getAgenda = $db->query("SELECT * FROM agenda WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
        $fetchAgenda = $getAgenda->fetch_assoc();
        $getUsername = $db->query("SELECT id, username FROM users WHERE id = '" . $fetchAgenda['made_uid'] . "'");
        $fetchUsername = $getUsername->fetch_assoc();
?>
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
                        <h3 style="text-align:center;">Agenda beheren</h3>
                    </div>
                    <br />
                    <table class="table table-striped table-hover" style="color:black">
                        <tr>
                            <th>#</th>
                            <th>Titel</th>
                            <th>Begin datum</th>
                            <th>Eind datum</th>
                            <th>Afdeling</th>
                            <th></th>
                        </tr>
                        <?php
                        if (isset($_POST['save'])) {
                            $title = $db->real_escape_string($_POST['title']);
                            $uidmaker = $userFetch['id'];
                            $date = $db->real_escape_string($_POST['date']);
                            $end = $db->real_escape_string($_POST['end']);
                            $afdeling = $db->real_escape_string($_POST['afdeling']);

                            if (empty($title)) {
                                echo 'Geen titel ingevult!';
                            } elseif (empty($date)) {
                                echo 'Geen datum ingevult!';
                            } else {

                                $query = $db->query("INSERT INTO agenda (made_uid, title, start, end, afdeling) VALUES ('" . $uidmaker . "', '" . $title . "', '" . $date . "', '" . $end . "', '" . $afdeling . "')");
                                if ($afdeling != 'leiding' || $afdeling != 'instructeur') {
                                    $onderwerp = 'Agenda Item Gemaakt!';
                                    $content = '
                    Je instructeur heeft een training ingepland! Bekijk snel de agenda!
                    ';
                                    $getAfdeling = $db->query("SELECT username, id FROM users WHERE eenheid = '" . $afdeling . "'");
                                    while ($fetchAfdeling = $getAfdeling->fetch_array()) {
                                        $query .= $db->query("INSERT INTO mailbox (uid_from,name_from,uid_to,title,bericht,date,categorie) VALUES (
                                        '0',
                                        'Instructeur',
                                        '" . $fetchAfdeling['id'] . "',
                                        '" . $onderwerp . "',
                                        '" . $content . "',
                                        NOW(),
                                        '2'
                            )");
                                    }
                                }
                                if ($query) {
                                    echo 'Succesvol aangemaakt!';
                                } else {
                                    echo 'Er is iets misgegaan!';
                                }
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <tr>
                                <td>#</td>
                                <td><input type="text" name="title" placeholder="Surveillance" class="form-control"></td>
                                <td><input type="text" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>" class="form-control"></td>
                                <td><input type="text" name="end" value="<?php echo date("Y-m-d H:i:s"); ?>" class="form-control"></td>
                                <td>
                                    <select name="afdeling" class="form-control">
                                        <option value="Politie">Politie</option>
                                        <option value="Handhaving">Handhaving</option>
                                        <option value="Ambulance">Ambulance</option>
                                        <option value="Koninklijke Marechaussee">Koninklijke Marechaussee</option>
                                        <option value="Meldkamer">Meldkamer</option>
                                        <option value="Brandweer">Brandweer</option>
                                        <option value="all">Iedereen</option>
                                    </select>
                                </td>
                                <td><input type="submit" name="save" value="Aanmaken" class="btn btn-primary"></td>
                            </tr>
                        </form>

                        <?php
                        $getAgenda = $db->query("SELECT * FROM agenda WHERE status = '0'");
                        $countAgenda = $getAgenda->num_rows;

                        while ($fetchAgenda = $getAgenda->fetch_array()) {
                            $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchAgenda['by_uid'] . "'");
                            $fetchUsername = $getUsername->fetch_assoc();
                        ?>
                            <tr class="clickable-row" data-href="<?php echo $site; ?>/instructeur/bekijk/agenda/<?php echo $fetchAgenda['id'] ?>">
                                <td>
                                    <h4><?php echo $fetchAgenda['id']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchAgenda['title']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchAgenda['start']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchAgenda['end']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchAgenda['afdeling']; ?></h4>
                                </td>
                                <td>
                                    <?php
                                    if (isset($_POST['delTime'])) {
                                        $id = $db->real_escape_string($_POST['id']);
                                        $db->query("DELETE FROM agenda WHERE id = '" . $id . "'");
                                    ?>
                                        <script>
                                            location.href = '<?php echo $site; ?>/instructeur/agenda';
                                        </script>
                                    <?php } ?>
                                    <form action="" method="post">
                                        <input type="text" name="id" style="display:none;" value="<?php echo $fetchAgenda['id']; ?>">
                                        <input type="submit" style="background: url(<?php echo $site; ?>/img/Delete.png);border: 0;display: block;height: 16px;width: 16px;" value="" name="delTime" style="float:right;">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                    <?php
                    if ($countAgenda <= 0) { ?>
                        <h3 style="text-align:center">Geen agenda inplanningen gevonden!</h3>
                        <br />
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                    if (isset($_POST['verwijder'])) {
                                        $query = $db->query("UPDATE agenda SET status = '1' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
                                        if ($query) {
                                            echo 'Succesvol een item verwijderd!';
                                        } else {
                                            echo 'Er is iets misgegaan!';
                                        }
                                    }
                                    ?>
                                    <div class="m-b-md">
                                        <form action="" method="post">
                                            <input type="submit" class="btn btn-white btn-xs pull-right" name="verwijder" value="Verwijderen">
                                        </form>
                                        <h2>Agenda: <?php echo $fetchAgenda['title']; ?></h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt>
                                        <dd><?php
                                            if ($fetchAgenda['status'] == 0) {
                                                echo '<span class="label label-primary">Actief</span>';
                                            } else {
                                                echo '<span class="label label-danger">Verwijderd</span>';
                                            } ?></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Gemaakt door:</dt>
                                        <dd><?php echo $fetchUsername['username']; ?></dd>
                                        <dt>Datum:</dt>
                                        <dd> <?php
                                                setlocale(LC_TIME, 'nld_nld');
                                                echo strftime('%e %B %Y om %H:%M', strtotime($fetchAgenda['start']));
                                                ?></dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">

                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <?php
                                    if (isset($_POST['save'])) {
                                        $title = $db->real_escape_string($_POST['titel']);
                                        $start = $db->real_escape_string($_POST['date']);
                                        $url = '';
                                        $afdeling = $db->real_escape_string($_POST['afdeling']);

                                        if (empty($title)) {
                                            echo 'Vergeten een titel in te vullen!';
                                        } elseif (empty($start)) {
                                            echo 'Vergeten een datum in te vullen!';
                                        } else {

                                            $query = $db->query("UPDATE agenda SET title = '" . $title . "', start = '" . $start . "', afdeling = '" . $afdeling . "' WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");

                                            if ($query) {
                                                echo 'Succesvol opgeslagen';
                                            } else {
                                                echo 'Er is iets misgegaan! Email naar systeem@nnpdclan.nl';
                                            }
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST">

                                        <div class="form-group">
                                            <label>Titel</label>
                                            <input type="text" name="titel" placeholder="Je moeder is een plopkoek" value="<?php echo $fetchAgenda['title']; ?>" class="form-control">
                                        </div>
                                        <div class="form-group" id="datetimepicker1">
                                            <label>Datum</label>
                                            <input type="text" name="date" value="<?php echo $fetchAgenda['start']; ?>" data-format="dd/MM/yyyy hh:mm:ss" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Afdeling</label>
                                            <select name="afdeling" class="form-control">
                                                <option value="Politie" <?php if ($fetchAgenda['afdeling'] == 'Politie') {
                                                                            echo 'selected';
                                                                        } ?>>Politie</option>
                                                <option value="Handhaving" <?php if ($fetchAgenda['afdeling'] == 'Handhaving') {
                                                                                echo 'selected';
                                                                            } ?>>Handhaving</option>
                                                <option value="Ambulance" <?php if ($fetchAgenda['afdeling'] == 'Ambulance') {
                                                                                echo 'selected';
                                                                            } ?>>Ambulance</option>
                                                <option value="Koninklijke Marechaussee" <?php if ($fetchAgenda['afdeling'] == 'Koninklijke Marechaussee') {
                                                                                                echo 'selected';
                                                                                            } ?>>Koninklijke Marechaussee</option>
                                                <option value="Meldkamer" <?php if ($fetchAgenda['afdeling'] == 'meldkamer') {
                                                                                echo 'selected';
                                                                            } ?>>Meldkamer</option>
                                                <option value="all" <?php if ($fetchAgenda['afdeling'] == 'all') {
                                                                        echo 'selected';
                                                                    } ?>>Iedereen</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="save" class="btn btn-primary" value="Aanpassen">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
    }
}
?>