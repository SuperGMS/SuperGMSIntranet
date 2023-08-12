<?php
if ($leiding != 1) {
    echo 'Geen toegang!';
} else {
    ?>
    <div class="padding">
        <div class="row">
            <div class="col-md-12">
                <div class="box" style="border-radius:10px;">
                    <div class="box-header">
                        <h5>
                            <?php echo $fetchLid['username']; ?>
                        </h5>
                        <small>
                            <?php echo $fetchLid['eenheid']; ?>
                        </small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <form action="" method="POST">
                            <div class="ibox-content">
                                <h3 style="text-align:center">Persoonsgegevens</h3>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Naam:</label>
                                    <input type="text" name="naam" value="<?php echo $fetchLid['naam']; ?>"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Achternaam:</label>
                                    <input type="text" name="achternaam" value="<?php echo $fetchLid['achternaam']; ?>"
                                        class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Leeftijd:</label>
                                    <input type="text" name="leeftijd" value="<?php echo $fetchLid['leeftijd']; ?>"
                                        class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Geboortedatum:</label>
                                    <input type="text" name="geboortedatum"
                                        value="<?php echo $fetchLid['geboortedatum']; ?>" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">E-mail:</label>
                                    <input type="text" name="email" value="<?php echo $fetchLid['email']; ?>"
                                        class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Telefoon:</label>
                                    <input type="text" name="telefoon" value="<?php echo $fetchLid['telefoon']; ?>"
                                        class="form-control" />
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
                                    <input type="text" name="roepnummer" value="<?php echo $fetchLid['roepnummer']; ?>"
                                        class="form-control" />
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
                                    <input type="text" name="specialisatie"
                                        value="<?php echo $fetchLid['specialisatie']; ?>" class="form-control" />
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

                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Op gesprek:</label>
                                    <select name="opgesprek" class="form-control">
                                        <option value="0" <?php if ($fetchLid['opgesprek'] == '0') {
                                            echo 'selected';
                                        } ?>>Nee</option>
                                        <option value="1" <?php if ($fetchLid['opgesprek'] == '1') {
                                            echo 'selected';
                                        } ?>>Ja</option>
                                    </select>
                                </div>

                            </div>
                            <div class="ibox-content">
                                <h3 style="text-align:center">Wachtwoord</h3>
                                <div class="form-group">
                                    <label for="inputPassword3" class="form-label">Gebruikersnaam</label>
                                    <input type="text" name="username" class="form-control" />
                                    <label for="inputPassword3" class="form-label">Wachtwoord</label>
                                    <input type="password" name="password" class="form-control" />
                                </div>
                                <input type="submit" style="width:100%" name="wijzigen" value="Maak gebruiker aan"
                                    class="btn-success btn" />
                            </div>
                        </form>
                        <?php
                        $id = $db->real_escape_string($_GET['id']);
                        $eenheid = $db->real_escape_string($_POST['eenheid']);
                        $naam = $db->real_escape_string($_POST['naam']);
                        $username = $db->real_escape_string($_POST['username']);
                        $achternaam = $db->real_escape_string($_POST['achternaam']);
                        $leeftijd = $db->real_escape_string($_POST['leeftijd']);
                        $geboortedatum = $db->real_escape_string($_POST['geboortedatum']);
                        $email = $db->real_escape_string($_POST['email']);
                        $opgesprek = $db->real_escape_string($_POST['opgesprek']);
                        $telefoon = $db->real_escape_string($_POST['telefoon']);
                        $roepnummer = $db->real_escape_string($_POST['roepnummer']);
                        $ingewerkt = $db->real_escape_string($_POST['ingewerkt']);
                        $specialisatie = $db->real_escape_string($_POST['specialisatie']);
                        $status = $db->real_escape_string($_POST['status']);
                        $porto = $db->real_escape_string($_POST['porto']);
                        $reserve_centralist = $db->real_escape_string($_POST['reserve_centralist']);
                        $i_opmerking = $db->real_escape_string($_POST['i_opmerking']);
                        $l_opmerkingen = $db->real_escape_string($_POST['l_opmerkingen']);
                        $salt = generateSalt();
                        $password = crypt($_POST['password'], $salt);

                        if (isset($_POST['wijzigen'])) {
                            $query = $db->query("INSERT INTO users SET 
                                        eenheid='" . $eenheid . "',
                                        salt='" . $salt . "',
                                        password='" . $password . "',
                                        naam='" . $naam . "',
                                        username='" . $username . "',
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
                                        opgesprek='" . $opgesprek . "',
                                        i_opmerking='" . $i_opmerking . "'");
                            if ($query) { ?>
                                <script>
                                    location.href = '<?php echo $site; ?>/leiding/lid/<?php echo $fetchLid['id']; ?>';
                                </script>
                                <script>
                                    toastr.success('Succesvol aangemaakt!', 'Succes');
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
        </div>
    </div>

<?php }
?>