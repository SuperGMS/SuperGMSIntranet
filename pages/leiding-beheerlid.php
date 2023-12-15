<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
    if (isset($_GET['id'])) {
        $getMember = $db->query("SELECT * FROM users WHERE id = '" . $db->real_escape_string($_GET['id']) . "'");
        $fetchLid = $getMember->fetch_assoc();

        $id = $db->real_escape_string($_GET['id']);

        $getAfwezigheid = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $fetchLid['id'] . "'");
        $countAfwezigheid = $getAfwezigheid->num_rows;

        $getAfwezigheidOngeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $fetchLid['id'] . "' AND reden = '1' OR uid = '" . $fetchLid['id'] . "' AND reden = '2'");
        $countAfwezigheidOngeoorloofd = $getAfwezigheidOngeoorloofd->num_rows;

        $getAfwezigheidGeoorloofd = $db->query("SELECT * FROM afwezigheid WHERE uid = '" . $fetchLid['id'] . "' AND reden = '3' OR uid = '" . $fetchLid['id'] . "' AND reden = '4'");
        $countAfwezigheidGeoorloofd = $getAfwezigheidGeoorloofd->num_rows;
?>

        <style>
            .form-control-input {
                width: 100%;
                height: 40px;
                padding-left: 15px;
                border-radius: 10px;
                background: lightgray;
                font-family: 'Poppins';
                font-size: 15;
                font-weight: 600;
            }

            .form-label-input {
                display: block;
                text-align: left;
                margin-left: 1%;
                margin-bottom: 0.5%;
            }
        </style>

        <h1>Ledenbeheer | Gegevens van <?= $fetchLid['naam'] . " " . $fetchLid['achternaam']; ?></h1>

        <?= $informatienognietafgemaakt ?>

        <form id="BewerkGebruiker" action="" method="POST">
            <div class="recent-orders">
                <table class="table">
                    <th>
                        <h2 style="text-align:center">Persoonsgegevens</h2>
                        <div class="form-group">

                            <label for="inputPassword3" class="form-label-input">Naam:</label>
                            <input type="text" name="naam" value="<?php echo $fetchLid['naam']; ?>" class="form-control-input" />
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Achternaam:</label>
                            <input type="text" name="achternaam" value="<?php echo $fetchLid['achternaam']; ?>" class="form-control-input" />
                        </div>
                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Leeftijd:</label>
                            <input type="text" name="leeftijd" value="<?php echo $fetchLid['leeftijd']; ?>" class="form-control-input" />
                        </div>
                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Geboortedatum:</label>
                            <input type="text" name="geboortedatum" value="<?php echo $fetchLid['geboortedatum']; ?>" class="form-control-input" />
                        </div>

                        <br />
                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">E-mail:</label>
                            <input type="text" name="email" value="<?php echo $fetchLid['email']; ?>" class="form-control-input" />
                        </div>

                        <br />
                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Telefoon:</label>
                            <input type="text" name="telefoon" value="<?php echo $fetchLid['telefoon']; ?>" class="form-control-input" />
                        </div>
                        <br />
                        <br />
                        <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                        <h2 style="text-align:center">Clan gerelateerd</h2>
                        <div class="form-group">
                            <label class="form-label-input">Eenheid</label>
                            <select name="eenheid" class="form-control-input">
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
                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Roepnummer:</label>
                            <input type="text" name="roepnummer" value="<?php echo $fetchLid['roepnummer']; ?>" class="form-control-input" />
                        </div>
                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Reserve Centralist:</label>
                            <select name="reserve_centralist" class="form-control-input">
                                <option value="0" <?php if ($fetchLid['reserve_centralist'] == '0') {
                                                        echo 'selected';
                                                    } ?>>Nee</option>
                                <option value="1" <?php if ($fetchLid['reserve_centralist'] == '1') {
                                                        echo 'selected';
                                                    } ?>>Ja</option>
                            </select>
                        </div>
                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Status:</label>
                            <select name="status" class="form-control-input">
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
                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Specialisatie(s):</label>
                            <input type="text" name="specialisatie" value="<?php echo $fetchLid['specialisatie']; ?>" class="form-control-input" />
                        </div>
                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Ingewerkt:</label>
                            <select name="ingewerkt" class="form-control-input">
                                <option value="0" <?php if ($fetchLid['ingewerkt'] == '0') {
                                                        echo 'selected';
                                                    } ?>>Nee</option>
                                <option value="1" <?php if ($fetchLid['ingewerkt'] == '1') {
                                                        echo 'selected';
                                                    } ?>>Ja</option>
                            </select>
                        </div>

                        <br />

                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">GMS toegang:</label>
                            <select name="porto" class="form-control-input">
                                <option value="0" <?php if ($fetchLid['porto'] == '0') {
                                                        echo 'selected';
                                                    } ?>>Nee</option>
                                <option value="1" <?php if ($fetchLid['porto'] == '1') {
                                                        echo 'selected';
                                                    } ?>>Ja</option>
                            </select>
                        </div>
                        <br />
                        
                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Op gesprek:</label>
                            <select name="opgesprek" class="form-control-input">
                                <option value="0" <?php if ($fetchLid['opgesprek'] == '0') {
                                                        echo 'selected';
                                                    } ?>>Nee</option>
                                <option value="1" <?php if ($fetchLid['opgesprek'] == '1') {
                                                        echo 'selected';
                                                    } ?>>Ja</option>
                            </select>
                        </div>
                        <br />
                        <br />
                        <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                        <h2 style="text-align:center">Opmerkingen</h2>
                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Leiding</label>
                            <textarea style="resize: none;" name="l_opmerking" rows="5" class="form-control-input" readonly \><?php echo $fetchLid['l_opmerking']; ?></textarea>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="inputPassword3" class="form-label-input">Instructeur / Teamleider</label>
                            <textarea name="i_opmerking" rows="5" class="form-control-input"><?php echo $fetchLid['i_opmerking']; ?></textarea>
                        </div>
                        <style>
                            .btn-success {
                                width: 100%;
                                margin-top: 1.5%;
                                background: lightgreen;
                                border-radius: 10px;
                                height: 30px;
                                font-family: 'Poppins';
                                font-size: 15;
                                font-weight: 600;
                            }
                        </style> <input type="text" name="id" value="<?php echo $fetchLid['id']; ?>" style="display:none" class="form-control-input" />
                        <input type="submit" style="width:100%" name="wijzigen" value="Bewerk gegevens" class="btn-success btn" />
        </form>
        <form id="VerwijderGebruiker"> <input type="text" name="id" value="<?php echo $fetchLid['id']; ?>" style="display:none" class="form-control-input" />

            <input type="submit" style="width:100%;background:red" name="verwijderGebruiker" value="Verwijder gebruiker" class="btn-success btn" />
            </th>
            </div>
        </form>
        </table>

        <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

        <div class="recent-orders">
            <table>
                <th>
                    <h2>Cijfers van <?php echo $fetchLid['username'] ?></h2>
                </th>
            </table>
        </div>

        <div class="recent-orders">
            <div class="box" style="border-radius:10px 10px;">
                <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Titel</th>
                            <th>Punten</th>
                            <th>Cijfer</th>
                            <th>Door</th>
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
                                <td style="border-bottom: 0px ;">#</td>
                                <td style="border-bottom: 0px ;"><input style="height:30px;width:90%" type="text" name="title" placeholder="Examen" class="form-control-input"></td>
                                <td style="border-bottom: 0px ;"><input style="height:30px;width:90%" type="text" name="punten" placeholder="10/100" class="form-control-input"></td>
                                <td style="border-bottom: 0px ;"><input style="height:30px;width:90%" type="text" name="cijfer" placeholder="1.0" class="form-control-input"></td>
                                <td style="border-bottom: 0px ;"><input type="submit" name="save" value="Aanmaken" class="btn btn-success"></td>
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
                                    <h6><?php echo $fetchCijfer['id']; ?></h6>
                                </td>
                                <td>
                                    <h6><?php echo $fetchCijfer['title']; ?></h6>
                                </td>
                                <td>
                                    <h6><?php echo $fetchCijfer['punten']; ?></h6>
                                </td>
                                <td>
                                    <h6><?php echo $fetchCijfer['cijfer']; ?></h6>
                                </td>
                                <td>
                                    <h6><?php echo $fetchUsername['username']; ?></h6>
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

        <hr size="4" width="100%" style="margin-bottom:1rem;margin-top:1.3rem;" color="red">

        <div class="recent-orders">
            <table>
                <th>
                    <h2>Bekijk hier het aantal keer dat <?= $fetchUsername['username']; ?> afwezig is geweest!</h2>
                    <div style="display:flex;">
                        <h3 style="float:left;width:33%;">Totaal aantal keer absent: <?php echo $countAfwezigheid ?></h3>
                        <h3 style="width:33%">Totaal keer geoorloofd: <?php echo $countAfwezigheidGeoorloofd ?></h3>
                        <h3 style="float:right;width:33%">Totaal keer ongeoorloofd: <?php echo $countAfwezigheidOngeoorloofd ?></h3>
                    </div>
                </th>
            </table>
        </div>

        <div class="recent-orders" style="margin-bottom:1.3rem;">
            <div class="padding">
                <div class="box" style="border-radius:10px 10px;">
                    <div class="table-responsive" id="datatable" style="border-radius:0px 0px 10px 10px;">
                        <table class="table">
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
                                        <h6><?php echo $fetchAfwezigheid['id']; ?></h6>
                                    </td>
                                    <td>
                                        <h6><?php echo $fetchUsername['username']; ?></h6>
                                    </td>
                                    <?php
                                    if ($fetchAfwezigheid['reden'] == '2') { ?>
                                        <td class="danger">
                                            <h6>
                                                Absent
                                            </h6>
                                        </td>
                                    <?php }
                                    if ($fetchAfwezigheid['reden'] == '1') { ?>
                                        <td class="warning">
                                            <h6>
                                                Te laat
                                            </h6>
                                        </td>
                                    <?php } else if ($fetchAfwezigheid['reden'] == '3') { ?>
                                        <td class="success">
                                            <h6>
                                                Geoorloofd absent
                                            </h6>
                                        </td>
                                    <?php } else if ($fetchAfwezigheid['reden'] == '4') { ?>
                                        <td class="success">
                                            <h6>
                                                Verlof
                                            </h6>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <h6><?php echo $fetchAfwezigheid['date']; ?></h6>
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
        </div>
<?php }
}
?>