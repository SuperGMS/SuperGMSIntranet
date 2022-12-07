<?php
if ($teamleider != 1) {
    echo 'Geen toegang!';
} else {
    if (isset($_GET['id'])) {
        $getMember = $db->query("SELECT * FROM users WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
        $fetchLid = $getMember->fetch_assoc();

        $id = $db->real_escape_string($_GET['id']);



        $getAfwezigheid = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $fetchLid['id'] . "'");
        $countAfwezigheid = $getAfwezigheid->num_rows;

        $getAfwezigheidOngeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $fetchLid['id'] . "' AND reden = '1' OR reden = '2'");
        $countAfwezigheidOngeoorloofd = $getAfwezigheidOngeoorloofd->num_rows;

        $getAfwezigheidGeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $fetchLid['id'] . "' AND reden = '3' OR reden = '4'");
        $countAfwezigheidGeoorloofd = $getAfwezigheidGeoorloofd->num_rows;
?>
        <style>
            #delbutton {
                background: url("<?php echo $site; ?>/img/Delete.png");
                border: 0;
                display: block;
                height: 16px;
                width: 16px;
            }
        </style>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo $site; ?>/home">Dashboard</a>
                    </li>
                    <li>
                        <a>Teamleider</a>
                    </li>
                    <li>
                        <a href="<?php echo $site; ?>/teamleider/leden">Leden Beheer</a>
                    </li>
                    <li class="active">
                        <strong><?php echo $fetchLid['username']; ?></strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

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
                        <h3 style="text-align:center;"><?php echo $fetchLid['username']; ?></h3>
                        <h4 style="text-align:center;"><?php echo $fetchLid['eenheid']; ?></h4>
                    </div>
                    <br />
                    <br />
                    <form action="" method="POST">
                        <div class="ibox-content">
                            <h3 style="text-align:center">Persoonsgegevens</h3>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Naam:</label>
                                <input type="text" name="naam" value="<?php echo $fetchLid['naam']; ?>" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Achternaam:</label>
                                <input type="text" name="achternaam" value="<?php echo $fetchLid['achternaam']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Leeftijd:</label>
                                <input type="text" name="leeftijd" value="<?php echo $fetchLid['leeftijd']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Geboortedatum:</label>
                                <input type="text" name="geboortedatum" value="<?php echo $fetchLid['geboortedatum']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">E-mail:</label>
                                <input type="text" name="email" value="<?php echo $fetchLid['email']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Telefoon:</label>
                                <input type="text" name="telefoon" value="<?php echo $fetchLid['telefoon']; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Clan gerelateerd</h3>
                            <div class="form-group">
                                <label>Eenheid</label>
                                <select name="eenheid" class="form-control">
                                    <option value="Politie" <?php if ($fetchLid['eenheid'] == 'Politie') {
                                                                echo 'selected';
                                                            } ?>>Politie</option>
                                    <option value="Handhaving" <?php if ($fetchLid['eenheid'] == 'Handhaving') {
                                                                    echo 'selected';
                                                                } ?>>Handhaving</option>
                                    <option value="Koninklijke Marechaussee" <?php if ($fetchLid['eenheid'] == 'Koninklijke Marechaussee') {
                                                                                    echo 'selected';
                                                                                } ?>>Koninklijke Marechaussee</option>
                                    <option value="Brandweer" <?php if ($fetchLid['eenheid'] == 'Brandweer') {
                                                                    echo 'selected';
                                                                } ?>>Brandweer</option>
                                    <option value="Ambulance" <?php if ($fetchLid['eenheid'] == 'Ambulance') {
                                                                    echo 'selected';
                                                                } ?>>Ambulance</option>
                                    <option value="Meldkamer" <?php if ($fetchLid['eenheid'] == 'Meldkamer') {
                                                                    echo 'selected';
                                                                } ?>>Meldkamer</option>
                                    <option value="Zadkine Veiligheidsacademie" <?php if ($fetchLid['eenheid'] == 'Zadkine Veiligheidsacademie') {
                                                                                    echo 'selected';
                                                                                } ?>>Zadkine Veiligheidsacademie</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Roepnummer:</label>
                                <input type="text" name="roepnummer" value="<?php echo $fetchLid['roepnummer']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Reserve Centralist:</label>
                                <select name="reserve_centralist" class="form-control">
                                    <option value="0" <?php if ($fetchLid['reserve_centralist'] == '0') {
                                                            echo 'selected';
                                                        } ?>>Nee</option>
                                    <option value="1" <?php if ($fetchLid['reserve_centralist'] == '1') {
                                                            echo 'selected';
                                                        } ?>>Ja</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="0" <?php if ($fetchLid['Status'] == 0) {
                                                            echo 'selected';
                                                        } ?>>Actief</option>
                                    <option value="1" <?php if ($fetchLid['Status'] == 1) {
                                                            echo 'selected';
                                                        } ?>>Inactief</option>
                                    <option value="3" <?php if ($fetchLid['Status'] == 3) {
                                                            echo 'selected';
                                                        } ?>>Geschorst</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Specialisatie(s):</label>
                                <input type="text" name="specialisatie" value="<?php echo $fetchLid['specialisatie']; ?>" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Ingewerkt:</label>
                                <select name="ingewerkt" class="form-control">
                                    <option value="0" <?php if ($fetchLid['ingewerkt'] == '0') {
                                                            echo 'selected';
                                                        } ?>>Nee</option>
                                    <option value="1" <?php if ($fetchLid['ingewerkt'] == '1') {
                                                            echo 'selected';
                                                        } ?>>Ja</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">GMS toegang:</label>
                                <select name="porto" class="form-control">
                                    <option value="0" <?php if ($fetchLid['porto'] == '0') {
                                                            echo 'selected';
                                                        } ?>>Nee</option>
                                    <option value="1" <?php if ($fetchLid['porto'] == '1') {
                                                            echo 'selected';
                                                        } ?>>Ja</option>
                                </select>
                            </div>

                        </div>
                        <div class="ibox-content">
                            <h3 style="text-align:center">Opmerkingen</h3>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Leiding</label>
                                <textarea style="resize: none;" name="l_opmerking" rows="5" class="form-control" readonly \><?php echo $fetchLid['l_opmerking']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="form-label">Instructeur / Teamleider</label>
                                <textarea name="i_opmerking" rows="5" class="form-control"><?php echo $fetchLid['i_opmerking']; ?></textarea>
                            </div>
                            <input type="submit" style="width:100%" name="wijzigen" value="Bewerk gegevens" class="btn-success btn" />
                        </div>
                    </form>
                    <?php
                    $id = $db->real_escape_string($_GET['id']);
                    $eenheid = $db->real_escape_string($_POST['eenheid']);
                    $naam = $db->real_escape_string($_POST['naam']);
                    $achternaam = $db->real_escape_string($_POST['achternaam']);
                    $leeftijd = $db->real_escape_string($_POST['leeftijd']);
                    $geboortedatum = $db->real_escape_string($_POST['geboortedatum']);
                    $email = $db->real_escape_string($_POST['email']);
                    $telefoon = $db->real_escape_string($_POST['telefoon']);
                    $roepnummer = $db->real_escape_string($_POST['roepnummer']);
                    $ingewerkt = $db->real_escape_string($_POST['ingewerkt']);
                    $specialisatie = $db->real_escape_string($_POST['specialisatie']);
                    $status = $db->real_escape_string($_POST['status']);
                    $porto = $db->real_escape_string($_POST['porto']);
                    $reserve_centralist = $db->real_escape_string($_POST['reserve_centralist']);
                    $i_opmerking = $db->real_escape_string($_POST['i_opmerking']);
                    $l_opmerkingen = $db->real_escape_string($_POST['l_opmerkingen']);

                    if (isset($_POST['wijzigen'])) {
                        $query = $db->query("UPDATE users SET 
                        eenheid='" . $eenheid . "',
                        naam='" . $naam . "',
                        achternaam='" . $achternaam . "',
                        leeftijd='" . $leeftijd . "',
                        geboortedatum='" . $geboortedatum . "',
                        email='" . $email . "',
                        telefoon='" . $telefoon . "',
                        roepnummer='" . $roepnummer . "',
                        ingewerkt='" . $ingewerkt . "',
                        specialisatie='" . $specialisatie . "', 
                        Status='" . $status . "',
                        porto='" . $porto . "',
                        reserve_centralist='" . $reserve_centralist . "',
                        i_opmerking='" . $i_opmerking . "',
                        l_opmerking='" . $l_opmerkingen . "' WHERE id='" . $fetchLid['id'] . "'");
                        if ($query) { ?>
                            <script>
                                location.href = '<?php echo $site; ?>/teamleider/lid/<?php echo $fetchLid['id']; ?>';
                            </script>
                            <script>
                                toastr.success('Succesvol geupdated!', 'Succes');
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                toastr.error('Er ging iets mis met het updaten!', 'Oeps');
                            </script>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins example222" style="background:white">
                    <div class="ibox-title example333">
                        <h3 style="text-align:center">Cijfers van <?php echo $fetchLid['username'] ?></h3>
                    </div>
                    <table class="table" style="color:black">
                        <tr>
                            <th>#</th>
                            <th>Titel</th>
                            <th>Punten</th>
                            <th>Cijfer</th>
                            <th>Door</th>
                            <th></th>
                        </tr>
                        <?php
                        if (isset($_POST['save'])) {
                            $title = $db->real_escape_string($_POST['title']);
                            $uid = $fetchLid['id'];
                            $uidmaker = $userFetch['id'];
                            $punten = $db->real_escape_string($_POST['punten']);
                            $cijfer = $db->real_escape_string($_POST['cijfer']);

                            if (empty($title)) {
                                echo 'Geen titel ingevult!';
                            } elseif (empty($punten)) {
                                echo 'Geen punten ingevult!';
                            } elseif (empty($cijfer)) {
                                echo 'Geen cijfer ingevult!';
                            } else {

                                $query = $db->query("INSERT INTO cijfers (uid, by_uid, title, punten, cijfer) VALUES ('" . $uid . "', '" . $uidmaker . "', '" . $title . "', '" . $punten . "', '" . $cijfer . "')");
                                if ($query) { ?>
                                    <script>
                                        toastr.success('Succesvol aangemaakt!', 'Succes');
                                    </script>
                                <?php } else { ?>
                                    <script>
                                        toastr.error('Er ging iets mis met het verwijderen!', 'Oeps');
                                    </script>
                        <?php }
                            }
                        } ?>
                        <form action="" method="post">
                            <tr>
                                <td>#</td>
                                <td><input type="text" name="title" placeholder="Examen" class="form-control"></td>
                                <td><input type="text" name="punten" placeholder="10/100" class="form-control"></td>
                                <td><input type="text" name="cijfer" placeholder="1.0" class="form-control"></td>
                                <td> </td>
                                <td><input type="submit" name="save" value="Aanmaken" class="btn btn-primary"></td>
                            </tr>
                        </form>
                        <?php
                        if (isset($_POST['delCijfer'])) {
                            $delQ = $db->query("DELETE FROM cijfers WHERE id = '" . $db->real_escape_string($_POST['cijferID']) . "'");
                            if ($delQ) { ?>
                                <script>
                                    toastr.success('Succesvol Verwijderd!', 'Succes');
                                </script>
                            <?php } else { ?>
                                <script>
                                    toastr.error('Er ging iets mis met het verwijderen!', 'Oeps');
                                </script>
                        <?php }
                        } ?>
                        <?php
                        $getCijfer = $db->query("SELECT * FROM cijfers WHERE uid = '" . $id . "'");
                        while ($fetchCijfer = $getCijfer->fetch_array()) {
                            $getUsername = $db->query("SELECT username, id FROM users WHERE id = '" . $fetchCijfer['by_uid'] . "'");
                            $fetchUsername = $getUsername->fetch_assoc();
                        ?>
                            <tr class=" <?php if ($fetchCijfer['cijfer'] > '5.4') {
                                            echo 'success';
                                        } else {
                                            echo 'danger';
                                        } ?>">
                                <td>
                                    <h4><?php echo $fetchCijfer['id']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchCijfer['title']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchCijfer['punten']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchCijfer['cijfer']; ?></h4>
                                </td>
                                <td>
                                    <h4><?php echo $fetchUsername['username']; ?></h4>
                                </td>
                                <form action="" method="POST">
                                    <input type="text" style="display:none;" value="<?php echo $fetchCijfer['id']; ?>" name="cijferID">
                                    <td><input type="submit" value="" id="delbutton" name="delCijfer"></td>
                                </form>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

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
                                if ($fetchAfwezigheid['reden'] == '2') { ?>
                                    <td class="danger">
                                        <h4>
                                            Absent
                                        </h4>
                                    </td>
                                <?php }
                                if ($fetchAfwezigheid['reden'] == '1') { ?>
                                    <td class="warning">
                                        <h4>
                                            Te laat
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
<?php }
}
?>