<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
?>
    <div class="padding">
        <div class="box" style="border-radius:10px 10px;">
            <div class="box-header">
                <h2>Leermiddelen beheren</h2>
            </div>
            <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                <form action="" method="post">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Titel</th>
                            <th>Leermiddel link</th>
                            <th>Afdeling</th>
                            <th></th>
                        </tr>
                        <?php
                        if (isset($_POST['save'])) {
                            $title = $db->real_escape_string($_POST['title']);
                            $uidmaker = $userFetch['id'];
                            $url = $db->real_escape_string($_POST['url']);
                            $afdeling = $db->real_escape_string($_POST['afdeling']);

                            if (empty($title)) {
                                echo 'Geen titel ingevult!';
                            } elseif (empty($url)) {
                                echo 'Geen datum ingevult!';
                            } else {

                                $query = $db->query("INSERT INTO downloads (made_uid, title, url, afdeling) VALUES ('" . $uidmaker . "', '" . $title . "', '" . $url . "', '" . $afdeling . "')");
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
                            <td><input type="text" name="title" placeholder="Politie handboek" class="form-control"></td>
                            <td><input type="text" name="url" placeholder="https://politie.nl" class="form-control"></td>
                            <td>
                                <select name="afdeling" class="form-control">
                                    <option value="Politie">Politie</option>
                                    <option value="Handhaving">Handhaving</option>
                                    <option value="Ambulance">Ambulance</option>
                                    <option value="Koninklijke Marechaussee">Koninklijke Marechaussee</option>
                                    <option value="Meldkamer">Meldkamer</option>
                                    <option value="Brandweer">Brandweer</option>
                                    <option value="Alle Afdelingen">Alle Afdelingen</option>
                                </select>
                            </td>
                            <td><input type="submit" name="save" value="Aanmaken" class="btn btn-primary"></td>
                        </tr>

                </form>
                <?php
                $getAgenda = $db->query("SELECT * FROM downloads");
                $countAgenda = $getAgenda->num_rows;

                while ($fetchLeermiddelen = $getAgenda->fetch_array()) {
                    $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchLeermiddelen['by_uid'] . "'");
                    $fetchUsername = $getUsername->fetch_assoc();
                ?>
                    <tr class="success">
                        <td>
                            <h6><?php echo $fetchLeermiddelen['id']; ?></h6>
                        </td>
                        <td>
                            <a href="<?php echo $fetchLeermiddelen['url'] ?>">
                                <h6><?php echo $fetchLeermiddelen['title']; ?></h6>
                            </a>
                        </td>
                        <td>
                            <h6><?php echo $fetchLeermiddelen['url']; ?></h6>
                        </td>
                        <td>
                            <h6><?php echo $fetchLeermiddelen['afdeling']; ?></h6>
                        </td>
                        <td>
                            <?php
                            if (isset($_POST['delTime'])) {
                                $id = $db->real_escape_string($_POST['id']);
                                $db->query("DELETE FROM downloads WHERE id = '" . $id . "'");
                            ?>
                                <script>
                                    location.href = '<?php echo $site; ?>/teamleider/leermiddelen';
                                </script>
                            <?php } ?>
                            <form action="" method="post">
                                <input type="text" name="id" style="display:none;" value="<?php echo $fetchLeermiddelen['id']; ?>">
                                <input type="submit" style="background: url(https://supergms.nl/assets/img/Delete.png);border: 0;display: block;height: 16px;width: 16px;" value="" name="delTime" style="float:right;">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </table>
                <?php
                if ($countAgenda <= 0) { ?>
                    <h3 style="text-align:center">Geen leermiddelen gevonden onder jouw beheer!</h3>
                    <br />
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>