<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
?>

    <div class="padding">
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Agenda beheren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <form action="" method="post">
                    <table class="table">
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
                                    $content = 'Je instructeur heeft een training ingepland! Bekijk snel de agenda!';
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
                    <tr data-href="<?php echo $site; ?>/leiding/bekijk/agenda/<?php echo $fetchAgenda['id'] ?>">
                        <td>
                            <h6><?php echo $fetchAgenda['id']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $fetchAgenda['title']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $fetchAgenda['start']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $fetchAgenda['end']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $fetchAgenda['afdeling']; ?></h6>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['delTime'])) {
                                $id = $db->real_escape_string($_POST['id']);
                                $db->query("DELETE FROM agenda WHERE id = '" . $id . "'");
                            ?>
                                <script>
                                    location.href = '<?php echo $site; ?>/leiding/agenda';
                                </script>
                            <?php } ?>
                            <form action="" method="post">
                                <input type="text" name="id" style="display:none;" value="<?php echo $fetchAgenda['id']; ?>">
                                <input type="submit" style="background: url(https://supergms.nl/assets/img/Delete.png);border: 0;display: block;height: 16px;width: 16px;" value="" name="delTime" style="float:right;">
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

<?php } ?>