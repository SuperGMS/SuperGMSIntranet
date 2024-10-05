<?php
// Check if the user is not authorized to access the page
if ($teamleider != 1) {
    echo 'Geen toegang!';
    exit();
}

if (isset($_GET['id'])) {

    // Prepare and execute the statement to get user info
    $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $fetchLid = $stmt->fetch();

    if (!$fetchLid) {
        echo 'Lid niet gevonden.';
        exit();
    }

    // Get absence info
    $stmtAfwezigheid = $db->prepare("SELECT * FROM afwezigheid WHERE uid = :uid");
    $stmtAfwezigheid->execute(['uid' => $fetchLid['id']]);
    $countAfwezigheid = $stmtAfwezigheid->rowCount();

    // Get ongeoorloofd absence info
    $stmtAfwezigheidOngeoorloofd = $db->prepare("SELECT * FROM afwezigheid WHERE uid = :uid AND (reden = '1' OR reden = '2')");
    $stmtAfwezigheidOngeoorloofd->execute(['uid' => $fetchLid['id']]);
    $countAfwezigheidOngeoorloofd = $stmtAfwezigheidOngeoorloofd->rowCount();

    // Get geoorloofd absence info
    $stmtAfwezigheidGeoorloofd = $db->prepare("SELECT * FROM afwezigheid WHERE uid = :uid AND (reden = '3' OR reden = '4')");
    $stmtAfwezigheidGeoorloofd->execute(['uid' => $fetchLid['id']]);
    $countAfwezigheidGeoorloofd = $stmtAfwezigheidGeoorloofd->rowCount();

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
    <h1>Ledenbeheer | Gegevens van <?= htmlspecialchars($fetchLid['naam']) . " " . htmlspecialchars($fetchLid['achternaam']); ?></h1>

    <form id="BewerkGebruiker" action="" method="POST">
        <div class="recent-orders">
            <table class="table">
                <th>
                    <h2 style="text-align:center">Persoonsgegevens</h2>
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Naam:</label>
                        <input type="text" name="naam" value="<?= htmlspecialchars($fetchLid['naam']); ?>" class="form-control-input" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Achternaam:</label>
                        <input type="text" name="achternaam" value="<?= htmlspecialchars($fetchLid['achternaam']); ?>" class="form-control-input" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Leeftijd:</label>
                        <input type="text" name="leeftijd" value="<?= htmlspecialchars($fetchLid['leeftijd']); ?>" class="form-control-input" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Geboortedatum:</label>
                        <input type="text" name="geboortedatum" value="<?= htmlspecialchars($fetchLid['geboortedatum']); ?>" class="form-control-input" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">E-mail:</label>
                        <input type="text" name="email" value="<?= htmlspecialchars($fetchLid['email']); ?>" class="form-control-input" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="inputPassword3" class="form-label-input">Telefoon:</label>
                        <input type="text" name="telefoon" value="<?= htmlspecialchars($fetchLid['telefoon']); ?>" class="form-control-input" />
                    </div>
                    <br />
                    <hr size="4" width="100%" style="margin-bottom:1rem;" color="red">
                    <h2 style="text-align:center">Clan gerelateerd</h2>
                    <div class="form-group">
                        <label class="form-label-input">Eenheid</label>
                        <select name="eenheid" class="form-control-input">
                            <option value="Politie" <?= ($fetchLid['eenheid'] == 'Politie') ? 'selected' : ''; ?>>Politie</option>
                            <option value="Handhaving" <?= ($fetchLid['eenheid'] == 'Handhaving') ? 'selected' : ''; ?>>Handhaving</option>
                            <option value="Koninklijke Marechaussee" <?= ($fetchLid['eenheid'] == 'Koninklijke Marechaussee') ? 'selected' : ''; ?>>Koninklijke Marechaussee</option>
                            <option value="Brandweer" <?= ($fetchLid['eenheid'] == 'Brandweer') ? 'selected' : ''; ?>>Brandweer</option>
                            <option value="Ambulance" <?= ($fetchLid['eenheid'] == 'Ambulance') ? 'selected' : ''; ?>>Ambulance</option>
                            <option value="Meldkamer" <?= ($fetchLid['eenheid'] == 'Meldkamer') ? 'selected' : ''; ?>>Meldkamer</option>
                            <option value="Zadkine Veiligheidsacademie" <?= ($fetchLid['eenheid'] == 'Zadkine Veiligheidsacademie') ? 'selected' : ''; ?>>Zadkine Veiligheidsacademie</option>
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
        </table>
        </div>
    </form>

    <!-- Display absence info -->
    <div class="recent-orders">
        <table>
            <th>
                <h2>Bekijk hier het aantal keer dat <?= htmlspecialchars($fetchLid['naam']) ?> afwezig is geweest!</h2>
                <div style="display:flex;">
                    <h3 style="float:left;width:33%;">Totaal aantal keer absent: <?= $countAfwezigheid ?></h3>
                    <h3 style="width:33%">Totaal keer geoorloofd: <?= $countAfwezigheidGeoorloofd ?></h3>
                    <h3 style="float:right;width:33%">Totaal keer ongeoorloofd: <?= $countAfwezigheidOngeoorloofd ?></h3>
                </div>
            </th>
        </table>
    </div>

    <!-- Display absence details -->
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
                        while ($fetchAfwezigheid = $stmtAfwezigheid->fetch()) {
                            // Fetch the username of the person who marked the absence
                            $stmtUsername = $db->prepare("SELECT username FROM users WHERE id = :id");
                            $stmtUsername->execute(['id' => $fetchAfwezigheid['made_uid']]);
                            $fetchUsername = $stmtUsername->fetch();
                        ?>
                            <tr>
                                <td><?= $fetchAfwezigheid['id']; ?></td>
                                <td><?= htmlspecialchars($fetchUsername['username']); ?></td>
                                <td><?= ($fetchAfwezigheid['reden'] == '1') ? 'Te laat' : (($fetchAfwezigheid['reden'] == '2') ? 'Absent' : 'Geoorloofd absent'); ?></td>
                                <td><?= $fetchAfwezigheid['date']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php } ?>